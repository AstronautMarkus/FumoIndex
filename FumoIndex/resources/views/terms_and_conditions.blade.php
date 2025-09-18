@extends('layouts.app')

@section('title' , 'Terms and Conditions')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-4xl w-full bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 m-4">
        <h1 class="text-4xl font-bold mb-6 text-center text-primary">Terms and Conditions</h1>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>

        <h2 class="text-2xl font-bold mb-4 text-primary">License to Use Website</h2>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>

        <h2 class="text-2xl font-bold mb-4 text-primary">User Comments</h2>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>

        <h2 class="text-2xl font-bold mb-4 text-primary">Hyperlinking to our Content</h2>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>

        <div class="flex items-center justify-end mt-8">
            <span class="text-2xl font-bold mr-4 text-primary">Thank you for reading!</span>
            <img src="{{ asset('img/FUMO_INDEX_RED.svg') }}" alt="FumoIndex Logo" class="h-10 w-auto pointer-events-none">
        </div>
    </div>
</div>
@endsection