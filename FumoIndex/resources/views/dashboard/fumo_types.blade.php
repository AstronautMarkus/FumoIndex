@extends('layouts.admin_app')

@section('title', 'Fumo Types Management')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-primary">Fumo Types Management</h2>
                <a href="{{ route('dashboard.fumo_types.create') }}" class="btn btn-primary text-white px-4 py-2 shadow">
                    <i class="fa-solid fa-plus mr-2"></i> Add Fumo Type
                </a>
            </div>
            <form method="GET" action="{{ route('dashboard.fumo_types.index') }}" class="flex flex-wrap gap-4 mb-6 items-center">
                <div class="relative w-64">
                    <i class="fa fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search fumo types..." class="input input-bordered w-full pl-10" />
                </div>
                <button type="submit" class="btn btn-secondary px-4 py-2">Filter</button>
                @if(request('search'))
                    <a href="{{ route('dashboard.fumo_types.index') }}" class="btn btn-outline px-4 py-2">Reset</a>
                @endif
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-2xl shadow-lg border-4 border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Primary?</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Dimensions</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-tertiary uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fumo_types as $fumoType)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $fumoType->fumo_type_image }}" alt="{{ $fumoType->fumo_type }}" class="pointer-events-none h-18 object-cover border-2 border-secondary">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-primary">
                                <a href="{{ route('dashboard.fumo_types.show', $fumoType->id) }}" class="hover:underline">{{ $fumoType->fumo_type }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-700 max-w-xs">
                                {{ Str::limit($fumoType->type_description, 40) ?? 'No description available.' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">
                                {{ $fumoType->is_primary ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">
                                {{ $fumoType->width ?? '?' }} x {{ $fumoType->height ?? '?' }} cm
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="{{ route('dashboard.fumo_types.edit', $fumoType->id) }}" class="inline-block text-blue-500 hover:text-blue-700 mr-3" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form id="deleteFumoTypeForm{{ $fumoType->id }}" action="{{ route('dashboard.fumo_types.destroy', $fumoType->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="text-red-500 hover:text-red-700 cursor-pointer" title="Delete"
                                    onclick="showDeleteFumoTypeModal({{ $fumoType->id }}, '{{ addslashes($fumoType->fumo_type) }}')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-tertiary">No fumo types found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $fumo_types->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

<div id="deleteFumoTypeModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden opacity-0 transition-opacity duration-300" style="pointer-events: none;">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 max-w-md w-full relative">
        <button id="closeDeleteFumoTypeModal" class="absolute top-4 right-4 text-primary hover:text-primary-light text-2xl focus:outline-none cursor-pointer" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
        <h3 class="text-2xl font-bold mb-6 text-primary text-center">Confirm Delete</h3>
        <p class="text-gray-700 mb-4 text-base leading-relaxed text-center">
            Are you sure you want to delete <span id="deleteFumoTypeName" class="font-semibold text-red-500"></span>?
            This action cannot be undone.
        </p>
        <div class="flex gap-4 mt-6 justify-center">
            <button id="confirmDeleteFumoTypeBtn" class="btn btn-primary px-6 py-2 text-lg">Confirm</button>
            <button id="cancelDeleteFumoTypeBtn" class="btn btn-tertiary px-6 py-2 text-lg">Cancel</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let deleteFumoTypeModal = document.getElementById('deleteFumoTypeModal');
    let isDeleteFumoTypeModalAnimating = false;
    let deleteFumoTypeId = null;

    function showDeleteFumoTypeModal(id, name) {
        if (isDeleteFumoTypeModalAnimating) return;
        deleteFumoTypeId = id;
        document.getElementById('deleteFumoTypeName').textContent = name;
        isDeleteFumoTypeModalAnimating = true;
        deleteFumoTypeModal.classList.remove('hidden');
        setTimeout(() => {
            deleteFumoTypeModal.classList.add('opacity-100');
            deleteFumoTypeModal.classList.remove('opacity-0');
            deleteFumoTypeModal.style.pointerEvents = 'auto';
        }, 10);
        setTimeout(() => {
            isDeleteFumoTypeModalAnimating = false;
        }, 300);
    }

    function hideDeleteFumoTypeModal() {
        if (isDeleteFumoTypeModalAnimating) return;
        isDeleteFumoTypeModalAnimating = true;
        deleteFumoTypeModal.classList.remove('opacity-100');
        deleteFumoTypeModal.classList.add('opacity-0');
        deleteFumoTypeModal.style.pointerEvents = 'none';
        setTimeout(() => {
            deleteFumoTypeModal.classList.add('hidden');
            isDeleteFumoTypeModalAnimating = false;
        }, 300);
    }

    document.getElementById('closeDeleteFumoTypeModal').onclick = hideDeleteFumoTypeModal;
    document.getElementById('cancelDeleteFumoTypeBtn').onclick = hideDeleteFumoTypeModal;
    document.getElementById('confirmDeleteFumoTypeBtn').onclick = function() {
        if (deleteFumoTypeId) {
            document.getElementById('deleteFumoTypeForm' + deleteFumoTypeId).submit();
        }
    };
    deleteFumoTypeModal.onclick = function(e) {
        if (e.target === this) hideDeleteFumoTypeModal();
    };
</script>
@endpush
