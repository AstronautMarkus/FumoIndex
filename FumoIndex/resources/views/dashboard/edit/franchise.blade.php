@extends('layouts.admin_app')

@section('title', 'Edit Franchise')

@section('content')
<div class="flex flex-col items-center justify-center mt-16 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-lg flex flex-col items-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-primary text-center">Edit Franchise</h1>
        <form method="POST" action="{{ route('dashboard.franchises.update', $franchise->id) }}" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div>
                <label for="franchise_name" class="block text-tertiary font-semibold mb-1">Name</label>
                <div class="relative">
                    <input id="franchise_name" type="text" name="franchise_name" value="{{ old('franchise_name', $franchise->franchise_name) }}" required class="input input-bordered w-full pl-10" placeholder="Franchise name">
                    <i class="fa fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('franchise_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="franchise_image" class="block text-tertiary font-semibold mb-1">Image</label>
                <div class="relative">
                    <input id="franchise_image" type="file" name="franchise_image" class="input input-bordered w-full pl-10">
                    <i class="fa fa-image absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                @if($franchise->franchise_image)
                    <img src="{{ asset('assets/franchises/' . $franchise->franchise_image) }}" alt="{{ $franchise->franchise_name }}" class="mt-2 h-24 object-cover pointer-events-none">
                @endif
                @error('franchise_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-full mt-2 py-3 text-lg">Update Franchise</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('dashboard.franchises.index') }}" class="text-tertiary font-semibold hover:underline ml-2">Back to Franchises Management</a>
        </div>
    </div>
</div>
@endsection
