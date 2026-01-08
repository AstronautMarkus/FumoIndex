@extends('layouts.admin_app')

@section('title', 'Add Fumo')

@section('content')
<div class="flex flex-col items-center justify-center mt-16 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-6xl flex flex-col items-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-primary text-center">Add Fumo</h1>
        <form method="POST" action="{{ route('dashboard.fumos.store') }}" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
            @csrf
            <div>
                <label for="fumo_name" class="block text-tertiary font-semibold mb-1">Fumo Name <span class="text-primary">*</span></label>
                <div class="relative">
                    <input id="fumo_name" type="text" name="fumo_name" value="{{ old('fumo_name') }}" required class="input input-bordered w-full pl-10" placeholder="Fumo name">
                    <i class="fa fa-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('fumo_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="gift_code" class="block text-tertiary font-semibold mb-1">Gift Code <span class="text-primary">*</span></label>
                <div class="relative">
                    <input id="gift_code" type="text" name="gift_code" value="{{ old('gift_code') }}" required class="input input-bordered w-full pl-10" placeholder="Gift code">
                    <i class="fa fa-gift absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('gift_code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="fumo_image" class="block text-tertiary font-semibold mb-1">Image <span class="text-primary">* Only PNG files!</span></label>
                <div class="relative">
                    <input id="fumo_image" type="file" name="fumo_image" class="input input-bordered w-full pl-10" accept="image/png">
                    <i class="fa fa-image absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="grid grid-cols-2 gap-6 w-full mt-4">
                    <div class="flex flex-col items-center">
                        <p class="text-tertiary font-semibold mb-2 hidden" id="image-preview-label">Image Preview:</p>
                        <img src="" alt="New image preview" class="w-36 object-cover pointer-events-none hidden" id="new-image-preview">
                        <button type="button" id="cancel-image-btn" class="btn btn-primary mt-2 py-4 px-4 hidden">Cancel</button>
                    </div>
                </div>
                @error('fumo_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="gallery_images" class="block text-tertiary font-semibold mb-1">Gallery Images <span class="text-primary">(Optional, PNG, multiple)</span></label>
                <div class="relative">
                    <input id="gallery_images" type="file" name="gallery_images[]" class="input input-bordered w-full pl-10" accept="image/png" multiple>
                    <i class="fa fa-images absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <small class="text-gray-500">You can upload multiple PNG images for the Fumo gallery.</small>
                @error('gallery_images')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                @error('gallery_images.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="version" class="block text-tertiary font-semibold mb-1">Version <span class="text-primary">*</span></label>
                <div class="relative">
                    <input id="version" type="text" name="version" value="{{ old('version') }}" required class="input input-bordered w-full pl-10" placeholder="Version">
                    <i class="fa fa-hashtag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('version')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="type_id" class="block text-tertiary font-semibold mb-1">Fumo Type <span class="text-primary">*</span></label>
                <div class="relative">
                    <select id="type_id" name="type_id" required class="input input-bordered w-full pl-10">
                        <option value="">Select type</option>
                        <optgroup label="Primary Categories">
                            @foreach($primaryFumoTypes as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->fumo_type }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Secondary Categories">
                            @foreach($secondaryFumoTypes as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->fumo_type }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <i class="fa fa-cube absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('type_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="franchise_id" class="block text-tertiary font-semibold mb-1">Franchise <span class="text-primary">*</span></label>
                <div class="relative">
                    <select id="franchise_id" name="franchise_id" class="input input-bordered w-full pl-10" required>
                        <option value="">Select franchise</option>
                    </select>
                    <i class="fa fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <small class="text-gray-500">Selecting a franchise will load its characters below.</small>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">Characters <span class="text-primary">*</span></label>
                <div class="relative">
                    <div id="character-checkboxes-scroll" class="input max-h-64 overflow-y-auto p-2 pl-10">
                        <div id="character-checkboxes" class="flex flex-wrap gap-2">
                            <span class="text-gray-400">Select a franchise first.</span>
                        </div>
                    </div>
                    <small class="text-gray-500">You can select one or more characters if the fumo represents multiple characters, for example a Mug with many characters designed on it.</small>

                    <i class="fa fa-user absolute left-3 top-4 text-gray-400"></i>
                </div>
                @error('character_ids')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="official_url" class="block text-tertiary font-semibold mb-1">Official URL</label>
                <div class="relative">
                    <input id="official_url" type="url" name="official_url" value="{{ old('official_url') }}" class="input input-bordered w-full pl-10" placeholder="https://...">
                    <i class="fa fa-link absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('official_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="notes" class="block text-tertiary font-semibold mb-1">Notes</label>
                <div class="relative">
                    <textarea id="notes" name="notes" class="input input-bordered w-full pl-10" rows="2" placeholder="Notes...">{{ old('notes') }}</textarea>
                    <i class="fa fa-align-left absolute left-3 top-4 text-gray-400"></i>
                </div>
                @error('notes')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-full mt-2 py-3 text-lg">Add Fumo</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('dashboard.fumos.index') }}" class="text-tertiary font-semibold hover:underline ml-2">Back to Fumos Management</a>
        </div>
    </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load franchises
    fetch("{{ route('dashboard.utils.franchises') }}")
        .then(res => res.json())
        .then(franchises => {
            const select = document.getElementById('franchise_id');
            franchises.forEach(f => {
                const opt = document.createElement('option');
                opt.value = f.slug_name;
                opt.textContent = f.franchise_name;
                select.appendChild(opt);
            });
        });

    // Franchise change event
    document.getElementById('franchise_id').addEventListener('change', function() {
        const slug = this.value;
        // Change to use the new scrollable container
        const container = document.getElementById('character-checkboxes');
        container.innerHTML = '';
        if (!slug) {
            container.innerHTML = '<span class="text-gray-400">Select a franchise first.</span>';
            return;
        }
        // Use the route helper with a placeholder and replace it
        let url = "{{ route('dashboard.utils.characters', ['franchise_slug' => '___SLUG___']) }}";
        url = url.replace('___SLUG___', encodeURIComponent(slug));
        fetch(url)
            .then(res => res.json())
            .then(characters => {
                if (!characters.length) {
                    container.innerHTML = '<span class="text-gray-400">No characters for this franchise.</span>';
                    return;
                }
                characters.forEach(character => {
                    const label = document.createElement('label');
                    label.className = 'inline-flex items-center';
                    const input = document.createElement('input');
                    input.type = 'checkbox';
                    input.name = 'character_ids[]';
                    input.value = character.id;
                    input.className = 'checkbox';
                    label.appendChild(input);
                    const span = document.createElement('span');
                    span.className = 'ml-2';
                    span.textContent = character.character_name;
                    label.appendChild(span);
                    container.appendChild(label);
                });
            });
    });

    // Image preview logic
    const imageInput = document.getElementById('fumo_image');
    const previewImg = document.getElementById('new-image-preview');
    const cancelBtn = document.getElementById('cancel-image-btn');
    const previewLabel = document.getElementById('image-preview-label');

    imageInput.addEventListener('change', function(e) {
        const file = this.files[0];
        if (file && file.type === 'image/png') {
            const reader = new FileReader();
            reader.onload = function(evt) {
                previewImg.src = evt.target.result;
                previewImg.classList.remove('hidden');
                cancelBtn.classList.remove('hidden');
                previewLabel.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            previewImg.src = '';
            previewImg.classList.add('hidden');
            cancelBtn.classList.add('hidden');
            previewLabel.classList.add('hidden');
        }
    });

    cancelBtn.addEventListener('click', function() {
        imageInput.value = '';
        previewImg.src = '';
        previewImg.classList.add('hidden');
        cancelBtn.classList.add('hidden');
        previewLabel.classList.add('hidden');
    });
});
</script>
@endpush
@endsection
