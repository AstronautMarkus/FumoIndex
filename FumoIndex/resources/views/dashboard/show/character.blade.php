@extends('layouts.admin_app')

@section('title', $character->character_name)

@section('content')
<div class="flex flex-col items-center justify-center mt-8 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-5xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start relative">
        <a href="{{ route('dashboard.characters.edit', $character->id) }}"
           class="absolute top-4 right-4 px-3 md:px-4 py-2 btn btn-tertiary z-10 hidden md:inline-block">
            Edit Character
        </a>
        <a href="{{ route('dashboard.characters.edit', $character->id) }}"
           class="w-full mb-4 px-3 md:px-4 py-2 btn btn-tertiary md:hidden">
            Edit Character
        </a>
        <div class="flex-shrink-0 w-full md:w-1/3 flex justify-center items-center mb-6 md:mb-0">
            <div class="w-56 h-56 md:w-64 md:h-64 rounded-2xl flex items-center justify-center overflow-hidden">
                <img src="{{ $character->character_image }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover pointer-events-none" />
            </div>
        </div>
        <div class="flex flex-col flex-1 w-full md:w-2/3 items-center md:items-start px-0 md:px-8">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $character->character_name }}</h1>
            <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">
                Franchise: 
                @if($character->franchise)
                    <a href="{{ route('dashboard.franchises.show', $character->franchise->id) }}" class="text-blue-500 hover:underline">{{ $character->franchise->franchise_name }}</a>
                @else
                    N/A
                @endif
            </h2>
            <div class="w-full mb-8">
                <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                    <li>
                        <i class="fa-solid fa-id-card text-secondary mr-2"></i>
                        <strong>Character Name:</strong> <span class="font-mono text-primary">{{ $character->character_name }}</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-align-left text-secondary mr-2"></i>
                        <strong>Description:</strong>
                        @if($character->character_description)
                            <span class="text-gray-700">{{ $character->character_description }}</span>
                        @else
                            <span class="text-gray-600">No description for this character right now.</span>
                        @endif
                    </li>
                    @if($character->description_source)
                    <li>
                        <i class="fa-solid fa-link text-secondary mr-2"></i>
                        <strong>Source:</strong>
                        <a href="{{ $character->description_source }}" class="text-blue-500 hover:underline">{{ $character->description_source }}</a>
                    </li>
                    @endif
                    <li>
                        <i class="fa-solid fa-calendar-plus text-secondary mr-2"></i>
                        <strong>Created at:</strong> {{ $character->created_at ? $character->created_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-calendar-check text-secondary mr-2"></i>
                        <strong>Updated at:</strong> {{ $character->updated_at ? $character->updated_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center mt-8">
        <a href="{{ route('dashboard.characters.index') }}" class="px-3 md:px-4 py-4 btn btn-primary">
            Back to Characters Management
        </a>
    </div>
</div>
@endsection
