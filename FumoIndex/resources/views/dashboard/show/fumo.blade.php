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

        @if($fumo->fumo_image)
            <div class="flex-shrink-0 w-full md:w-1/2 flex flex-col justify-center items-center mb-6 md:mb-0">
                <div class="w-[32rem] h-[32rem] rounded-2xl flex items-center justify-center overflow-hidden bg-gradient-to-b from-gray-100 to-gray-300">
                    <img src="{{ $fumo->fumo_image }}" alt="{{ $fumo->fumo_name }}" class="w-full h-full object-cover pointer-events-none" />
                </div>
                @if ($fumo->images->count() > 0)
                    <div class="mt-4 flex flex-row flex-wrap justify-center gap-4 w-full">
                        @foreach ($fumo->images as $image)
                            <div class="w-24 h-24 rounded-lg overflow-hidden bg-gray-200">
                                <img src="{{ $image->image_url }}" alt="Additional image for {{ $fumo->fumo_name }}" class="w-full h-full object-cover pointer-events-none" />
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        <div class="flex flex-col flex-1 w-full md:w-2/3 items-center md:items-start px-0 md:px-8">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $fumo->fumo_name }}</h1>
            <h2 class="text-xl md:text-3xl mb-4 text-center md:text-left text-tertiary">
                @foreach ($fumo->character as $character)
                    <a href="{{ route('dashboard.characters.show', $character->id) }}" class="text-blue-500 hover:underline">{{ $character->character_name }}</a>@if (!$loop->last), @endif
                @endforeach
            </h2>
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
                        <i class="fa-solid fa-cube text-secondary mr-2"></i>
                        <strong>Type:</strong>
                        {{ $fumo->type->fumo_type ?? 'N/A' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-layer-group text-secondary mr-2"></i>
                        <strong>Franchise(s):</strong>
                        @if($franchises->count())
                            @foreach ($franchises as $franchise)
                                <span class="text-primary">{{ $franchise->franchise_name }}</span>@if (!$loop->last), @endif
                            @endforeach
                        @else
                            N/A
                        @endif
                    </li>
                    @if($fumo->official_url)
                    <li>
                        <i class="fa-solid fa-link text-secondary mr-2"></i>
                        <strong>Official URL:</strong>
                        <a href="{{ $fumo->official_url }}" class="text-blue-500 hover:underline" target="_blank">{{ $fumo->official_url }}</a>
                    </li>
                    @endif
                    @if($fumo->notes)
                    <li>
                        <i class="fa-solid fa-sticky-note text-secondary mr-2"></i>
                        <strong>Notes:</strong>
                        <span class="text-gray-700">{{ $fumo->notes }}</span>
                    </li>
                    @endif
                    <li>
                        <i class="fa-solid fa-calendar-plus text-secondary mr-2"></i>
                        <strong>Created at:</strong> {{ $fumo->created_at ? $fumo->created_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-calendar-check text-secondary mr-2"></i>
                        <strong>Updated at:</strong> {{ $fumo->updated_at ? $fumo->updated_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                </ul>
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
