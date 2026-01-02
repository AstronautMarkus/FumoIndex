<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fumo;
use App\Models\Character;
use App\Models\FumoType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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

        return redirect()->route('dashboard.fumos.show', $fumo->id)
            ->with('success', 'Fumo created successfully.');
    }

    public function show(Fumo $fumo)
    {
        $fumo->load(['type', 'character']);
        return view('dashboard.show.fumo', compact('fumo'));
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

        return redirect()->route('dashboard.fumos.show', $fumo->id)
            ->with('success', 'Fumo updated successfully.');
    }

    public function destroy(Fumo $fumo)
    {
        $fumo->character()->detach();
        $fumo->delete();
        return redirect()->route('dashboard.fumos.index')
            ->with('success', 'Fumo deleted successfully.');
    }
}
