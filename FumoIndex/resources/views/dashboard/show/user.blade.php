@extends('layouts.admin_app')

@section('title', 'User Details')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-4xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <h2 class="text-3xl font-bold text-primary mb-6">User Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-semibold text-tertiary mb-2">First Name</h3>
                    <p class="text-primary">{{ $user->first_name }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-tertiary mb-2">Last Name</h3>
                    <p class="text-primary">{{ $user->last_name }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-tertiary mb-2">Username</h3>
                    <p class="text-primary">{{ $user->username ?? 'N/A' }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-tertiary mb-2">Is Admin?</h3>
                    <p class="text-primary">{{ $user->is_admin ? 'Yes' : 'No' }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-tertiary mb-2">Joined At</h3>
                    <p class="text-primary">{{ $user->created_at }}</p>
                </div>
            </div>
            <div class="mt-8">
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary px-4 py-2">Back to Users</a>
            </div>
        </div>
    </div>
</div>
@endsection
