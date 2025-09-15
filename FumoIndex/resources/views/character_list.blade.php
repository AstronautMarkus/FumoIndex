@extends('layouts.app')

@section('title', 'Character List')

@section('content')
    <div class="flex flex-col items-center justify-center">

        <div>
            @foreach($franchises as $franchise)
                <div class="flex items-center mt-6 mb-6 justify-center">
                    <img src="{{ asset('assets/franchises/' . $franchise->franchise_image) }}" alt="{{ $franchise->franchise_name }}" class="w-90 object-cover mr-2 pointer-events-none" />
                    <span class="ml-2">({{ $franchise->franchise_name }})</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-4 w-full max-w-5xl justify-center">
                    @foreach($characters->where('franchise_id', $franchise->id) as $character)
                        <a href="{{ url('characters/' . $character->slug_name) }}">
                            <div class="flex flex-col items-center">
                                <div class="w-32 h-32 rounded-full border-2 border-gray-300 mb-2 flex items-center justify-center overflow-hidden transition-transform transition-colors duration-300 ease-in-out hover:scale-110 hover:border-primary">
                                    <img src="{{ asset('assets/characters/' . $character->character_image) }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover pointer-events-none" />
                                </div>
                                <span>{{ $character->character_name }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>

    </div>
@endsection
