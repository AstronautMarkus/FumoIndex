@extends('layouts.admin_app')

@section('title', 'Fumo Type Details')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">Fumo Type Details</h2>
        <div class="mb-6 flex flex-col items-center">
            @if($fumoType->fumo_type_image)
                <img src="{{ $fumoType->fumo_type_image }}" alt="{{ $fumoType->fumo_type }}" class="h-48 object-cover border-2 border-secondary mb-4 pointer-events-none">
            @endif
            <div class="text-xl font-semibold text-primary mb-2">{{ $fumoType->fumo_type }}</div>
            <div class="text-tertiary mb-2">{{ $fumoType->type_description }}</div>
            <div class="mb-2"><span class="font-semibold">Is Primary category:</span> {{ $fumoType->is_primary ? 'Yes' : 'No' }}</div>
            <div class="mb-2">
                <span class="font-semibold">Width:</span>
                {{ $fumoType->width !== null ? $fumoType->width . ' cm' : '?' }}
            </div>
            <div class="mb-2">
                <span class="font-semibold">Height:</span>
                {{ $fumoType->height !== null ? $fumoType->height . ' cm' : '?' }}
            </div>
        </div>
        <div class="mt-6 flex justify-end gap-4">
            <a href="{{ route('dashboard.fumo_types.edit', $fumoType->id) }}" class="btn btn-primary px-6 py-2">Edit</a>
            <a href="{{ route('dashboard.fumo_types.index') }}" class="btn btn-outline px-6 py-2">Back</a>
        </div>
    </div>
</div>
@endsection
