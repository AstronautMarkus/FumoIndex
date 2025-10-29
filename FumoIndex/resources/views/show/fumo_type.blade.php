@extends('layouts.app')

@section('title', $fumoType->fumo_type . ' - Fumo Type Detail')

@section('content')
<div class="flex flex-col items-center justify-center mt-8 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-6xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start">
        <div class="w-72 h-72 md:w-96 md:h-96 rounded-full border-4 border-secondary flex items-center justify-center overflow-hidden mr-0 md:mr-12 mb-4 md:mb-0 bg-gradient-to-b from-gray-100 to-gray-300">
            <img src="{{ asset('img/fumo_types/' . $fumoType->type_image) }}" alt="{{ $fumoType->fumo_type }}" class="w-full h-full object-cover pointer-events-none" />
        </div>
        <div class="flex flex-col flex-1 items-center md:items-start w-full">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">
                {{ $fumoType->fumo_type }}
                <i class="fa-solid fa-tag"></i>
            </h1>
            <div class="w-full text-center md:text-left mb-4">
                <span class="inline-block px-4 py-2 rounded-full font-semibold
                    {{ $fumoType->is_primary ? 'bg-blue-500 text-white' : 'bg-purple-500 text-white' }}">
                    {{ $fumoType->is_primary ? 'Primary Type' : 'Secondary Type' }}
                </span>
            </div>
            <div class="border-2 border-gray-300 rounded p-4 md:p-6 mb-4 w-full max-w-xl bg-white">
                <span class="text-xl md:text-2xl font-semibold mb-2 block text-tertiary">Description:</span>
                @if($fumoType->type_description)
                    <p class="text-base md:text-lg text-gray-800">{{ $fumoType->type_description }}</p>
                @else
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-base md:text-lg text-gray-600 mb-2">No description for this type right now.</p>
                        <a href="/contribute" class="ml-4 px-3 md:px-4 py-4 btn btn-tertiary">Contribute a description!</a>
                    </div>
                @endif
            </div>
            <div class="w-full flex justify-center gap-6 mb-4">
                <div class="text-sm text-gray-600">
                    <strong>Width:</strong> {{ $fumoType->width ?? 'N/A' }}
                </div>
                <div class="text-sm text-gray-600">
                    <strong>Height:</strong> {{ $fumoType->height ?? 'N/A' }}
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center mt-8">
        <a href="{{ route('home') }}" class="px-3 md:px-4 py-4 btn btn-primary">
            Back Home
        </a>
        <a href="{{ route('fumo_types') }}" class="ml-4 px-3 md:px-4 py-4 btn btn-tertiary">
            Back to types list
        </a>
    </div>
</div>
@endsection