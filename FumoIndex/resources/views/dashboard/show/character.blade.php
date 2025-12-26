@extends('layouts.admin_app')

@section('title', $character->character_name)

@section('content')
<div class="flex flex-col items-center justify-center mt-8 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-7xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start relative">
        <a href="{{ route('dashboard.characters.edit', $character->id) }}"
           class="absolute top-4 right-4 px-3 md:px-4 py-2 btn btn-tertiary z-10 hidden md:inline-block">
            Edit Character
        </a>
        <a href="{{ route('dashboard.characters.edit', $character->id) }}"
           class="w-full mb-4 px-3 md:px-4 py-2 btn btn-tertiary md:hidden">
            Edit Character
        </a>
        <div class="w-56 h-56 md:w-64 md:h-64 rounded-full border-4 border-secondary flex items-center justify-center overflow-hidden mr-0 md:mr-12 mb-4 md:mb-0 bg-gradient-to-b from-gray-100 to-gray-300">
            <img src="{{ $character->character_image }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover pointer-events-none" />
        </div>
        <div class="flex flex-col flex-1 items-center md:items-start w-full">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $character->character_name }}</h1>
            <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">{{ $character->franchise->franchise_name ?? 'N/A' }}</h2>
            <div class="border-2 border-gray-300 rounded p-4 md:p-6 mb-4 w-full max-w-xl bg-white">
                <span class="text-xl md:text-2xl font-semibold mb-2 block text-tertiary">Description:</span>
                @if($character->character_description)
                    <p class="text-base md:text-lg text-gray-800">{{ $character->character_description }}</p>
                @else
                    <p class="text-base md:text-lg text-gray-600 mb-2">No description for this character right now.</p>
                @endif
            </div>
            @if($character->description_source)
                <p class="text-xs md:text-sm text-gray-500 mt-2 text-center md:text-left">Source: <a href="{{ $character->description_source }}" class="text-blue-500 hover:underline">{{ $character->description_source }}</a></p>
            @endif                    
        </div>
    </div>
    <div class="w-full flex justify-center mt-8">
        <a href="{{ route('dashboard.characters.index') }}" class="px-3 md:px-4 py-4 btn btn-primary">
            Back to Characters Management
        </a>
    </div>
</div>
@endsection
