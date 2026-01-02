@extends('layouts.app')

@section('title', $fumoType->fumo_type . ' - Fumo Type Detail')

@section('content')
    <div class="flex flex-col items-center justify-center mt-8 mb-6">

        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-6xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start">

            <div class="flex-shrink-0 w-full md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
                <div class="w-[32rem] h-[32rem] rounded-2xl flex items-center justify-center overflow-hidden bg-gradient-to-b from-gray-100 to-gray-300">
                    <img src="{{ $fumoType->fumo_type_image }}" alt="{{ $fumoType->fumo_type }}" class="w-full h-full object-cover pointer-events-none" />
                </div>
            </div>

            <div class="flex flex-col flex-1 w-full md:w-1/2 items-center md:items-start px-0 md:px-8">
                <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">
                    {{ $fumoType->fumo_type }}
                </h1>

                <div class="w-full text-center md:text-left mb-4">
                    <span class="inline-block px-4 py-2 rounded-full font-semibold
                        {{ $fumoType->is_primary ? 'bg-blue-500 text-white' : 'bg-purple-500 text-white' }}">
                        {{ $fumoType->is_primary ? 'Primary Type' : 'Secondary Type' }}
                    </span>
                </div>

                @if($fumoType->type_description)
                    <p class="text-base md:text-lg mb-6 text-center md:text-left text-gray-800">
                        {{ $fumoType->type_description }}
                    </p>
                @else
                    <p class="text-base md:text-lg mb-6 text-center md:text-left text-gray-800">
                        No description for this type right now. Please consider contributing one!
                    </p>
                @endif

                <h2 class="text-2xl font-semibold mb-4 text-center md:text-left text-tertiary">Fumo Type Details</h2>
                <div class="w-full mb-8">
                    <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                        <li>
                            <i class="fa-solid fa-ruler-vertical text-secondary mr-2"></i>
                            <strong>Width:</strong>
                            {{ $fumoType->width ? $fumoType->width . 'cm' : 'N/A' }}
                        </li>
                        <li>
                            <i class="fa-solid fa-ruler-vertical text-secondary mr-2"></i>
                            <strong>Height:</strong>
                            {{ $fumoType->height ? $fumoType->height . 'cm' : 'N/A' }}
                        </li>
                        <li>
                            <i class="fa-solid fa-tag text-secondary mr-2"></i>
                            <strong>Type:</strong>
                            {{ $fumoType->is_primary ? 'Primary' : 'Secondary' }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex justify-center mb-8 px-4 md:px-0 w-[95%] mt-6">
            <a href="{{ route('home') }}" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">
                Back Home <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a href="{{ route('fumo_types') }}" class="ml-4 btn flex items-center justify-center text-nowrap btn-tertiary text-2xl gap-2 p-3">
                Back to types list
            </a>
        </div>
    </div>
@endsection