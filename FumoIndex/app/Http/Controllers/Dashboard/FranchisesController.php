<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchise;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\Fumo;

class FranchisesController extends Controller
{
    public function index(Request $request)
    {
        $query = Franchise::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('franchise_name', 'like', '%' . $search . '%');
        }

        $franchises = $query->orderBy('franchise_name')->paginate(10)->withQueryString();

        return view('dashboard.franchises', compact('franchises'));
    }

    public function create()
    {
        return view('dashboard.create.franchise');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_name' => 'required|string|max:255',
            'franchise_image' => 'nullable|image|max:2048',
        ]);

        $slugName = Str::slug($validated['franchise_name'], '_');

        if ($request->hasFile('franchise_image')) {
            $image = $request->file('franchise_image');
            $filename = $slugName . '.' . $image->getClientOriginalExtension();
            $directory = public_path("assets/franchises");
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $validated['franchise_image'] = $filename;
        } else {
            $validated['franchise_image'] = "default.png";
        }

        $validated['slug_name'] = $slugName;

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
            'franchise_image' => 'nullable|image|max:2048',
        ]);

        $slugName = Str::slug($validated['franchise_name'], '_');

        if ($request->hasFile('franchise_image')) {
            $image = $request->file('franchise_image');
            $filename = $slugName . '.' . $image->getClientOriginalExtension();
            $directory = public_path("assets/franchises");
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $validated['franchise_image'] = $filename;
        } else {
            unset($validated['franchise_image']);
        }

        $validated['slug_name'] = $slugName;

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
