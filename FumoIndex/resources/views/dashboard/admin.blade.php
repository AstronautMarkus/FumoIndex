@extends('layouts.admin_app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-6xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <h2 class="text-3xl font-bold mb-2 text-center text-primary">Admin Dashboard</h2>
            <h3 class="text-xl font-semibold mb-6 text-center text-tertiary">Overview of The Fumo Index Statistics</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">

                <a class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-users text-3xl text-primary"></i>
                    </div>
                    <div class="text-4xl font-bold text-primary mb-2">{{ $users->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Users</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

                <a class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <img src="/img/icons/fumo.png" alt="Fumo" class="h-16 pointer-events-none">
                    </div>
                    <div class="text-4xl font-bold text-primary mb-2">{{ $fumos->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Fumos</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

                <a class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-tags text-3xl text-yellow-500"></i>
                    </div>
                    <div class="text-4xl font-bold text-primary mb-2">{{ $fumo_types->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Fumo Types</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

                <a href="{{ route('dashboard.franchises.index') }}" class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-cubes text-3xl text-blue-500"></i>
                    </div>
                    <div class="text-4xl font-bold text-primary mb-2">{{ $franchises->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Franchises</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

                <a href="{{ route('dashboard.characters.index') }}" class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 mb-4 border-2 border-gray-300">
                        @if ($random_character)
                            <img src="{{ asset('assets/characters/' . $random_character->character_image) }}" alt="{{ $random_character->character_name }}" class="w-full h-full object-cover pointer-events-none" />
                        @else
                            <i class="fa-solid fa-user-astronaut text-3xl text-green-700"></i>
                        @endif
                    </div>
                    <div class="text-4xl font-bold text-primary mb-2">{{ $characters->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Characters</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col items-center justify-center">
    <div class="max-w-6xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="bg-white rounded-2xl shadow-lg border-4 border-gray-300 p-6 flex flex-col items-start">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-gray-100 rounded-full mr-3">
                            <i class="fa-solid fa-user text-2xl text-primary"></i>
                        </div>
                        <div>
                            <div class="font-bold text-lg text-primary">{{ Auth::user()->username ?? Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>
                            <div class="text-sm text-tertiary">{{ Auth::user()->email ?? '' }}</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-500 mb-2">User Type: <span class="font-semibold text-black">@if(Auth::user()->is_admin) Admin @else User @endif</span></div>

                    <a href="" class="mt-auto inline-block btn btn-primary text-white px-4 py-2 shadow">
                        Update Info
                    </a>

                </a>
                </div>

                <div class="bg-white rounded-2xl shadow-lg border-4 border-gray-300 p-6 flex flex-col">
                    <div class="font-bold text-lg text-primary mb-3">Fast Actions</div>
                    <ul class="space-y-2">
                        <li>
                            <span class="flex items-center text-tertiary cursor-not-allowed">
                                <i class="fa-solid fa-plus mr-2"></i> Add Fumo
                            </span>
                        </li>
                        <li>
                            <span class="flex items-center text-tertiary cursor-not-allowed">
                                <i class="fa-solid fa-users mr-2"></i> View Users
                            </span>
                        </li>
                        <li>
                            <span class="flex items-center text-tertiary cursor-not-allowed">
                                <i class="fa-solid fa-chart-line mr-2"></i> Page Analytics
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl shadow-lg border-4 border-gray-300 p-6 flex flex-col">
                    <div class="font-bold text-lg text-primary mb-3">Recent News</div>
                    <ul class="space-y-2">
                        <li class="text-tertiary text-sm">No recent news.</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
