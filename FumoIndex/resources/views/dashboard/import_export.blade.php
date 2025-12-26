@extends('layouts.admin_app')

@section('title', 'Import/Export Data')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh]">
    <div class="max-w-4xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <h2 class="text-3xl font-bold mb-2 text-center text-primary">Import / Export Data</h2>
            <h3 class="text-xl font-semibold mb-8 text-center text-tertiary">Manage your Fumo Index data easily</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="group bg-white rounded-2xl shadow-lg border-4 border-gray-300 flex flex-col items-center p-8 transition-all duration-300 hover:shadow-xl hover:border-green-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-file-import text-3xl text-green-600"></i>
                    </div>
                    <div class="text-2xl font-bold text-primary mb-2">Import Data</div>
                    <div class="text-md text-tertiary text-center mb-4">
                        You can import your Fumo Index data in bulk using a <strong>JSON</strong> file. Make sure the file is properly formatted to avoid errors during the import process.

                    </div>
                    <ul class="text-sm text-gray-600 mb-4 list-disc list-inside text-left w-full">
                        <span class="font-semibold text-primary">Import Type List:</span>
                        <li>Characters</li>
                        <li>Franchises</li>
                    </ul>
                    <div class="relative w-full mt-auto flex flex-col items-center">
                        <button type="button" class="btn btn-primary text-white px-4 py-2 shadow dropdown-toggle-import w-full flex justify-center items-center">
                            Import Data
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z"/></svg>
                        </button>
                        <ul class="dropdown-menu-import absolute left-0 mt-2 w-48 bg-white shadow-lg hidden z-50 text-gray-900 border border-gray-200">
                            <li>
                                <a href="{{ route('dashboard.import_export.import_view', ['type' => 'characters']) }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Import Characters</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.import_export.import_view', ['type' => 'franchises']) }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Import Franchises</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="group bg-white rounded-2xl shadow-lg border-4 border-gray-300 flex flex-col items-center p-8 transition-all duration-300 hover:shadow-xl hover:border-blue-500">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-full mb-4">
                        <i class="fa-solid fa-file-export text-3xl text-blue-600"></i>
                    </div>
                    <div class="text-2xl font-bold text-primary mb-2">Export Data</div>
                    <div class="text-md text-tertiary text-center mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, urna eu tincidunt consectetur, nisi nisl aliquam nunc, eget aliquam massa.
                    </div>
                    <div class="relative w-full mt-auto flex flex-col items-center">
                        <button type="button" class="btn btn-primary text-white px-4 py-2 shadow dropdown-toggle-export w-full flex justify-center items-center">
                            Export Data
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z"/></svg>
                        </button>
                        <ul class="dropdown-menu-export absolute left-0 mt-2 w-48 bg-white shadow-lg hidden z-50 text-gray-900 border border-gray-200">
                            <li>
                                <a href="{{ route('dashboard.import_export.export_view', ['type' => 'characters']) }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Export Characters</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.import_export.export_view', ['type' => 'franchises']) }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Export Franchises</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    // Dropdown logic for import
    document.querySelectorAll('.dropdown-toggle-import').forEach((toggle) => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.dropdown-menu-import').forEach(menu => {
                if (menu !== this.parentElement.querySelector('.dropdown-menu-import')) {
                    menu.classList.add('hidden');
                }
            });
            const dropdown = this.parentElement.querySelector('.dropdown-menu-import');
            dropdown.classList.toggle('hidden');
        });
    });
    // Dropdown logic for export
    document.querySelectorAll('.dropdown-toggle-export').forEach((toggle) => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.dropdown-menu-export').forEach(menu => {
                if (menu !== this.parentElement.querySelector('.dropdown-menu-export')) {
                    menu.classList.add('hidden');
                }
            });
            const dropdown = this.parentElement.querySelector('.dropdown-menu-export');
            dropdown.classList.toggle('hidden');
        });
    });
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        document.querySelectorAll('.dropdown-menu-import').forEach(menu => {
            if (!menu.parentElement.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
        document.querySelectorAll('.dropdown-menu-export').forEach(menu => {
            if (!menu.parentElement.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });
    // Prevent closing when clicking inside dropdown
    document.querySelectorAll('.dropdown-menu-import').forEach(menu => {
        menu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
    document.querySelectorAll('.dropdown-menu-export').forEach(menu => {
        menu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>
@endsection