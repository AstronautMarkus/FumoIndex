@extends('layouts.admin_app')

@section('title', 'Edit Franchise')

@section('content')
<div class="flex flex-col items-center justify-center mt-16 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-lg flex flex-col items-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-primary text-center">Edit Franchise</h1>
        <form method="POST" action="{{ route('dashboard.franchises.update', $franchise->id) }}" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div>
                <label for="franchise_name" class="block text-tertiary font-semibold mb-1">Name <span class="text-primary">*</span></label>
                <div class="relative">
                    <input id="franchise_name" type="text" name="franchise_name" value="{{ old('franchise_name', $franchise->franchise_name) }}" required class="input input-bordered w-full pl-10" placeholder="Franchise name">
                    <i class="fa fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('franchise_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="franchise_image" class="block text-tertiary font-semibold mb-1">Image <span class="text-primary">Only PNG files!</span></label>
                <div class="relative">
                    <input id="franchise_image" type="file" name="franchise_image" class="input input-bordered w-full pl-10" accept="image/png">
                    <i class="fa fa-image absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <p class="mt-4 text-tertiary font-semibold">Current image:</p>
                <div class="grid grid-cols-2 gap-6 w-full">
                    <div class="flex flex-col items-center">
                        <p class="text-tertiary font-semibold mb-2">Current image:</p>
                        <img src="{{ $franchise->franchise_image }}" alt="{{ $franchise->franchise_name }}" class="w-36 object-cover pointer-events-none" id="current-image">
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="text-tertiary font-semibold mb-2">New image:</p>
                        <img src="" alt="New image preview" class="w-36 object-cover pointer-events-none hidden" id="new-image-preview">
                        <button type="button" id="cancel-image-btn" class="btn btn-primary mt-2 py-4 px-4 hidden">Cancel</button>
                    </div>
                </div>
                @error('franchise_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-full mt-2 py-3 text-lg">Update Franchise</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('dashboard.franchises.index') }}" class="text-tertiary font-semibold hover:underline ml-2">Back to Franchises Management</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('franchise_image').addEventListener('change', function(e) {
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
    const fileInput = document.getElementById('franchise_image');
    const preview = document.getElementById('new-image-preview');
    this.classList.add('hidden');
    preview.src = '';
    preview.classList.add('hidden');
    fileInput.value = '';
});
</script>
@endpush
