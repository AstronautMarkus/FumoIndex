@extends('layouts.admin_app')

@section('title', 'Export Data')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <div class="max-w-4xl mx-auto px-4 w-full">
            <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
                <h2 class="text-3xl font-bold mb-6 text-center text-primary">Export Data</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex flex-col items-center">
                        <label class="block text-lg font-semibold text-primary mb-4">
                            Export Options
                        </label>
                        @if ($type === 'characters')
                            <a href="{{ route('dashboard.import_export.export_data', ['type' => 'characters']) }}"
                               class="mt-4 px-6 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary-dark transition">
                                Descargar JSON de Characters
                            </a>
                        @endif
                    </div>
                    <div>
                        <label class="block text-lg font-semibold text-primary mb-4">
                            Export Preview
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection