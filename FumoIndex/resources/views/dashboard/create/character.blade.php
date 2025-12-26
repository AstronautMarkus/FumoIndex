@extends('layouts.admin_app')

@section('title', 'Add Character')

@section('content')
<div class="flex flex-col items-center justify-center mt-16 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-lg flex flex-col items-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-primary text-center">Add Character</h1>
        <form method="POST" action="{{ route('dashboard.characters.store') }}" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
            @csrf
            <div>
                <label for="character_name" class="block text-tertiary font-semibold mb-1">Name</label>
                <div class="relative">
                    <input id="character_name" type="text" name="character_name" value="{{ old('character_name') }}" required class="input input-bordered w-full pl-10" placeholder="Character name">
                    <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('character_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="franchise_id" class="block text-tertiary font-semibold mb-1">Franchise</label>
                <div class="relative">
                    <select id="franchise_id" name="franchise_id" required class="input input-bordered w-full pl-10">
                        <option value="">Select franchise</option>
                        @foreach($franchises as $franchise)
                            <option value="{{ $franchise->id }}" {{ old('franchise_id') == $franchise->id ? 'selected' : '' }}>
                                {{ $franchise->franchise_name }}
                            </option>
                        @endforeach
                    </select>
                    <i class="fa fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('franchise_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="character_image" class="block text-tertiary font-semibold mb-1">Image <span class="text-primary">* Only PNG files!</span></label>
                <div class="relative">
                    <input id="character_image" type="file" name="character_image" class="input input-bordered w-full pl-10" accept="image/png">
                    <i class="fa fa-image absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="grid grid-cols-2 gap-6 w-full mt-4">
                    <div class="flex flex-col items-center">
                        <p class="text-tertiary font-semibold mb-2">Image Preview:</p>
                        <img src="" alt="New image preview" class="w-36 object-cover pointer-events-none hidden" id="new-image-preview">
                        <button type="button" id="cancel-image-btn" class="btn btn-primary mt-2 py-4 px-4 hidden">Cancel</button>
                    </div>
                </div>
                @error('character_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="character_description" class="block text-tertiary font-semibold mb-1">Description</label>
                <div class="relative">
                    <textarea id="character_description" name="character_description" class="input input-bordered w-full pl-10" rows="3" placeholder="Character description">{{ old('character_description') }}</textarea>
                    <i class="fa fa-align-left absolute left-3 top-4 text-gray-400"></i>
                </div>
                @error('character_description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description_source" class="block text-tertiary font-semibold mb-1">Description Source</label>
                <div class="relative">
                    <input id="description_source" type="url" name="description_source" value="{{ old('description_source') }}" class="input input-bordered w-full pl-10" placeholder="Source URL">
                    <i class="fa fa-link absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('description_source')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-full mt-2 py-3 text-lg">Add Character</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('dashboard.characters.index') }}" class="text-tertiary font-semibold hover:underline ml-2">Back to Characters Management</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('character_image').addEventListener('change', function(e) {
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
    const fileInput = document.getElementById('character_image');
    const preview = document.getElementById('new-image-preview');
    this.classList.add('hidden');
    preview.src = '';
    preview.classList.add('hidden');
    fileInput.value = '';
});
</script>
@endpush
