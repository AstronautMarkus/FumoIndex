@extends('layouts.admin_app')

@section('title', 'Edit Fumo Type')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">Edit Fumo Type</h2>
        <form method="POST" action="{{ route('dashboard.fumo_types.update', $fumoType->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="fumo_type" class="block text-tertiary font-semibold mb-2">Type Name</label>
                <div class="relative">
                    <input type="text" name="fumo_type" id="fumo_type" class="input input-bordered w-full pl-10" value="{{ old('fumo_type', $fumoType->fumo_type) }}" required placeholder="Fumo type name">
                    <i class="fa fa-cube absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('fumo_type')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="type_description" class="block text-tertiary font-semibold mb-2">Description</label>
                <div class="relative">
                    <textarea name="type_description" id="type_description" class="input input-bordered w-full pl-10" rows="3" placeholder="Type description">{{ old('type_description', $fumoType->type_description) }}</textarea>
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
                <div class="grid grid-cols-2 gap-6 w-full mt-4">
                    <div class="flex flex-col items-center">
                        <p class="text-tertiary font-semibold mb-2">Current image:</p>
                        @if($fumoType->fumo_type_image)
                            <img src="{{ $fumoType->fumo_type_image }}" alt="Current Image" class="w-36 object-cover pointer-events-none border-2 border-secondary" id="current-image">
                        @else
                            <span class="text-gray-400">No image</span>
                        @endif
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="text-tertiary font-semibold mb-2">New image:</p>
                        <img src="" alt="New image preview" class="w-36 object-cover pointer-events-none border-2 border-secondary hidden" id="new-image-preview">
                        <button type="button" id="cancel-image-btn" class="btn btn-primary mt-2 py-4 px-4 hidden">Cancel</button>
                    </div>
                </div>
                @error('fumo_type_image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 flex items-center gap-2">
                <input type="hidden" name="is_primary" value="0">
                <input type="checkbox" name="is_primary" id="is_primary" class="checkbox" value="1" {{ old('is_primary', $fumoType->is_primary) ? 'checked' : '' }}>
                <label for="is_primary" class="text-tertiary font-semibold">Is Primary Type?</label>
                @error('is_primary')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <label for="width" class="block text-tertiary font-semibold mb-2">Width (cm) <span class="text-gray-400">(optional)</span></label>
                    <div class="relative">
                        <input type="number" name="width" id="width" class="input input-bordered w-full pl-10" value="{{ old('width', $fumoType->width) }}" placeholder="Width in cm">
                        <i class="fa fa-arrows-left-right absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('width')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="height" class="block text-tertiary font-semibold mb-2">Height (cm) <span class="text-primary">*</span></label>
                    <div class="relative">
                        <input type="number" name="height" id="height" class="input input-bordered w-full pl-10" value="{{ old('height', $fumoType->height) }}" placeholder="Height in cm" required>
                        <i class="fa fa-arrows-up-down absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('height')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <a href="{{ route('dashboard.fumo_types.index') }}" class="btn btn-outline px-6 py-2">Cancel</a>
                <button type="submit" class="btn btn-primary px-6 py-2">Update Fumo Type</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('fumo_type_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('new-image-preview');
    const cancelBtn = document.getElementById('cancel-image-btn');
    if (file && file.type === 'image/png') {
        const reader = new FileReader();
        reader.onload = function(ev) {
            preview.src = ev.target.result;
            preview.classList.remove('hidden');
            cancelBtn.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.classList.add('hidden');
        cancelBtn.classList.add('hidden');
    }
});

document.getElementById('cancel-image-btn').addEventListener('click', function() {
    const fileInput = document.getElementById('fumo_type_image');
    const preview = document.getElementById('new-image-preview');
    this.classList.add('hidden');
    preview.src = '';
    preview.classList.add('hidden');
    fileInput.value = '';
});
</script>
@endpush
