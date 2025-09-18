@extends('layouts.app')

@section('title', 'Fumo Types')

@section('content')
<div class="flex flex-col items-center justify-center py-8">
    <div class="bg-container border-4 border-secondary rounded-3xl shadow-md w-[95%] max-w-7xl mx-auto px-6 py-8 flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-8 text-center text-primary">Fumo Types <i class="fa-solid fa-tags"></i></h1>

        <div class="w-full">
            <h2 class="text-2xl font-bold mb-4 text-primary text-center">Primary Fumo Types</h2>
            <div class="flex flex-wrap justify-center gap-6 mb-10">
                @forelse($primaryFumoTypes as $type)
                    <div class="relative bg-gradient-to-b from-gray-100 to-gray-300 rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-blue-500 flex flex-col items-center w-64">
                        <div class="aspect-square p-2 w-full flex items-center justify-center">
                            <img src="{{ asset('img/fumo_types/' . $type->type_image) }}" alt="{{ $type->fumo_type }}" class="w-full h-full object-cover rounded-t-xl pointer-events-none" />
                        </div>
                        <div class="relative -mt-2 mx-2 mb-2 w-full">
                            <div class="bg-black text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                                <span class="relative z-10">{{ $type->fumo_type }}</span>
                                <div class="absolute inset-0 bg-black opacity-80"></div>
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-500/30 to-blue-400/20 opacity-0 hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                    </div>
                @empty
                    <p class="text-center text-tertiary">No primary Fumo Types found.</p>
                @endforelse
            </div>

            <h2 class="text-2xl font-bold mb-4 text-primary text-center">Secondary Fumo Types</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @forelse($secondaryFumoTypes as $type)
                    <div class="relative bg-gradient-to-b from-gray-100 to-gray-300 rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-purple-500 flex flex-col items-center w-64">
                        <div class="aspect-square p-2 w-full flex items-center justify-center">
                            <img src="{{ asset('img/fumo_types/' . $type->type_image) }}" alt="{{ $type->fumo_type }}" class="w-full h-full object-cover rounded-t-xl pointer-events-none" />
                        </div>
                        <div class="relative -mt-2 mx-2 mb-2 w-full">
                            <div class="bg-black text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                                <span class="relative z-10 font-bold">{{ $type->fumo_type }}</span>
                                <div class="absolute inset-0 bg-black opacity-80"></div>
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-500/30 to-purple-400/20 opacity-0 hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                    </div>
                @empty
                    <p class="text-center text-tertiary">No secondary Fumo Types found.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center mb-8 px-4 md:px-0 w-[95%]">
    <a href="{{ route('home') }}" class="btn flex items-center justify-center text-nowrap btn-tertiary text-2xl gap-2 p-3">Back Home <i class="fa-solid fa-home"></i></a>
</div>

@endsection