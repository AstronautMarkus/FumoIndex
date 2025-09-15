@extends('layouts.app')

@section('title', 'Character List')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <div class="max-w-6xl mx-auto px-4 w-full">
            @foreach($franchises as $franchise)
                <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 relative mt-10 mb-10">
                    
                    <div class="absolute -top-3 -left-3 w-6 h-6 bg-tertiary rounded-full border-2 border-white shadow-lg"></div>
                    <div class="absolute -top-3 -right-3 w-6 h-6 bg-tertiary rounded-full border-2 border-white shadow-lg"></div>
                    <div class="absolute -bottom-3 -left-3 w-6 h-6 bg-tertiary rounded-full border-2 border-white shadow-lg"></div>
                    <div class="absolute -bottom-3 -right-3 w-6 h-6 bg-tertiary rounded-full border-2 border-white shadow-lg"></div>

                    <div class="flex items-center mb-8 justify-center">
                        <img src="{{ asset('assets/franchises/' . $franchise->franchise_image) }}" alt="{{ $franchise->franchise_name }}" class="w-64 object-cover mr-2 pointer-events-none" />
                        <span class="ml-2 text-xl font-bold text-orange-900">({{ $franchise->franchise_name }})</span>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                        @foreach($characters->where('franchise_id', $franchise->id) as $character)
                            <a href="{{ url('characters/' . $character->slug_name) }}" class="group cursor-pointer">
                                <div class="relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500 flex flex-col items-center">
                                    <div class="aspect-square p-2 w-full flex items-center justify-center">
                                        <img src="{{ asset('assets/characters/' . $character->character_image) }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover rounded-xl pointer-events-none" />
                                    </div>
                                    <div class="relative -mt-2 mx-2 mb-2 w-full">
                                        <div class="bg-black text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                                            <span class="relative z-10">{{ $character->character_name }}</span>
                                            <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-black opacity-80"></div>
                                            <div class="absolute -top-1 -left-1 w-2 h-2 text-orange-400">
                                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                </svg>
                                            </div>
                                            <div class="absolute -top-1 -right-1 w-2 h-2 text-orange-400">
                                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-8 flex justify-center">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-tertiary rounded-full"></div>
                            <div class="w-24 h-0.5 bg-tertiary"></div>
                            <div class="w-4 h-4 rounded-full bg-tertiary"></div>
                            <div class="w-24 h-0.5 bg-tertiary"></div>
                            <div class="w-3 h-3 bg-tertiary rounded-full"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
