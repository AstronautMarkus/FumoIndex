@extends('layouts.admin_app')

@section('title', $fumoType->fumo_type)

@section('content')
<div class="flex flex-col items-center justify-center mt-8 mb-6">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 w-full max-w-5xl flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start relative">
        <a href="{{ route('dashboard.fumo_types.edit', $fumoType->id) }}"
           class="absolute top-4 right-4 px-3 md:px-4 py-2 btn btn-tertiary z-10 hidden md:inline-block">
            Edit Fumo Type
        </a>
        <a href="{{ route('dashboard.fumo_types.edit', $fumoType->id) }}"
           class="w-full mb-4 px-3 md:px-4 py-2 btn btn-tertiary md:hidden">
            Edit Fumo Type
        </a>
        <div class="flex-shrink-0 w-full md:w-1/3 flex justify-center items-center mb-6 md:mb-0">
            @if($fumoType->fumo_type_image)
                <div class="w-56 h-56 md:w-64 md:h-64 rounded-2xl  flex items-center justify-center overflow-hidden">
                    <img src="{{ $fumoType->fumo_type_image }}" alt="{{ $fumoType->fumo_type }}" class="w-full h-full object-cover pointer-events-none" />
                </div>
            @endif
        </div>
        <div class="flex flex-col flex-1 w-full md:w-2/3 items-center md:items-start px-0 md:px-8">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 text-center md:text-left text-primary">{{ $fumoType->fumo_type }}</h1>
            <div class="w-full mb-8">
                <ul class="list-none text-base md:text-lg text-gray-800 space-y-2">
                    <li>
                        <i class="fa-solid fa-align-left text-secondary mr-2"></i>
                        <strong>Description:</strong>
                        <span class="text-gray-700">{{ $fumoType->type_description }}</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-star text-secondary mr-2"></i>
                        <strong>Is Primary category:</strong> {{ $fumoType->is_primary ? 'Yes' : 'No' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-ruler-horizontal text-secondary mr-2"></i>
                        <strong>Width:</strong> {{ $fumoType->width !== null ? $fumoType->width . ' cm' : '?' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-ruler-vertical text-secondary mr-2"></i>
                        <strong>Height:</strong> {{ $fumoType->height !== null ? $fumoType->height . ' cm' : '?' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-calendar-plus text-secondary mr-2"></i>
                        <strong>Created at:</strong> {{ $fumoType->created_at ? $fumoType->created_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                    <li>
                        <i class="fa-solid fa-calendar-check text-secondary mr-2"></i>
                        <strong>Updated at:</strong> {{ $fumoType->updated_at ? $fumoType->updated_at->format('Y-m-d H:i') : 'N/A' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center mt-8">
        <a href="{{ route('dashboard.fumo_types.index') }}" class="px-3 md:px-4 py-4 btn btn-primary">
            Back to Fumo Types Management
        </a>
    </div>
</div>
@endsection
