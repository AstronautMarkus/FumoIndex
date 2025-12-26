<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Fumo;
use App\Models\Franchise;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CharactersController extends Controller
{
    public function index(Request $request)
    {
        $query = Character::query()->with('franchise');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('character_name', 'like', "%{$search}%")
                  ->orWhere('character_description', 'like', "%{$search}%");
        }

        if ($request->filled('franchise_id')) {
            $query->where('franchise_id', $request->input('franchise_id'));
            $characters = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        } else {
            $touhouFranchise = Franchise::where('franchise_name', 'Touhou Project')->first();
            if ($touhouFranchise) {
                $query->orderByRaw('franchise_id = ? DESC', [$touhouFranchise->id]);
            }
            $characters = $query->orderBy('id', 'asc')->paginate(10)->withQueryString();
        }

        $franchises = Franchise::orderBy('franchise_name')->get();

        return view('dashboard.characters', compact('characters', 'franchises'));
    }

    public function create()
    {
        $franchises = Franchise::orderBy('franchise_name')->get();
        return view('dashboard.create.character', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'character_name' => 'required|string|max:255',
            'franchise_id' => 'required|exists:franchises,id',
            'character_image' => 'nullable|image|mimes:png|max:2048',
            'character_description' => 'nullable|string',
            'description_source' => 'nullable|url|max:255',
        ]);

        $franchise = Franchise::findOrFail($validated['franchise_id']);
        $franchiseSlug = Str::slug($franchise->franchise_name, '_');
        $slugName = Str::slug($validated['character_name'], '_');
        $imagePath = "images/characters/{$franchiseSlug}/{$slugName}.png";
        $validated['slug_name'] = $slugName;

        if ($request->hasFile('character_image')) {
            $image = $request->file('character_image');
            Storage::disk('s3')->put($imagePath, file_get_contents($image));
            $validated['character_image'] = Storage::disk('s3')->url($imagePath);
        } else {
            $validated['character_image'] = null;
        }

        $character = Character::create($validated);

        return redirect()->route('dashboard.characters.show', $character->id)
            ->with('success', 'Character created successfully.');
    }

    public function show(Character $character)
    {
        $character->load('franchise');
        return view('dashboard.show.character', compact('character'));
    }

    public function edit(Character $character)
    {
        $franchises = Franchise::orderBy('franchise_name')->get();
        return view('dashboard.edit.character', compact('character', 'franchises'));
    }

    public function update(Request $request, Character $character)
    {
        $validated = $request->validate([
            'character_name' => 'required|string|max:255',
            'franchise_id' => 'required|exists:franchises,id',
            'character_image' => 'nullable|image|mimes:png|max:2048',
            'character_description' => 'nullable|string',
            'description_source' => 'nullable|url|max:255',
        ]);

        $franchise = Franchise::findOrFail($validated['franchise_id']);
        $franchiseSlug = Str::slug($franchise->franchise_name, '_');
        $slugName = Str::slug($validated['character_name'], '_');
        $validated['slug_name'] = $slugName;

        $oldFranchise = $character->franchise;
        $oldFranchiseSlug = Str::slug($oldFranchise->franchise_name, '_');
        $oldSlugName = $character->slug_name;

        $oldImagePath = "images/characters/{$oldFranchiseSlug}/{$oldSlugName}.png";
        $newImagePath = "images/characters/{$franchiseSlug}/{$slugName}.png";

        if ($request->hasFile('character_image')) {
            // Delete old image if it exists
            if (Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->delete($oldImagePath);
            }
            $image = $request->file('character_image');
            Storage::disk('s3')->put($newImagePath, file_get_contents($image));
            $validated['character_image'] = Storage::disk('s3')->url($newImagePath);
        } else {
            // If the name or franchise changed, rename/move the path in S3
            if (($franchiseSlug !== $oldFranchiseSlug || $slugName !== $oldSlugName) && Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->put($newImagePath, Storage::disk('s3')->get($oldImagePath));
                Storage::disk('s3')->delete($oldImagePath);
            }
            $validated['character_image'] = Storage::disk('s3')->url($newImagePath);
        }

        $character->update($validated);

        return redirect()->route('dashboard.characters.show', $character->id)
            ->with('success', 'Character updated successfully.');
    }

    public function destroy(Character $character)
    {
        $oldFranchise = $character->franchise;
        $oldFranchiseSlug = Str::slug($oldFranchise->franchise_name, '_');
        $oldSlugName = $character->slug_name;
        $imagePath = "images/characters/{$oldFranchiseSlug}/{$oldSlugName}.png";
        if ($character->character_image && Storage::disk('s3')->exists($imagePath)) {
            Storage::disk('s3')->delete($imagePath);
        }

        $fumoIds = $character->fumos()->pluck('fumos.id');
        if ($fumoIds->count() > 0) {
            Fumo::whereIn('id', $fumoIds)->delete();
        }
        $character->fumos()->detach();

        $character->delete();
        return redirect()->route('dashboard.characters.index')
            ->with('success', 'Character deleted successfully.');
    }
}
