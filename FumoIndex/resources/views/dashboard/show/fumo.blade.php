@extends('layouts.admin_app')

@section('title', $fumo->fumo_name)

@section('content')
<div class="flex flex-col items-center justify-center mt-8 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-7xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start relative">
        <a href="{{ route('dashboard.fumos.edit', $fumo->id) }}"
           class="absolute top-4 right-4 px-3 md:px-4 py-2 btn btn-tertiary z-10 hidden md:inline-block">
            Edit Fumo
        </a>
        <a href="{{ route('dashboard.fumos.edit', $fumo->id) }}"
           class="w-full mb-4 px-3 md:px-4 py-2 btn btn-tertiary md:hidden">
            Edit Fumo
        </a>
        <div class="flex flex-col flex-1 items-center md:items-start w-full">
            @if($fumo->fumo_image)
                <div class="w-56 md:w-64 flex items-center justify-center overflow-hidden mr-0 md:mr-12 mb-4 md:mb-0">
                    <img src="{{ $fumo->fumo_image }}" alt="{{ $fumo->fumo_name }}" class="w-full h-full object-cover pointer-events-none" />
                </div>
            @endif
            <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $fumo->fumo_name }}</h1>
            <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">Gift Code: {{ $fumo->gift_code }}</h2>
            <div class="border-2 border-gray-300 rounded p-4 md:p-6 mb-4 w-full max-w-xl bg-white">
                <span class="text-xl md:text-2xl font-semibold mb-2 block text-tertiary">Version:</span>
                <p class="text-base md:text-lg text-gray-800">{{ $fumo->version }}</p>
                <span class="text-xl md:text-2xl font-semibold mb-2 block text-tertiary mt-4">Type:</span>
                <p class="text-base md:text-lg text-gray-800">{{ $fumo->type->fumo_type ?? 'N/A' }}</p>
                <span class="text-xl md:text-2xl font-semibold mb-2 block text-tertiary mt-4">Characters:</span>
                @if($fumo->character->count())
                    <ul class="list-disc ml-6">
                        @foreach($fumo->character as $character)
                            <li>
                                <a href="{{ route('dashboard.characters.show', $character->id) }}" class="text-blue-500 hover:underline">{{ $character->character_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-base md:text-lg text-gray-600 mb-2">No characters for this fumo.</p>
                @endif
                @if($fumo->official_url)
                    <div class="mt-4">
                        <span class="font-semibold text-tertiary">Official URL:</span>
                        <a href="{{ $fumo->official_url }}" class="text-blue-500 hover:underline" target="_blank">{{ $fumo->official_url }}</a>
                    </div>
                @endif
                @if($fumo->notes)
                    <div class="mt-4">
                        <span class="font-semibold text-tertiary">Notes:</span>
                        <p class="text-gray-700">{{ $fumo->notes }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center mt-8">
        <a href="{{ route('dashboard.fumos.index') }}" class="px-3 md:px-4 py-4 btn btn-primary">
            Back to Fumos Management
        </a>
    </div>
</div>
@endsection
