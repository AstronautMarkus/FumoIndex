@extends('layouts.admin_app')

@section('title', $franchise->franchise_name)

@section('content')
<div class="flex flex-col items-center justify-center mt-8 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-7xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start relative">
        <a href="{{ route('dashboard.franchises.edit', $franchise->id) }}"
           class="absolute top-4 right-4 px-3 md:px-4 py-2 btn btn-tertiary z-10 hidden md:inline-block">
            Edit Franchise
        </a>
        <a href="{{ route('dashboard.franchises.edit', $franchise->id) }}"
           class="w-full mb-4 px-3 md:px-4 py-2 btn btn-tertiary md:hidden">
            Edit Franchise
        </a>
        <div class="flex-shrink-0 w-full md:w-1/3 flex justify-center items-center mb-6 md:mb-0">
            <div class="w-56 md:w-64 flex items-center justify-center overflow-hidden">
                <img src="{{ $franchise->franchise_image }}" alt="{{ $franchise->franchise_name }}" class="w-full h-full object-cover pointer-events-none" />
            </div>
        </div>
        <div class="flex flex-col flex-1 w-full md:w-2/3 items-center md:items-start px-0 md:px-8">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $franchise->franchise_name }}</h1>
            <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">Slug: {{ $franchise->slug_name }}</h2>
            <div class="w-full mb-8">
                <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                    <li>
                        <i class="fa-solid fa-users text-secondary mr-2"></i>
                        <strong>Characters:</strong>
                        @if($franchise->characters->count())
                            @foreach($franchise->characters as $character)
                                <a href="{{ route('dashboard.characters.show', $character->id) }}" class="text-blue-500 hover:underline">{{ $character->character_name }}</a>@if (!$loop->last), @endif
                            @endforeach
                        @else
                            <span class="text-gray-600">No characters for this franchise.</span>
                        @endif
                    </li>
                    <li>
                        <i class="fa-solid fa-calendar-plus text-secondary mr-2"></i>
                        <strong>Created at:</strong> {{ $franchise->created_at ? $franchise->created_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-calendar-check text-secondary mr-2"></i>
                        <strong>Updated at:</strong> {{ $franchise->updated_at ? $franchise->updated_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center mt-8">
        <a href="{{ route('dashboard.franchises.index') }}" class="px-3 md:px-4 py-4 btn btn-primary">
            Back to Franchises Management
        </a>
    </div>
</div>
@endsection
