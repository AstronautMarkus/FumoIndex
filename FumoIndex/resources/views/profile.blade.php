@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="flex flex-col items-center justify-center mt-16 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-5xl flex flex-col items-center relative">
        <a href="{{ route('profile.edit') }}" class="absolute top-6 right-6 btn btn-primary px-4 py-2 text-sm font-semibold">
            <i class="fa fa-edit mr-2"></i>Edit Profile
        </a>
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-primary text-center">User Profile <i class="fa-solid fa-user"></i></h1>
        <form class="w-full flex flex-col gap-4">
            <div>
                <label class="block text-tertiary font-semibold mb-1">First Name</label>
                <div class="relative">
                    <input type="text" value="{{ $user->first_name }}" disabled class="input input-bordcered w-full pl-10 bg-gray-100 cursor-not-allowed" placeholder="First Name">
                    <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">Last Name</label>
                <div class="relative">
                    <input type="text" value="{{ $user->last_name }}" disabled class="input input-bordered w-full pl-10 bg-gray-100 cursor-not-allowed" placeholder="Last Name">
                    <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">Username</label>
                <div class="relative">
                    <input type="text" value="{{ $user->username }}" disabled class="input input-bordered w-full pl-10 bg-gray-100 cursor-not-allowed" placeholder="Username">
                    <i class="fa fa-user-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">Email</label>
                <div class="relative">
                    <input type="email" value="{{ $user->email }}" disabled class="input input-bordered w-full pl-10 bg-gray-100 cursor-not-allowed" placeholder="Email">
                    <i class="fa fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">User Role</label>
                <div class="relative">
                    <input type="text" value="@if($user->is_admin) Admin @else User @endif" disabled class="input input-bordered w-full pl-10 bg-gray-100 cursor-not-allowed" placeholder="Role">
                    <i class="fa fa-user-shield absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection