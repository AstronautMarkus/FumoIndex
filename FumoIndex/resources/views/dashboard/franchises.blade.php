@extends('layouts.admin_app')

@section('title', 'Franchises Management')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-primary">Franchises Management</h2>
                <a href="{{ route('dashboard.franchises.create') }}" class="btn btn-primary text-white px-4 py-2 shadow">
                    <i class="fa-solid fa-plus mr-2"></i> Add Franchise
                </a>
            </div>

            <form method="GET" action="" class="flex flex-wrap gap-4 mb-6 items-center">
                <div class="relative w-64">
                    <i class="fa fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search franchises..." class="input input-bordered w-full pl-10" />
                </div>
                <button type="submit" class="btn btn-secondary px-4 py-2">Filter</button>
                @if(request('search'))
                    <a href="{{ route('dashboard.franchises.index') }}" class="btn btn-outline px-4 py-2">Reset</a>
                @endif
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-2xl shadow-lg border-4 border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Characters</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-tertiary uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($franchises as $franchise)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $franchise->franchise_image }}" alt="{{ $franchise->franchise_name }}" class="pointer-events-none w-36 object-cover">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-primary">
                                <a href="{{ route('dashboard.franchises.show', $franchise->id) }}" class="hover:underline">{{ $franchise->franchise_name }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">
                                {{ $franchise->slug_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">
                                {{ $franchise->characters->count() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="{{ route('dashboard.franchises.edit', $franchise->id) }}" class="inline-block text-blue-500 hover:text-blue-700 mr-3" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button type="button"
                                    class="text-red-500 hover:text-red-700 cursor-pointer"
                                    title="Delete"
                                    onclick="showDeleteFranchiseModal({{ $franchise->id }}, '{{ addslashes($franchise->franchise_name) }}', {{ $franchise->characters->count() }}, {{ $franchisesHasFumos[$franchise->id] ? 'true' : 'false' }})"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <form id="deleteFranchiseForm{{ $franchise->id }}" action="{{ route('dashboard.franchises.destroy', $franchise->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-tertiary">No franchises found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $franchises->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

<div id="deleteFranchiseModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden opacity-0 transition-opacity duration-300" style="pointer-events: none;">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 max-w-md w-full relative">
        <button id="closeDeleteFranchiseModal" class="absolute top-4 right-4 text-primary hover:text-primary-light text-2xl focus:outline-none cursor-pointer" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
        <h3 class="text-2xl font-bold mb-6 text-primary text-center">Confirm Delete</h3>
        <p class="text-gray-700 mb-4 text-base leading-relaxed text-center">
            Are you sure you want to delete <span id="deleteFranchiseName" class="font-semibold text-red-500"></span>?
            <span id="deleteFranchiseCharacterWarning" class="block mt-2"></span>
            <span id="deleteFranchiseFumoWarning" class="block mt-2"></span>
            This action cannot be undone.
        </p>
        <div class="flex gap-4 mt-6 justify-center">
            <button id="confirmDeleteFranchiseBtn" class="btn btn-primary px-6 py-2 text-lg">Confirm</button>
            <button id="cancelDeleteFranchiseBtn" class="btn btn-tertiary px-6 py-2 text-lg">Cancel</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let deleteFranchiseModal = document.getElementById('deleteFranchiseModal');
    let isDeleteFranchiseModalAnimating = false;
    let deleteFranchiseId = null;

    
    function showDeleteFranchiseModal(id, name, characterCount, hasFumos) {
        if (isDeleteFranchiseModalAnimating) return;
        deleteFranchiseId = id;
        document.getElementById('deleteFranchiseName').textContent = name;
        let warning = '';
        if (characterCount > 0) {
            warning = `<span class="text-blue-500 font-semibold">${name} has ${characterCount} associated character${characterCount > 1 ? 's' : ''}</span> which may also be <span class="text-red-500 font-semibold">deleted recursively</span>.<br>`;
        }
        document.getElementById('deleteFranchiseCharacterWarning').innerHTML = warning;

        // Check Fumos warning
        let fumoWarning = '';
        if (hasFumos) {
            fumoWarning = `<span class="block text-red-600 font-bold text-lg mt-2">ALSO: This will delete ALL associated FUMOS in a dangerous chain reaction!</span>`;
        }
        document.getElementById('deleteFranchiseFumoWarning').innerHTML = fumoWarning;

        isDeleteFranchiseModalAnimating = true;
        deleteFranchiseModal.classList.remove('hidden');
        setTimeout(() => {
            deleteFranchiseModal.classList.add('opacity-100');
            deleteFranchiseModal.classList.remove('opacity-0');
            deleteFranchiseModal.style.pointerEvents = 'auto';
        }, 10);
        setTimeout(() => {
            isDeleteFranchiseModalAnimating = false;
        }, 300);
    }

    function hideDeleteFranchiseModal() {
        if (isDeleteFranchiseModalAnimating) return;
        isDeleteFranchiseModalAnimating = true;
        deleteFranchiseModal.classList.remove('opacity-100');
        deleteFranchiseModal.classList.add('opacity-0');
        deleteFranchiseModal.style.pointerEvents = 'none';
        setTimeout(() => {
            deleteFranchiseModal.classList.add('hidden');
            isDeleteFranchiseModalAnimating = false;
        }, 300);
    }

    document.getElementById('closeDeleteFranchiseModal').onclick = hideDeleteFranchiseModal;
    document.getElementById('cancelDeleteFranchiseBtn').onclick = hideDeleteFranchiseModal;
    document.getElementById('confirmDeleteFranchiseBtn').onclick = function() {
        if (deleteFranchiseId) {
            document.getElementById('deleteFranchiseForm' + deleteFranchiseId).submit();
        }
    };
    deleteFranchiseModal.onclick = function(e) {
        if (e.target === this) hideDeleteFranchiseModal();
    };
</script>
@endpush
