<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Fumo;
use App\Models\Franchise;
use Illuminate\Support\Str;

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
            'character_image' => 'nullable|image|max:2048',
            'character_description' => 'nullable|string',
            'description_source' => 'nullable|url|max:255',
        ]);

        $franchise = Franchise::findOrFail($validated['franchise_id']);
        $franchiseSlug = Str::slug($franchise->franchise_name, '_');
        $slugName = Str::slug($validated['character_name'], '_');

        if ($request->hasFile('character_image')) {
            $image = $request->file('character_image');
            $filename = $slugName . '.' . $image->getClientOriginalExtension();
            $directory = public_path("assets/characters/{$franchiseSlug}");
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $validated['character_image'] = "{$franchiseSlug}/{$filename}";
        } else {
            $validated['character_image'] = "{$franchiseSlug}/default.png";
        }

        $validated['slug_name'] = $slugName;

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
            'character_image' => 'nullable|image|max:2048',
            'character_description' => 'nullable|string',
            'description_source' => 'nullable|url|max:255',
        ]);

        $franchise = Franchise::findOrFail($validated['franchise_id']);
        $franchiseSlug = Str::slug($franchise->franchise_name, '_');
        $slugName = Str::slug($validated['character_name'], '_');

        if ($request->hasFile('character_image')) {
            $image = $request->file('character_image');
            $filename = $slugName . '.' . $image->getClientOriginalExtension();
            $directory = public_path("assets/characters/{$franchiseSlug}");
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $validated['character_image'] = "{$franchiseSlug}/{$filename}";
        } else {
            unset($validated['character_image']);
        }

        $validated['slug_name'] = $slugName;

        $character->update($validated);

        return redirect()->route('dashboard.characters.show', $character->id)
            ->with('success', 'Character updated successfully.');
    }

    public function destroy(Character $character)
    {
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
