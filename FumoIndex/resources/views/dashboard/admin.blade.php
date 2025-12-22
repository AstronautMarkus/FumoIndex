@extends('layouts.admin_app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-6xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <h2 class="text-3xl font-bold mb-2 text-center text-primary">Admin Dashboard</h2>
            <h3 class="text-xl font-semibold mb-6 text-center text-tertiary">Overview of site statistics</h3>
            
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
                    <div class="text-4xl font-bold text-red-500 mb-2">{{ $fumos->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Fumos</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

                <a class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-tags text-3xl text-yellow-500"></i>
                    </div>
                    <div class="text-4xl font-bold text-yellow-500 mb-2">{{ $fumo_types->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Fumo Types</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

                <a class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-cubes text-3xl text-blue-500"></i>
                    </div>
                    <div class="text-4xl font-bold text-blue-500 mb-2">{{ $franchises->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Franchises</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

                <a class="group cursor-pointer relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden flex flex-col items-center p-6 transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-user-astronaut text-3xl text-green-500"></i>
                    </div>
                    <div class="text-4xl font-bold text-green-500 mb-2">{{ $characters->count() }}</div>
                    <div class="text-lg font-semibold text-tertiary">Characters</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
