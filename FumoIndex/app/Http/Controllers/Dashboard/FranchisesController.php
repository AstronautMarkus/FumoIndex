<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchise;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\Fumo;
use Illuminate\Support\Facades\Storage;

class FranchisesController extends Controller
{
    public function index(Request $request)
    {
        $query = Franchise::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('franchise_name', 'like', '%' . $search . '%');
        }

        $franchises = $query->with(['characters.fumos'])->orderBy('franchise_name')->paginate(10)->withQueryString();

        // Precompute hasFumos for each franchise
        $franchisesHasFumos = [];
        foreach ($franchises as $franchise) {
            $hasFumos = false;
            foreach ($franchise->characters as $character) {
                if ($character->fumos && $character->fumos->count() > 0) {
                    $hasFumos = true;
                    break;
                }
            }
            $franchisesHasFumos[$franchise->id] = $hasFumos;
        }

        return view('dashboard.franchises', compact('franchises', 'franchisesHasFumos'));
    }

    public function create()
    {
        return view('dashboard.create.franchise');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_name' => 'required|string|max:255',
            'franchise_image' => 'nullable|image|mimes:png|max:2048',
        ]);

        $slugName = Str::slug($validated['franchise_name'], '_');
        $imagePath = "images/franchises/{$slugName}.png";
        $validated['slug_name'] = $slugName;

        if ($request->hasFile('franchise_image')) {
            $image = $request->file('franchise_image');
            Storage::disk('s3')->put($imagePath, file_get_contents($image));
            $validated['franchise_image'] = Storage::disk('s3')->url($imagePath);
        } else {
            $validated['franchise_image'] = null;
        }

        $franchise = Franchise::create($validated);

        return redirect()->route('dashboard.franchises.show', $franchise->id)
            ->with('success', 'Franchise created successfully.');
    }

    public function show(Franchise $franchise)
    {
        $franchise->load('characters');
        return view('dashboard.show.franchise', compact('franchise'));
    }

    public function edit(Franchise $franchise)
    {
        return view('dashboard.edit.franchise', compact('franchise'));
    }

    public function update(Request $request, Franchise $franchise)
    {
        $validated = $request->validate([
            'franchise_name' => 'required|string|max:255',
            'franchise_image' => 'nullable|image|mimes:png|max:2048',
        ]);

        $oldSlugName = $franchise->slug_name;
        $slugName = Str::slug($validated['franchise_name'], '_');
        $validated['slug_name'] = $slugName;

        $oldImagePath = "images/franchises/{$oldSlugName}.png";
        $newImagePath = "images/franchises/{$slugName}.png";

        if ($request->hasFile('franchise_image')) {
            // Upload new image and delete old one
            if (Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->delete($oldImagePath);
            }

            $image = $request->file('franchise_image');
            Storage::disk('s3')->put($newImagePath, file_get_contents($image));
            $validated['franchise_image'] = Storage::disk('s3')->url($newImagePath);

        } else {
            // Only the name changed → rename the existing file in S3
            if ($slugName !== $oldSlugName && Storage::disk('s3')->exists($oldImagePath)) {
                // Copy to the new path and delete the old one
                Storage::disk('s3')->put($newImagePath, Storage::disk('s3')->get($oldImagePath));
                Storage::disk('s3')->delete($oldImagePath);
            }

            // Update the URL to the new path even if the file is the same
            $validated['franchise_image'] = Storage::disk('s3')->url($newImagePath);
        }

        $franchise->update($validated);

        return redirect()->route('dashboard.franchises.show', $franchise->id)
            ->with('success', 'Franchise updated successfully.');
    }


    public function destroy(Franchise $franchise)
    {
        // Delete associated characters and their fumos
        foreach ($franchise->characters as $character) {
            $fumoIds = $character->fumos()->pluck('fumos.id');
            if ($fumoIds->count() > 0) {
                Fumo::whereIn('id', $fumoIds)->delete();
            }
            $character->fumos()->detach();
            $character->delete();
        }

        // Delete franchise image from S3 if exists
        $imagePath = "images/franchises/{$franchise->slug_name}.png";
        if ($franchise->franchise_image && \Storage::disk('s3')->exists($imagePath)) {
            \Storage::disk('s3')->delete($imagePath);
        }

        $franchise->delete();
        return redirect()->route('dashboard.franchises.index')
            ->with('success', 'Franchise deleted successfully.');
    }
}
