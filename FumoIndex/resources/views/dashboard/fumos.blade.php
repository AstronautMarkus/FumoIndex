@extends('layouts.admin_app')

@section('title', 'Fumos Management')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-primary">Fumos Management</h2>
                <a href="{{ route('dashboard.fumos.create') }}" class="btn btn-primary text-white px-4 py-2 shadow">
                    <i class="fa-solid fa-plus mr-2"></i> Add Fumo
                </a>
            </div>
            <form method="GET" action="{{ route('dashboard.fumos.index') }}" class="flex flex-wrap gap-4 mb-6 items-center">
                <div class="relative w-64">
                    <i class="fa fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search fumos..." class="input input-bordered w-full pl-10" />
                </div>
                <button type="submit" class="btn btn-secondary px-4 py-2">Filter</button>
                @if(request('search'))
                    <a href="{{ route('dashboard.fumos.index') }}" class="btn btn-outline px-4 py-2">Reset</a>
                @endif
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-2xl shadow-lg border-4 border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Gift Code</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Version</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Character(s)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-tertiary uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fumos as $fumo)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">{{ $fumo->gift_code }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-primary">
                                <a href="{{ route('dashboard.fumos.show', $fumo->id) }}" class="hover:underline">{{ $fumo->fumo_name }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">{{ $fumo->version }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">
                                @foreach($fumo->character as $character)
                                    <a href="{{ route('dashboard.characters.show', $character->id) }}" class="text-blue-500 hover:underline">{{ $character->character_name }}</a>@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-tertiary">{{ $fumo->type->fumo_type ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="{{ route('dashboard.fumos.edit', $fumo->id) }}" class="inline-block text-blue-500 hover:text-blue-700 mr-3" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form id="deleteFumoForm{{ $fumo->id }}" action="{{ route('dashboard.fumos.destroy', $fumo->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button"
                                    class="text-red-500 hover:text-red-700 cursor-pointer"
                                    title="Delete"
                                    onclick="if(confirm('Are you sure you want to delete this fumo?')) document.getElementById('deleteFumoForm{{ $fumo->id }}').submit();"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-tertiary">No fumos found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $fumos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
