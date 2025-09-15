@extends('layouts.app')

@section('title', 'Character List')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <div class="max-w-6xl mx-auto px-4 w-full">

            @if(!$selectedFranchise)
                <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
                    <h2 class="text-2xl font-bold mb-2 text-center text-primary">Select a Character Franchise</h2>
                    <p class="text-center text-tertiary mb-4">
                        <button id="whyFranchisesBtn" class="underline text-tertiary hover:text-tertiary-light focus:outline-none cursor-pointer">
                            Why Franchises? Aren't Fumos originally from the Touhou Project?
                        </button>
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($franchises as $franchise)
                            <a href="{{ route('characters.list', ['franchise' => $franchise->slug_name]) }}" class="group cursor-pointer">
                                <div class="relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500 flex flex-col items-center">
                                    <div class="w-full flex items-center justify-center p-2 bg-gray-100" style="aspect-ratio: 3/1;">
                                        <img src="{{ asset('assets/franchises/' . $franchise->franchise_image) }}" alt="{{ $franchise->franchise_name }}" class="max-h-full max-w-full object-contain rounded-xl pointer-events-none" />
                                    </div>
                                    <div class="relative -mt-2 mx-2 mb-2 w-full">
                                        <div class="bg-black text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                                            <span class="relative z-10">{{ $franchise->franchise_name }} ({{ $franchise->characters_count }})</span>
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
                </div>
            @else
                <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 relative mt-10 mb-10">
                    <div class="flex items-center mb-8 justify-center">
                        <img src="{{ asset('assets/franchises/' . $selectedFranchise->franchise_image) }}" alt="{{ $selectedFranchise->franchise_name }}" class="w-64 object-cover mr-2 pointer-events-none" />
                        <span class="ml-2 text-xl font-bold text-tertiary">({{ $selectedFranchise->franchise_name }})</span>
                    </div>
                    <div class="mb-6 text-center">
                        <h3 class="text-lg font-semibold text-primary">
                            Select a Character from {{ $selectedFranchise->franchise_name }}
                        </h3>
                    </div>
                    <div class="flex flex-wrap justify-center gap-6">
                            @foreach($characters as $character)
                                <a href="{{ url('characters/' . $character->slug_name) }}" class="group cursor-pointer">
                                    <div class="relative bg-white rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500 flex flex-col items-center">
                                        <div class="aspect-square p-2 w-40 flex items-center justify-center"> 
                                            <img src="{{ asset('assets/characters/' . $character->character_image) }}" alt="{{ $character->character_name }}" class="w-full h-full object-cover {{ $loop->first ? 'rounded-xl' : '' }} pointer-events-none" />
                                        </div>
                                        <div class="relative -mt-2 mx-2 mb-2 w-full">
                                            <div class="bg-black text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                                                <span class="relative z-10">{{ $character->character_name }}</span>
                                                <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-black opacity-80"></div>
                                            </div>
                                        </div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                                    </div>
                                </a>
                            @endforeach
                    </div>

                    <div class="mt-8 flex justify-center">
                        @if($selectedFranchise)
                            {{ $characters->appends(['franchise' => $selectedFranchise->slug_name])->links('vendor.pagination.custom') }}
                        @else
                            {{ $characters->links('vendor.pagination.custom') }}
                        @endif
                    </div>
                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('characters.list') }}" class="btn flex items-center justify-center text-nowrap btn-tertiary text-2xl gap-2 p-3">Change Franchise</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div id="whyFranchisesModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 max-w-2xl w-full">
            <h3 class="text-2xl font-bold mb-6 text-primary text-center">Why Franchises?</h3>
            
            <p class="text-gray-700 mb-4 text-base leading-relaxed">
                Yes, Fumos were originally born from the <span class="font-semibold">Touhou Project</span>. 
                (For more details, see the <span class="italic"><a href="#" class="text-primary hover:underline">Fumo Origins</a></span> section.)
                The first designs were created by <span class="font-semibold">AngelType</span>, and later official production was taken over by <span class="font-semibold">Gift</span>.
            </p>
            
            <p class="text-gray-700 mb-4 text-base leading-relaxed">
                Over time, Gift expanded the <strong>ふもふも (fumofumo)</strong> plush line beyond Touhou, 
                producing Fumo plushies of characters from <span class="font-semibold">other franchises</span> as well. 
                This means there are now official Fumos from Touhou and from completely different series.
            </p>
            
            <p class="text-gray-700 mb-4 text-base leading-relaxed">
                To keep things clear and make searching easier, <span class="font-semibold">The Fumo Index</span> 
                organizes Fumos by franchise. 
                This makes it simple to explore, compare, and see which characters have an official Fumo, 
                no matter which universe they come from.
            </p>
            
            <div class="mt-6 space-y-2">
                <p class="text-gray-600 text-sm text-center">Example: a Fumo (left) of <a href="/characters/rumia" class="text-primary hover:underline" target="_blank">Rumia</a> vs. a Gift plush that is not a Fumo (right).</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="relative overflow-hidden rounded-xl shadow w-full h-40 bg-tertiary flex items-center justify-center">
                        <img src="/img/helpers/real_fumo.png" alt="Rumia Fumo Example" class="object-contain pointer-events-none w-full h-full scale-110" />
                    </div>
                    <div class="relative overflow-hidden rounded-xl shadow w-full h-40 bg-tertiary flex items-center justify-center">
                        <img src="/img/helpers/non_fumo_example.png" alt="Rumia Non-Fumo Example" class="object-contain pointer-events-none w-full h-full scale-110" />
                    </div>
                </div>
                <p class="text-gray-600 text-sm text-center">Both plushies are related by being from Touhou Project and of the same character, but the right photo does not show the <strong>ふもふも (fumofumo)</strong> style, meaning it is not considered a Fumo.</p>
            </div>
            <p class="text-gray-500 text-xs mt-6 text-center">
                For more details about what defines an authentic Fumo, check the <span class="italic"><a href="#" class="text-primary hover:underline">What is a Fumo?</a></span> section.
            </p>
            <button id="closeWhyFranchisesModal" class="mt-6 btn btn-primary w-full p-3 text-lg">
                Got it!
            </button>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    document.getElementById('whyFranchisesBtn').onclick = function() {
        document.getElementById('whyFranchisesModal').classList.remove('hidden');
    };
    document.getElementById('closeWhyFranchisesModal').onclick = function() {
        document.getElementById('whyFranchisesModal').classList.add('hidden');
    };
    document.getElementById('whyFranchisesModal').onclick = function(e) {
        if (e.target === this) this.classList.add('hidden');
    };
</script>
@endpush
