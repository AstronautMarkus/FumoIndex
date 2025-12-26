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
        $oldImagePath = $franchise->franchise_image
            ? ltrim(parse_url($franchise->franchise_image, PHP_URL_PATH), '/')
            : null;
        $newImagePath = "images/franchises/{$slugName}.png";
        $validated['slug_name'] = $slugName;

        if ($request->hasFile('franchise_image')) {
            // If a new image is uploaded, delete the old one and upload the new one
            if ($oldImagePath && Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->delete($oldImagePath);
            }
            $image = $request->file('franchise_image');
            Storage::disk('s3')->put($newImagePath, file_get_contents($image));
            $validated['franchise_image'] = Storage::disk('s3')->url($newImagePath);
        } else {
            // If only the name changed and there is an image, move the file in S3 and update the URL
            if (
                $slugName !== $oldSlugName &&
                $oldImagePath &&
                Storage::disk('s3')->exists($oldImagePath)
            ) {
                // Move the file (rename) in S3
                Storage::disk('s3')->move($oldImagePath, $newImagePath);
                $validated['franchise_image'] = Storage::disk('s3')->url($newImagePath);
            } elseif ($slugName !== $oldSlugName && $franchise->franchise_image) {
                // If the URL changed but the old file doesn't exist (rare case), just update the URL
                $validated['franchise_image'] = Storage::disk('s3')->url($newImagePath);
            } elseif (!$franchise->franchise_image) {
                $validated['franchise_image'] = null;
            } else {
                $validated['franchise_image'] = $franchise->franchise_image;
            }
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
        $franchise->delete();
        return redirect()->route('dashboard.franchises.index')
            ->with('success', 'Franchise deleted successfully.');
    }
}
