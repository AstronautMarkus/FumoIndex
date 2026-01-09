@extends('layouts.app')

@section('title', $character->character_name)

@section('content')
    <div class="flex flex-col items-center justify-center mt-8 mb-6">

        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-6xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start">

            <div class="flex-shrink-0 w-full md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
                <div class="w-[32rem] h-[32rem] rounded-2xl flex items-center justify-center overflow-hidden bg-gradient-to-b from-gray-100 to-gray-300">
                    <img src="{{ $character->character_image }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover pointer-events-none" />
                </div>
            </div>

            <div class="flex flex-col flex-1 w-full md:w-1/2 items-center md:items-start px-0 md:px-8">
                <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $character->character_name }}</h1>

                <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">
                    {{ $franchise->franchise_name }}
                </h2>

                @if($character->character_description)
                    <p class="text-base md:text-lg mb-6 text-center md:text-left text-gray-800">
                        {{ $character->character_description }}
                    </p>
                @else
                    <p class="text-base md:text-lg mb-6 text-center md:text-left text-gray-800">
                        No description for this character right now. Please consider contributing one!
                    </p>
                @endif

                @if($character->description_source)
                    <p class="text-xs md:text-sm text-gray-500 mt-2 text-center md:text-left">
                        Source: <a href="{{ $character->description_source }}" class="text-blue-500 hover:underline">{{ $character->description_source }}</a>
                    </p>
                @endif

                <h2 class="text-2xl font-semibold mb-4 text-center md:text-left text-tertiary mt-6">Franchise</h2>
                <div class="w-full mb-8">
                    <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                        <li class="flex items-center space-x-3">
                            @if ($franchise->franchise_image)
                                <img src="{{ $franchise->franchise_image }}" alt="{{ $franchise->franchise_name }}" class="h-10 object-cover pointer-events-none" />
                            @endif
                            <div>
                                <span class="font-semibold text-primary">{{ $franchise->franchise_name }}</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        @if($character->fumos && $character->fumos->count() > 0)
            <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-6xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start mt-4">
                <div class="w-full">
                    <h2 class="text-2xl font-semibold mb-6 text-center md:text-left text-tertiary">{{ $character->character_name }} Fumo list</h2>
                    <div class="flex flex-wrap justify-center gap-6">
                        @foreach($character->fumos->take(5) as $fumo)
                            <a href="{{ route('fumos.show', ['gift_code' => $fumo->gift_code]) }}" class="group cursor-pointer">
                                <div class="relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500 flex flex-col items-center">
                                    <div class="aspect-square p-2 w-40 flex items-center justify-center relative"> 
                                        <img src="{{ $fumo->fumo_image }}" alt="{{ $fumo->fumo_name }}" class="max-w-full max-h-full object-contain pointer-events-none rounded" />
                                        <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>

                                        <div class="absolute bottom-0 left-0 w-full px-2 pb-2">
                                            <div class="bg-black/80 text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                                                <span class="relative z-10">{{ $fumo->fumo_name }}</span>
                                                <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-black opacity-80"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>     
            </div>
        @endif

        <div class="flex justify-center mb-8 px-4 md:px-0 w-[95%] mt-6">
            <a href="{{ route('characters.list') }}" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">
                Back to characters list <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a href="{{ route('characters.list') . '?franchise=' . $franchise->slug_name }}" class="ml-4 btn flex items-center justify-center text-nowrap btn-tertiary text-2xl gap-2 p-3">
                Back to {{ $franchise->franchise_name }} franchise
            </a>
        </div>
    </div>
@endsection