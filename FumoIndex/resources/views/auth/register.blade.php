@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex flex-col items-center justify-center mt-16 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-md flex flex-col items-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-primary text-center">Register</h1>
        <form method="POST" action="{{ route('auth.register') }}" class="w-full flex flex-col gap-4">
            @csrf
            <div>
                <label for="first_name" class="block text-tertiary font-semibold mb-1">First Name</label>
                <div class="relative">
                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus class="input input-bordered w-full pl-10" autocomplete="given-name">
                    <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('first_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="last_name" class="block text-tertiary font-semibold mb-1">Last Name</label>
                <div class="relative">
                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required class="input input-bordered w-full pl-10" autocomplete="family-name">
                    <i class="fa fa-user-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('last_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="username" class="block text-tertiary font-semibold mb-1">Username</label>
                <div class="relative">
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required class="input input-bordered w-full pl-10" autocomplete="username">
                    <i class="fa fa-at absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-tertiary font-semibold mb-1">Email</label>
                <div class="relative">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="input input-bordered w-full pl-10" autocomplete="email">
                    <i class="fa fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-tertiary font-semibold mb-1">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required class="input input-bordered w-full pl-10 pr-10" autocomplete="new-password">
                    <i class="fa fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <button type="button" onclick="togglePassword('password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 focus:outline-none">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block text-tertiary font-semibold mb-1">Confirm Password</label>
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" required class="input input-bordered w-full pl-10 pr-10" autocomplete="new-password">
                    <i class="fa fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 focus:outline-none">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-full mt-2 py-3 text-lg">Register</button>
        </form>
        <div class="mt-6 text-center">
            <span class="text-gray-600">Already have an account?</span>
            <a href="{{ route('auth.login.form') }}" class="text-tertiary font-semibold hover:underline ml-2">Login</a>
        </div>
    </div>
</div>
<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const icon = btn.querySelector('i');
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection
