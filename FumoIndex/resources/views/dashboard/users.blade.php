@extends('layouts.admin_app')

@section('title', 'Users Management')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-primary">Users Management</h2>
                <a href="" class="btn btn-primary text-white px-4 py-2 shadow">
                    <i class="fa-solid fa-plus mr-2"></i> Add User
                </a>
            </div>
            <form method="GET" action="" class="flex flex-wrap gap-4 mb-6 items-center">
                <div class="relative w-64">
                    <i class="fa fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users..." class="input input-bordered w-full pl-10" />
                </div>
                <button type="submit" class="btn btn-secondary px-4 py-2">Filter</button>
                @if(request('search'))
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-outline px-4 py-2">Reset</a>
                @endif
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-2xl shadow-lg border-4 border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Full Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Username</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Is Admin?</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-tertiary uppercase tracking-wider">Joined At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-primary hover:underline">
                                <a href="{{ route('dashboard.users.show', $user->id) }}">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-primary">{{ $user->username ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-primary">{{ $user->is_admin ? 'Yes' : 'No'}} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-primary">{{ $user->created_at}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-tertiary">No users found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
