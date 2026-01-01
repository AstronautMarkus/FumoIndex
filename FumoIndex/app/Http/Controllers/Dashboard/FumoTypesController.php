<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FumoType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FumoTypesController extends Controller
{
    public function index(Request $request)
    {
        $query = FumoType::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('fumo_type', 'like', "%{$search}%")
                  ->orWhere('type_description', 'like', "%{$search}%");
        }

        $fumo_types = $query->orderBy('is_primary', 'desc')->orderBy('id', 'asc')->paginate(10)->withQueryString();
        return view('dashboard.fumo_types', compact('fumo_types'));
    }

    public function create()
    {
        return view('dashboard.create.fumo_type');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fumo_type' => 'required|string|max:255',
            'type_description' => 'nullable|string',
            'fumo_type_image' => 'nullable|image|mimes:png|max:2048',
            'is_primary' => 'nullable|in:0,1,true,false',
            'width' => 'nullable|integer',
            'height' => 'required|integer',
        ],[
            'fumo_type_image.mimes' => 'The fumo type image must be a PNG file.',
            'fumo_type_image.max' => 'The fumo type image may not be greater than 2 MB.',
        ]);

        $slugName = Str::slug($validated['fumo_type'], '_');
        $imagePath = "images/fumo_types/{$slugName}.png";
        $validated['slug_name'] = $slugName;
        $validated['is_primary'] = $request->boolean('is_primary');

        if ($request->hasFile('fumo_type_image')) {
            $image = $request->file('fumo_type_image');
            Storage::disk('s3')->put($imagePath, file_get_contents($image));
            $validated['fumo_type_image'] = Storage::disk('s3')->url($imagePath);
        } else {
            $validated['fumo_type_image'] = null;
        }

        $fumoType = FumoType::create($validated);

        return redirect()->route('dashboard.fumo_types.show', $fumoType->id)
            ->with('success', 'Fumo Type created successfully.');
    }

    public function show(FumoType $fumoType)
    {
        return view('dashboard.show.fumo_type', compact('fumoType'));
    }

    public function edit(FumoType $fumoType)
    {
        return view('dashboard.edit.fumo_type', compact('fumoType'));
    }

    public function update(Request $request, FumoType $fumoType)
    {
        $validated = $request->validate([
            'fumo_type' => 'required|string|max:255',
            'type_description' => 'nullable|string',
            'fumo_type_image' => 'nullable|image|mimes:png|max:2048',
            'is_primary' => 'nullable|in:0,1,true,false',
            'width' => 'nullable|integer',
            'height' => 'required|integer',
        ],[
            'fumo_type_image.mimes' => 'The fumo type image must be a PNG file.',
            'fumo_type_image.max' => 'The fumo type image may not be greater than 2 MB.',
        ]);

        $slugName = Str::slug($validated['fumo_type'], '_');
        $validated['slug_name'] = $slugName;
        $validated['is_primary'] = $request->boolean('is_primary');

        $oldSlugName = $fumoType->slug_name;
        $oldImagePath = "images/fumo_types/{$oldSlugName}.png";
        $newImagePath = "images/fumo_types/{$slugName}.png";

        if ($request->hasFile('fumo_type_image')) {
            if (Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->delete($oldImagePath);
            }
            $image = $request->file('fumo_type_image');
            Storage::disk('s3')->put($newImagePath, file_get_contents($image));
            $validated['fumo_type_image'] = Storage::disk('s3')->url($newImagePath);
        } else {
            if ($slugName !== $oldSlugName && Storage::disk('s3')->exists($oldImagePath)) {
                Storage::disk('s3')->put($newImagePath, Storage::disk('s3')->get($oldImagePath));
                Storage::disk('s3')->delete($oldImagePath);
            }
            $validated['fumo_type_image'] = Storage::disk('s3')->url($newImagePath);
        }

        $fumoType->update($validated);

        return redirect()->route('dashboard.fumo_types.show', $fumoType->id)
            ->with('success', 'Fumo Type updated successfully.');
    }

    public function destroy(FumoType $fumoType)
    {
        $oldSlugName = $fumoType->slug_name;
        $imagePath = "images/fumo_types/{$oldSlugName}.png";
        if ($fumoType->fumo_type_image && Storage::disk('s3')->exists($imagePath)) {
            Storage::disk('s3')->delete($imagePath);
        }

        $fumoType->delete();
        return redirect()->route('dashboard.fumo_types.index')
            ->with('success', 'Fumo Type deleted successfully.');
    }
}
