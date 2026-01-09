@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="flex flex-col items-center justify-center mt-16 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-5xl flex flex-col items-center relative">
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-primary text-center">Edit Profile <i class="fa-solid fa-user-edit"></i></h1>
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="w-full flex flex-col gap-4" method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-tertiary font-semibold mb-1">First Name</label>
                <div class="relative">
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="input input-bordered w-full pl-10" placeholder="First Name" required>
                    <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">Last Name</label>
                <div class="relative">
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="input input-bordered w-full pl-10" placeholder="Last Name" required>
                    <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">Username</label>
                <div class="relative">
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="input input-bordered w-full pl-10" placeholder="Username" required>
                    <i class="fa fa-user-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <label class="block text-tertiary font-semibold mb-1">Email</label>
                <div class="relative">
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full pl-10" placeholder="Email" required>
                    <i class="fa fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('dashboard.profile') }}" class="btn btn-secondary mr-2 px-4 py-2 font-semibold">Cancel</a>
                <button type="submit" class="btn btn-primary px-4 py-2 font-semibold">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
