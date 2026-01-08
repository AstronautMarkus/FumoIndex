<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fumo;
use App\Models\Character;
use App\Models\FumoType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\FumoImage;


class FumosController extends Controller
{
    public function index(Request $request)
    {
        $query = Fumo::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('fumo_name', 'like', "%{$search}%");
        }

        $fumos = $query->with(['type', 'character'])->orderBy('fumo_name')->paginate(10)->withQueryString();

        return view('dashboard.fumos', compact('fumos'));
    }

    public function create()
    {
        $characters = Character::orderBy('character_name')->get();
        $primaryFumoTypes = FumoType::where('is_primary', true)->orderBy('fumo_type')->get();
        $secondaryFumoTypes = FumoType::where('is_primary', false)->orderBy('fumo_type')->get();
        return view('dashboard.create.fumo', compact('characters', 'primaryFumoTypes', 'secondaryFumoTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gift_code' => 'required|string|max:50|unique:fumos,gift_code',
            'version' => 'required|string|max:10',
            'fumo_name' => 'required|string|max:45',
            'official_url' => 'nullable|url|max:255',
            'notes' => 'nullable|string|max:255',
            'type_id' => 'required|exists:fumo_types,id',
            'character_ids' => 'required|array',
            'character_ids.*' => 'exists:characters,id',
            'fumo_image' => 'nullable|image|mimes:png|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:png|max:2048',
        ]);

        $slugName = Str::slug($validated['fumo_name'], '_');
        $imagePath = "images/fumos/{$slugName}.png";
        $fumoImageUrl = null;
        if ($request->hasFile('fumo_image')) {
            $image = $request->file('fumo_image');
            Storage::disk('s3')->put($imagePath, file_get_contents($image));
            $fumoImageUrl = Storage::disk('s3')->url($imagePath);
        }

        $fumo = Fumo::create([
            'gift_code' => $validated['gift_code'],
            'version' => $validated['version'],
            'fumo_name' => $validated['fumo_name'],
            'official_url' => $validated['official_url'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'type_id' => $validated['type_id'],
            'fumo_image' => $fumoImageUrl,
        ]);

        $fumo->character()->sync($validated['character_ids']);

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $request->file('gallery_images');
            $i = 1;
            foreach ($galleryImages as $img) {
                $galleryPath = "images/fumos/{$slugName}/{$i}.png";
                Storage::disk('s3')->put($galleryPath, file_get_contents($img));
                $galleryUrl = Storage::disk('s3')->url($galleryPath);
                FumoImage::create([
                    'fumo_id' => $fumo->id,
                    'image_url' => $galleryUrl,
                ]);
                $i++;
            }
        }

        return redirect()->route('dashboard.fumos.show', $fumo->id)
            ->with('success', 'Fumo created successfully.');
    }

    public function show(Fumo $fumo)
    {
        $fumo->load(['type', 'character.franchise']);
        $franchises = $fumo->character
            ->filter(fn($c) => $c->franchise)
            ->pluck('franchise')
            ->unique('id')
            ->values();
        return view('dashboard.show.fumo', compact('fumo', 'franchises'));
    }

    public function edit(Fumo $fumo)
    {
        $characters = Character::orderBy('character_name')->get();
        $primaryFumoTypes = FumoType::where('is_primary', true)->orderBy('fumo_type')->get();
        $secondaryFumoTypes = FumoType::where('is_primary', false)->orderBy('fumo_type')->get();
        $fumo->load('character');
        return view('dashboard.edit.fumo', compact('fumo', 'characters', 'primaryFumoTypes', 'secondaryFumoTypes'));
    }

    public function update(Request $request, Fumo $fumo)
    {
        $validated = $request->validate([
            'gift_code' => 'required|string|max:50|unique:fumos,gift_code,' . $fumo->id,
            'version' => 'required|string|max:10',
            'fumo_name' => 'required|string|max:45',
            'official_url' => 'nullable|url|max:255',
            'notes' => 'nullable|string|max:255',
            'type_id' => 'required|exists:fumo_types,id',
            'character_ids' => 'required|array',
            'character_ids.*' => 'exists:characters,id',
            'fumo_image' => 'nullable|image|mimes:png|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:png|max:2048',
            'delete_gallery' => 'nullable|array',
            'delete_gallery.*' => 'integer|exists:fumo_images,id',
        ]);

        $oldSlugName = Str::slug($fumo->fumo_name, '_');
        $slugName = Str::slug($validated['fumo_name'], '_');
        $oldImagePath = "images/fumos/{$oldSlugName}.png";
        $newImagePath = "images/fumos/{$slugName}.png";
        $fumoImageUrl = $fumo->fumo_image;

        if ($request->hasFile('fumo_image')) {
            // Upload new image and delete old one
            if ($fumoImageUrl && Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->delete($oldImagePath);
            }
            $image = $request->file('fumo_image');
            Storage::disk('s3')->put($newImagePath, file_get_contents($image));
            $fumoImageUrl = Storage::disk('s3')->url($newImagePath);
        } else {
            // Only the name changed → rename the existing file in S3
            if ($slugName !== $oldSlugName && $fumoImageUrl && Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->put($newImagePath, Storage::disk('s3')->get($oldImagePath));
                Storage::disk('s3')->delete($oldImagePath);
                $fumoImageUrl = Storage::disk('s3')->url($newImagePath);
            }
        }

        $fumo->update([
            'gift_code' => $validated['gift_code'],
            'version' => $validated['version'],
            'fumo_name' => $validated['fumo_name'],
            'official_url' => $validated['official_url'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'type_id' => $validated['type_id'],
            'fumo_image' => $fumoImageUrl,
        ]);

        $fumo->character()->sync($validated['character_ids']);

        // Handle gallery image deletions
        if (!empty($validated['delete_gallery'])) {
            foreach ($validated['delete_gallery'] as $imgId) {
                $img = FumoImage::find($imgId);
                if ($img) {
                    // Remove from S3
                    $imgPath = parse_url($img->image_url, PHP_URL_PATH);
                    $imgPath = ltrim($imgPath, '/');
                    if (Storage::disk('s3')->exists($imgPath)) {
                        Storage::disk('s3')->delete($imgPath);
                    }
                    $img->delete();
                }
            }
        }

        // Handle gallery image uploads (append to end)
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $request->file('gallery_images');
            $existingCount = $fumo->images()->count();
            $i = $existingCount + 1;
            foreach ($galleryImages as $img) {
                $galleryPath = "images/fumos/{$slugName}/{$i}.png";
                Storage::disk('s3')->put($galleryPath, file_get_contents($img));
                $galleryUrl = Storage::disk('s3')->url($galleryPath);
                FumoImage::create([
                    'fumo_id' => $fumo->id,
                    'image_url' => $galleryUrl,
                ]);
                $i++;
            }
        }

        // If slug changed, move all gallery images in S3 and update DB URLs
        if ($slugName !== $oldSlugName) {
            $galleryImages = $fumo->images()->get();
            $newBase = "images/fumos/{$slugName}/";
            $oldBase = "images/fumos/{$oldSlugName}/";
            $idx = 1;
            foreach ($galleryImages as $img) {
                $oldPath = $oldBase . basename(parse_url($img->image_url, PHP_URL_PATH));
                $newPath = $newBase . $idx . '.png';
                if (Storage::disk('s3')->exists($oldPath)) {
                    Storage::disk('s3')->put($newPath, Storage::disk('s3')->get($oldPath));
                    Storage::disk('s3')->delete($oldPath);
                    $img->image_url = Storage::disk('s3')->url($newPath);
                    $img->save();
                }
                $idx++;
            }
        }

        return redirect()->route('dashboard.fumos.show', $fumo->id)
            ->with('success', 'Fumo updated successfully.');
    }

    public function destroy(Fumo $fumo)
    {
        $fumo->character()->detach();

        // Delete gallery images from S3 and DB
        foreach ($fumo->images as $img) {
            $imgPath = parse_url($img->image_url, PHP_URL_PATH);
            $imgPath = ltrim($imgPath, '/');
            if (Storage::disk('s3')->exists($imgPath)) {
                Storage::disk('s3')->delete($imgPath);
            }
            $img->delete();
        }

        // Delete main image from S3
        $slugName = Str::slug($fumo->fumo_name, '_');
        $mainImagePath = "images/fumos/{$slugName}.png";
        if (Storage::disk('s3')->exists($mainImagePath)) {
            Storage::disk('s3')->delete($mainImagePath);
        }

        // Delete gallery folder if exists
        $galleryFolder = "images/fumos/{$slugName}";
        if (Storage::disk('s3')->exists($galleryFolder)) {
            Storage::disk('s3')->deleteDirectory($galleryFolder);
        }
        $fumo->delete();
        return redirect()->route('dashboard.fumos.index')
            ->with('success', 'Fumo deleted successfully.');
    }
}
