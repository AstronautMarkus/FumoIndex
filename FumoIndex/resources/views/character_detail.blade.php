@extends('layouts.app')

@section('title', 'Character Detail - ' . $character->character_name)

@section('content')
    <div class="flex flex-col items-center justify-center mt-8 mb-6">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-6xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start">
            <div class="w-72 h-72 md:w-96 md:h-96 rounded-full border-4 border-gray-300 flex items-center justify-center overflow-hidden mr-0 md:mr-12 mb-4 md:mb-0 bg-white">
                <img src="{{ asset('assets/characters/' . $character->character_image) }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover pointer-events-none" />
            </div>
            <div class="flex flex-col flex-1 items-center md:items-start w-full">
                <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-tertiary">{{ $character->character_name }}</h1>
                <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">{{ $franchise->franchise_name }}</h2>
                <div class="border-2 border-gray-300 rounded p-4 md:p-6 mb-4 w-full max-w-xl bg-white">
                    <span class="text-xl md:text-2xl font-semibold mb-2 block text-tertiary">Description:</span>
                    @if($character->character_description)
                        <p class="text-base md:text-lg text-gray-800">{{ $character->character_description }}</p>
                    @else
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-base md:text-lg text-gray-600 mb-2">No description for this character right now.</p>
                            <a href="/contribute" class="ml-4 px-3 md:px-4 py-4 btn btn-tertiary">Contribute a description!</a>
                        </div>
                    @endif
                </div>
                @if($character->description_source)
                    <p class="text-xs md:text-sm text-gray-500 mt-2 text-center md:text-left">Source: <a href="{{ $character->description_source }}" class="text-blue-500 hover:underline">{{ $character->description_source }}</a></p>
                @endif                    
            </div>
        </div>

        <div class="w-full flex justify-center mt-8">
            <a href="{{ route('characters.list') }}" class="px-3 md:px-4 py-4 btn btn-primary">
                Back to characters list
            </a>

            <a href="{{ url('/characters') . '?franchise=' . $franchise->slug_name }}" class="ml-4 px-3 md:px-4 py-4 btn btn-tertiary">
                Back to {{ $franchise->franchise_name }} franchise
            </a>
        </div>

        <div class="w-full max-w-6xl mt-12">
            <h3 class="text-2xl font-bold mb-4 text-tertiary text-center">
                Fumos de {{ explode(' ', trim($character->character_name))[0] }}
            </h3>
            <div class="flex flex-wrap justify-center gap-6">
                <div class="relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500 flex flex-col items-center w-64 group">
                    <div class="aspect-square p-2 w-full flex items-center justify-center">
                        <img src="/img/helpers/default.png" alt="Default" class="w-full h-full object-cover rounded-xl pointer-events-none" />
                    </div>
                    <div class="relative -mt-2 mx-2 mb-4 w-full">
                        <div class="bg-black text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                            <span class="relative z-10">Lorem Ipsum</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-black opacity-80"></div>
                        </div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </div>
            </div>
        </div>
    </div>
@endsection