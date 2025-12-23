@extends('layouts.admin_app')

@section('title', 'Characters Management')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-primary">Characters Management</h2>
                <a href="{{ route('dashboard.characters.create') }}" class="btn btn-primary text-white px-4 py-2 shadow">
                    <i class="fa-solid fa-plus mr-2"></i> Add Character
                </a>
            </div>

            <form method="GET" action="{{ route('dashboard.characters.index') }}" class="flex flex-wrap gap-4 mb-6 items-center">
                <div class="relative w-64">
                    <i class="fa fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search characters..." class="input input-bordered w-full pl-10" />
                </div>
                <div class="relative w-64">
                    <i class="fa fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <select name="franchise_id" class="input input-bordered w-full pl-10">
                        <option value="">All Franchises</option>
                        @foreach($franchises as $franchise)
                            <option value="{{ $franchise->id }}" {{ request('franchise_id') == $franchise->id ? 'selected' : '' }}>
                                {{ $franchise->franchise_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary px-4 py-2">Filter</button>
                @if(request('search') || request('franchise_id'))
                    <a href="{{ route('dashboard.characters.index') }}" class="btn btn-outline px-4 py-2">Reset</a>
                @endif
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-2xl shadow-lg border-4 border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Franchise</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Description Source</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Has Fumos?</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-tertiary uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($characters as $character)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('assets/characters/' . $character->character_image) }}" alt="{{ $character->character_name }}" class="pointer-events-none h-18 object-cover border-2 border-secondary">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-primary">
                                <a href="{{ route('dashboard.characters.show', $character->id) }}" class="hover:underline">{{ $character->character_name }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">
                                {{ $character->franchise->franchise_name ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-700 max-w-xs">
                                {{ Str::limit($character->character_description, 40) ?? 'No description available.' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 max-w-xs">
                                @if(!empty($character->description_source))
                                    <a href="{{ $character->description_source }}" target="_blank" class="text-blue-500 hover:underline">
                                        {{ Str::limit($character->description_source, 30) }}
                                    </a>
                                @else
                                    <span class="text-gray-400">No source available.</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">
                                {{ $character->fumos->count() > 0 ? 'Yes (' . $character->fumos->count() . ')' : 'No' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="{{ route('dashboard.characters.edit', $character->id) }}" class="inline-block text-blue-500 hover:text-blue-700 mr-3" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                @php $fumoCount = $character->fumos->count(); @endphp
                                <button type="button" class="text-red-500 hover:text-red-700 cursor-pointer" title="Delete"
                                    onclick="showDeleteModal({{ $character->id }}, '{{ addslashes($character->character_name) }}', {{ $fumoCount }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <form id="deleteCharacterForm{{ $character->id }}" action="{{ route('dashboard.characters.destroy', $character->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-tertiary">No characters found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $characters->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

<div id="deleteCharacterModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden opacity-0 transition-opacity duration-300" style="pointer-events: none;">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 max-w-md w-full relative">
        <button id="closeDeleteCharacterModal" class="absolute top-4 right-4 text-primary hover:text-primary-light text-2xl focus:outline-none cursor-pointer" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
        <h3 class="text-2xl font-bold mb-6 text-primary text-center">Confirm Delete</h3>
        <p class="text-gray-700 mb-4 text-base leading-relaxed text-center">
            Are you sure you want to delete <span id="deleteCharacterName" class="font-semibold text-red-500"></span>?
            <span id="deleteCharacterFumoWarning" class="block mt-2"></span>
            This action cannot be undone.
        </p>
        <div class="flex gap-4 mt-6 justify-center">
            <button id="confirmDeleteCharacterBtn" class="btn btn-primary px-6 py-2 text-lg">Confirm</button>
            <button id="cancelDeleteCharacterBtn" class="btn btn-tertiary px-6 py-2 text-lg">Cancel</button>
        </div>
    </div>
</div>

@push('scripts')
<script> 
    let deleteModal = document.getElementById('deleteCharacterModal');
    let isDeleteModalAnimating = false;
    let deleteCharacterId = null;

    function showDeleteModal(id, name, fumoCount) {
        if (isDeleteModalAnimating) return;
        deleteCharacterId = id;
        document.getElementById('deleteCharacterName').textContent = name;
        let warning = '';
        if (fumoCount > 0) {
            warning = `<span class="text-blue-500 font-semibold">${name} has ${fumoCount} associated Fumo${fumoCount > 1 ? 's' : ''}</span> which will also be <span class="text-red-500 font-semibold">deleted recursively</span>.<br>`;
        }
        document.getElementById('deleteCharacterFumoWarning').innerHTML = warning;
        isDeleteModalAnimating = true;
        deleteModal.classList.remove('hidden');
        setTimeout(() => {
            deleteModal.classList.add('opacity-100');
            deleteModal.classList.remove('opacity-0');
            deleteModal.style.pointerEvents = 'auto';
        }, 10);
        setTimeout(() => {
            isDeleteModalAnimating = false;
        }, 300);
    }

    function hideDeleteModal() {
        if (isDeleteModalAnimating) return;
        isDeleteModalAnimating = true;
        deleteModal.classList.remove('opacity-100');
        deleteModal.classList.add('opacity-0');
        deleteModal.style.pointerEvents = 'none';
        setTimeout(() => {
            deleteModal.classList.add('hidden');
            isDeleteModalAnimating = false;
        }, 300);
    }

    document.getElementById('closeDeleteCharacterModal').onclick = hideDeleteModal;
    document.getElementById('cancelDeleteCharacterBtn').onclick = hideDeleteModal;
    document.getElementById('confirmDeleteCharacterBtn').onclick = function() {
        if (deleteCharacterId) {
            document.getElementById('deleteCharacterForm' + deleteCharacterId).submit();
        }
    };
    deleteModal.onclick = function(e) {
        if (e.target === this) hideDeleteModal();
    };
</script>
@endpush