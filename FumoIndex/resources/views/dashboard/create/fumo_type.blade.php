@extends('layouts.admin_app')

@section('title', 'Add Fumo Type')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">Add Fumo Type</h2>
        <form method="POST" action="{{ route('dashboard.fumo_types.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="fumo_type" class="block text-tertiary font-semibold mb-2">Type Name</label>
                <div class="relative">
                    <input type="text" name="fumo_type" id="fumo_type" class="input input-bordered w-full pl-10" value="{{ old('fumo_type') }}" required placeholder="Fumo type name">
                    <i class="fa fa-cube absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('fumo_type')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="type_description" class="block text-tertiary font-semibold mb-2">Description</label>
                <div class="relative">
                    <textarea name="type_description" id="type_description" class="input input-bordered w-full pl-10" rows="3" placeholder="Type description">{{ old('type_description') }}</textarea>
                    <i class="fa fa-align-left absolute left-3 top-4 text-gray-400"></i>
                </div>
                @error('type_description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="fumo_type_image" class="block text-tertiary font-semibold mb-2">Image <span class="text-primary">* Only PNG files!</span></label>
                <div class="relative">
                    <input type="file" name="fumo_type_image" id="fumo_type_image" class="input input-bordered w-full pl-10" accept="image/png">
                    <i class="fa fa-image absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('fumo_type_image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 flex items-center gap-2">
                <input type="hidden" name="is_primary" value="0">
                <input type="checkbox" name="is_primary" id="is_primary" class="checkbox" value="1" {{ old('is_primary') ? 'checked' : '' }}>
                <label for="is_primary" class="text-tertiary font-semibold">Is Primary Type?</label>
                @error('is_primary')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <label for="width" class="block text-tertiary font-semibold mb-2">Width (cm) <span class="text-gray-400">(optional)</span></label>
                    <div class="relative">
                        <input type="number" name="width" id="width" class="input input-bordered w-full pl-10" value="{{ old('width') }}" placeholder="Width in cm">
                        <i class="fa fa-arrows-left-right absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('width')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="height" class="block text-tertiary font-semibold mb-2">Height (cm) <span class="text-primary">*</span></label>
                    <div class="relative">
                        <input type="number" name="height" id="height" class="input input-bordered w-full pl-10" value="{{ old('height') }}" placeholder="Height in cm" required>
                        <i class="fa fa-arrows-up-down absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('height')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <a href="{{ route('dashboard.fumo_types.index') }}" class="btn btn-outline px-6 py-2">Cancel</a>
                <button type="submit" class="btn btn-primary px-6 py-2">Add Fumo Type</button>
            </div>
        </form>
    </div>
</div>
@endsection
