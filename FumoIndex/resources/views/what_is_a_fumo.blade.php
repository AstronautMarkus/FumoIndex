@extends('layouts.app')

@section('title', 'What is a Fumo? The Fumo Index')

@section('content')
<div class="flex flex-col items-center justify-center py-8">
    <div class="bg-container border-4 border-secondary rounded-3xl shadow-md w-[95%] max-w-5xl mx-auto px-6 py-8 flex flex-col items-center">

        <h1 class="text-4xl font-bold mb-8 text-center text-tertiary">What is a Fumo?</h1>
        <div class="flex flex-col md:flex-row items-start gap-8 w-[95%] max-w-3xl mb-6 px-4 md:px-0">
            <div class="flex-1">
                <p class="text-lg mb-2">
                    A FumoFumo, also known as "Fumos," is a line of collectible plush toys manufactured and sold by the Japanese company Gift. These plush toys are based on ANGELTYPE designs. Originally, there were only two, Marisa and Reimu, designed and released by ANGELTYPE in 2008.
                </p>
            </div>
            <div class="flex flex-col items-center w-full md:w-auto">
                <div class="w-full md:w-50 h-48 md:h-50 bg-gray-200 flex items-center justify-center rounded shadow overflow-hidden">
                <img src="{{ asset('img/pages/what_is_a_fumo/marisa-2008.webp') }}" alt="Marisa Fumo" class="object-cover w-full h-full pointer-events-none" />
                </div>
                <span class="text-sm italic mt-2">- Marisa Kirisame Fumo (2008)</span>
            </div>
        </div>
        <h2 class="text-2xl md:text-3xl font-semibold mb-2 text-center text-tertiary">These plushies have the following qualities:</h2>
        <ul class="list-disc pl-6 text-lg mb-6 text-left max-w-2xl px-4 md:px-0 w-[95%]">
            <li>Soft, high-quality fabric.</li>
            <li>Chibi proportions.</li>
            <li>Highly collectible, with limited releases.</li>
            <li>Originally based on Touhou Project characters.</li>
            <li>Facial expressions (happy, serious, angry, etc.)</li>
        </ul>
        <div class="max-w-3xl mb-6 px-4 md:px-0 w-[95%]">
            <p class="text-lg mb-2">
                The name "FumoFumo" refers to something fluffy or soft. These plushies have a distinctive design compared to other anime or video game merchandise, which is why they began to stand out, although of course, this only began in late 2018, when they became known to the rest of the world.
            </p>
        </div>
        <div class="flex flex-col items-center mb-6 px-4 md:px-0 w-[95%]">
            <div class="w-full md:w-[540px] h-48 md:h-[400px] bg-gray-200 flex items-center justify-center rounded shadow mb-2 overflow-hidden">
                <img src="{{ asset('img/pages/what_is_a_fumo/marisa_reimu_deka.jpg') }}" alt="Marisa & Reimu Deka Fumo" class="object-cover w-full h-full pointer-events-none" />
            </div>
            <span class="text-sm italic">- Marisa & Reimu, Deka version</span>
        </div>
        <div class="max-w-3xl mb-6 px-4 md:px-0 w-[95%]">
            <p class="text-lg">
                Fumos started out as a simple video game plush, but now they're a household name on the internet. However, if you're interested in learning more, you can check out the following articles:
            </p>
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 mb-8 w-[95%] px-4 md:px-0">
            <a href="#" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">The Fumo Origins</a>
            <a href="#" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">How to get Fumos</a>
        </div>
    </div>
</div>

<div class="flex justify-center mb-8 px-4 md:px-0 w-[95%]">
    <a href="{{ route('home') }}" class="btn flex items-center justify-center text-nowrap btn-tertiary text-2xl gap-2 p-3">Back Home</a>
</div>

@endsection
