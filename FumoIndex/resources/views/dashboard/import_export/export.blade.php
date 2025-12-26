@extends('layouts.admin_app')

@section('title', 'Export Data')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <div class="max-w-4xl mx-auto px-4 w-full">
            <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
                <h2 class="text-3xl font-bold mb-6 text-center text-primary">Export Data</h2>
                <h3 class="text-xl font-semibold mb-8 text-center text-tertiary">@if ($type === 'characters') Export Characters List as JSON @elseif ($type === 'franchises') Export Franchises List as JSON @else Export Data @endif</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex flex-col items-center">
                        <label class="block text-lg font-semibold text-primary mb-4">
                            Export Options
                        </label>
                        @if ($type === 'characters' || $type === 'franchises')
                            <a href="{{ route('dashboard.import_export.export_data', ['type' => $type]) }}"
                               class="mt-4 px-6 py-2 btn btn-primary">
                                Download @if ($type === 'characters') Characters JSON @elseif ($type === 'franchises') Franchises JSON @else JSON @endif
                            </a>
                        @endif
                    </div>
                    <div class="flex flex-col items-center">
                        <label class="block text-lg font-semibold text-primary mb-4">
                            Instructions
                        </label>
                        <p class="text-md text-tertiary text-center">
                            To export your @if ($type === 'characters') characters @elseif ($type === 'franchises') franchises @else data @endif, click the button above. A JSON file containing your @if ($type === 'characters') characters @elseif ($type === 'franchises') franchises @else data @endif will be generated for download. Make sure to save the file in a secure location.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection