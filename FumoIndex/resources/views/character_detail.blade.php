@extends('layouts.app')

@section('title', 'Character Detail - ' . $character->character_name)

@section('content')
    <div class="flex flex-col items-center justify-center mt-8 mb-6">
        <div class="flex flex-col md:flex-row w-full max-w-4xl items-center md:items-start justify-center md:justify-start">

        <div class="w-40 h-40 md:w-64 md:h-64 rounded-full border-2 border-gray-300 flex items-center justify-center overflow-hidden mr-0 md:mr-8 mb-4 md:mb-0">
                <img src="{{ asset('assets/characters/' . $character->character_image) }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover pointer-events-none" />
            </div>

            <div class="flex flex-col flex-1 items-center md:items-start">
                <h1 class="text-2xl md:text-4xl font-bold mb-2 text-center md:text-left">{{ $character->character_name }}</h1>
                <h2 class="text-lg md:text-2xl mb-4 text-center md:text-left">{{ $franchise->franchise_name }}</h2>

                <div class="border-2 border-gray-300 rounded p-2 md:p-4 mb-4 w-full max-w-md">
                    <span class="text-lg md:text-2xl font-semibold mb-2 block">Description:</span>
                    @if($character->character_description)
                        <p class="text-base md:text-lg">{{ $character->character_description }}</p>
                    @else
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-base md:text-lg text-gray-600 mb-2">No description for this character right now.</p>
                            <a href="/contribute" class="px-3 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition text-center">Contribute a description!</a>
                        </div>
                    @endif
                </div>
                @if($character->description_source)
                    <p class="text-xs md:text-sm text-gray-500 mt-2 text-center md:text-left">Source: <a href="{{ $character->description_source }}" class="text-blue-500 hover:underline">{{ $character->description_source }}</a></p>
                @endif
            </div>
        </div>

        <div class="w-full flex justify-center mt-8">
            <a href="{{ route('characters.list') }}" class="px-3 md:px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                Back to characters list
            </a>
        </div>
    </div>
@endsection