@extends('layouts.app')

@section('title', $fumo->fumo_name)

@section('content')
    <div class="flex flex-col items-center justify-center mt-8 mb-6">

        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-6xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start">



            <div class="flex-shrink-0 w-full md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
                <div class="w-[32rem] h-[32rem] rounded-2xl flex items-center justify-center overflow-hidden bg-gradient-to-b from-gray-100 to-gray-300">
                    <img src="{{ $fumo->fumo_image }}" alt="{{ $fumo->fumo_name }}" class="w-full h-full object-cover pointer-events-none" />
                </div>
            </div>

            <div class="flex flex-col flex-1 w-full md:w-1/2 items-center md:items-start px-0 md:px-8">
                <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $fumo->fumo_name }}</h1>

                <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">
                    @foreach ($fumo->character as $character)
                        {{ $character->character_name }}@if (!$loop->last), @endif
                    @endforeach
                </h2>
                
                @if ($fumo->description)
                    <p class="text-base md:text-lg mb-6 text-center md:text-left text-gray-800">
                        {{ $fumo->description }}
                    </p>
                @else
                    <p class="text-base md:text-lg mb-6 text-center md:text-left text-gray-800">
                        This fumo does not have a description yet. Please consider contributing one!
                    </p>
                @endif

                <h2 class="text-2xl font-semibold mb-4 text-center md:text-left text-tertiary">Fumo Details</h2>

                <div class="w-full mb-8">
                    <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                        <li>
                            <i class="fa-solid fa-gift text-secondary mr-2"></i>
                            <strong>Gift Code:</strong> <span class="font-mono text-primary">{{ $fumo->gift_code }}</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-code-branch text-secondary mr-2"></i>
                            <strong>Version:</strong> {{ $fumo->version ?? 'Unknown' }}
                        </li>
                        <li>
                            <i class="fa-solid fa-ruler-vertical text-secondary mr-2"></i>
                            <strong>Width:</strong>
                            @if(isset($fumo->type->width) && $fumo->type->width !== null)
                                {{ $fumo->type->width . 'cm' }}
                            @else
                                N/A
                            @endif
                        </li>
                        <li>
                            <i class="fa-solid fa-ruler-vertical text-secondary mr-2"></i>
                            <strong>Height:</strong>
                            @if(isset($fumo->type->height) && $fumo->type->height !== null)
                                {{ $fumo->type->height . 'cm' }}
                            @else
                                N/A
                            @endif
                        </li>
                    </ul>
                </div>

                <h2 class="text-2xl font-semibold mb-4 text-center md:text-left text-tertiary">Fumo Type</h2>

                <div class="w-full mb-8">
                    @if ($fumo->type)
                        <div class="flex items-center space-x-4 mb-4">
                            @if ($fumo->type->fumo_type_image)
                                <img src="{{ $fumo->type->fumo_type_image }}" alt="{{ $fumo->type->fumo_type }}" class="w-16 h-16 rounded-xl object-cover border border-secondary pointer-events-none" />
                            @endif
                            <div>
                                <span class="font-semibold text-primary text-xl">{{ $fumo->type->fumo_type }}</span>
                                @if ($fumo->type->type_description)
                                    <p class="text-base text-gray-700">{{ $fumo->type->type_description }}</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="text-base text-gray-700">Unknown Fumo Type</p>
                    @endif
                </div>


                <h2 class="text-2xl font-semibold mb-4 text-center md:text-left text-tertiary">Character(s)</h2>

                <div class="w-full mb-8">
                    <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                        @foreach ($fumo->character as $character)
                            <li class="flex items-center space-x-3">
                                @if ($character->character_image)
                                    <img src="{{ $character->character_image }}" alt="{{ $character->character_name }}" class="w-10 h-10 rounded-full object-cover border border-secondary pointer-events-none" />
                                @endif
                                <div>
                                    <span class="font-semibold text-primary">{{ $character->character_name }}</span>
                                    @if ($character->character_description)
                                        <p class="text-sm text-gray-600">{{ $character->character_description }}</p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <h2 class="text-2xl font-semibold mb-4 text-center md:text-left text-tertiary">Franchise(s)</h2>
                <div class="w-full mb-8">
                    <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                        @foreach ($fumo->character as $character)
                            @if ($character->franchise)
                                <li class="flex items-center space-x-3">
                                    @if ($character->franchise->franchise_image)
                                        <img src="{{ $character->franchise->franchise_image }}" alt="{{ $character->franchise->franchise_name }}" class="h-10 rounded-full object-cover pointer-events-none" />
                                    @endif
                                    <div>
                                        <span class="font-semibold text-primary">{{ $character->franchise->franchise_name }}</span>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

        <div class="flex justify-center mb-8 px-4 md:px-0 w-[95%] mt-6">
            <a href="{{ route('fumos') }}" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">
                Back to Fumos list <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
@endsection