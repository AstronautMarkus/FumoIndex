@extends('layouts.admin_app')

@section('title', 'Import Data')

@section('content')

@if (session('alert_modal'))
<div id="skippedModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 opacity-100 transition-opacity duration-300" style="pointer-events: auto;">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 max-w-2xl w-full relative flex flex-col">
        <button id="closeSkippedModal" class="absolute top-4 right-4 text-primary hover:text-primary-light text-2xl focus:outline-none cursor-pointer" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
        <h3 class="text-2xl font-bold mb-4 text-primary text-center">Import Skipped Items</h3>
        <p class="text-gray-700 mb-4 text-base leading-relaxed text-center">
            Some items were <span class="font-semibold text-red-500">skipped</span> during import.<br>
            Please review the details below to fix any issues and try again.
        </p>
        <div class="overflow-y-auto max-h-64 border border-gray-200 rounded-lg bg-gray-50 p-3 mb-2">
            <pre class="whitespace-pre-wrap text-xs text-gray-800">{{ session('alert_modal') }}</pre>
        </div>
        <p class="text-gray-800 text-xs mt-2 text-center font-medium">
            If you're importing characters, first check if the <a href="{{ route('dashboard.franchises.index') }}" class="text-blue-500 hover:underline">referenced franchises</a> exist in the database, the slug in the JSON must match exactly as the franchise, for example: <strong>Touhou Project</strong> = <code class="bg-gray-200 px-1 rounded">touhou_project</code>.
        </p>
        <button id="closeSkippedModalBtn" class="mt-6 btn btn-primary w-full p-3 text-lg">
            Got it!
        </button>
    </div>
</div>
<script>
let skippedModal = document.getElementById('skippedModal');
let isSkippedModalAnimating = false;

function showSkippedModal() {
    if (isSkippedModalAnimating) return;
    isSkippedModalAnimating = true;
    skippedModal.classList.remove('hidden');
    setTimeout(() => {
        skippedModal.classList.add('opacity-100');
        skippedModal.classList.remove('opacity-0');
        skippedModal.style.pointerEvents = 'auto';
    }, 10);
    setTimeout(() => {
        isSkippedModalAnimating = false;
    }, 300);
}

function hideSkippedModal() {
    if (isSkippedModalAnimating) return;
    isSkippedModalAnimating = true;
    skippedModal.classList.remove('opacity-100');
    skippedModal.classList.add('opacity-0');
    skippedModal.style.pointerEvents = 'none';
    setTimeout(() => {
        skippedModal.classList.add('hidden');
        isSkippedModalAnimating = false;
    }, 300);
}

document.addEventListener('DOMContentLoaded', function() {
    // Start with modal visible (opacity-100), but allow closing
    document.getElementById('closeSkippedModal').onclick = hideSkippedModal;
    document.getElementById('closeSkippedModalBtn').onclick = hideSkippedModal;
    skippedModal.onclick = function(e) {
        if (e.target === this) hideSkippedModal();
    };
});
</script>
@endif

<div class="flex flex-col items-center justify-center min-h-[60vh]">
    <div class="max-w-4xl mx-auto px-4 w-full">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10">
            <h2 class="text-3xl font-bold mb-6 text-center text-primary">Import Data</h2>
            <h3 class="text-xl font-semibold mb-8 text-center text-tertiary">@if ($type === 'characters') Import Characters List to Database @elseif ($type === 'franchises') Import Franchises List to Database @else Import Data @endif</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="flex flex-col items-center">
                    <label class="block text-lg font-semibold text-primary mb-4" for="jsonFile">
                        Insert your JSON file
                    </label>
                    <input type="file" id="jsonFile" accept=".json" class="mb-4 block btn btn-primary px-2 py-4" />
                    <p class="text-sm text-tertiary text-center">
                        Only properly formatted JSON files are accepted.
                    </p>
                    <form id="importForm" action="{{ route('dashboard.import_export.import_data', ['type' => $type]) }}" method="POST" enctype="multipart/form-data" style="display:none;">
                        @csrf
                        <input type="file" name="import_file" id="hiddenJsonFile" accept=".json" />
                    </form>
                </div>

                <div>
                    <label class="block text-lg font-semibold text-primary mb-4">
                        JSON Preview
                    </label>
                    <pre
    class="bg-gray-900 text-green-400 rounded-xl p-4 overflow-x-auto overflow-y-auto text-sm min-h-[200px] w-full text-left whitespace-pre-wrap"
    id="jsonPreview"
    style="max-height: 350px; max-width: 100%;"
>
Import a JSON file to see its content here...
</pre>
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        <span id="jsonStatusBadge"></span>
                        <span id="jsonStats" class="text-sm text-primary"></span>
                    </div>
                    <div id="jsonProgressBarContainer" class="w-full mt-2">
    <div class="flex w-full h-8 overflow-visible font-sans text-base font-medium rounded-full bg-blue-gray-50" style="min-width: 300px;">
        <div id="jsonProgressBar"
            class="flex items-center justify-center h-full overflow-visible text-white break-all rounded-full transition-all duration-300"
            style="width: 0%; background-color: #64748b; min-width: 180px; white-space: nowrap; font-size: 1.1rem;">
            0%
        </div>
    </div>
</div>
                    <div class="flex flex-row gap-4 mt-2">
                        <div id="jsonErrors" class="flex-1 text-sm text-red-500"></div>
                        <div id="jsonWarnings" class="flex-1 text-sm text-yellow-500"></div>
                    </div>

                    <div class="flex justify-end mt-4">
    <button id="uploadBtn" class="btn btn-success px-6 py-2 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
        Upload
    </button>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/json-formatter-js@2.3.4/dist/json-formatter.min.css">
<script src="https://cdn.jsdelivr.net/npm/json-formatter-js@2.3.4/dist/json-formatter.umd.min.js"></script>
<script>
const importType = @json($type ?? null);

function validateCharactersJson(json) {
    if (!Array.isArray(json)) return { valid: false, errors: ['Root JSON must be an array.'], warnings: [], count: 0, franchises: [], warningsByItem: [] };
    let errors = [];
    let warningsByItem = [];
    let franchises = new Set();
    json.forEach((item, idx) => {
        if (typeof item !== 'object' || Array.isArray(item)) {
            errors.push(`Item #${idx+1} is not an object.`);
            return;
        }
        // Required
        let itemErrors = [];
        if (!item.name || typeof item.name !== 'string') itemErrors.push(`'name' is required`);
        if (!item.franchise_slug || typeof item.franchise_slug !== 'string') itemErrors.push(`'franchise_slug' is required`);
        if (!item.character_image || typeof item.character_image !== 'string') itemErrors.push(`'character_image' is required and must be a string`);
        // If required fields are missing, mark as error
        if (itemErrors.length > 0) {
            errors.push(`Item #${idx+1}${item.name ? ` (${item.name})` : ''}: ${itemErrors.join(', ')}`);
            return;
        }
        // Nullable warnings
        let itemWarnings = [];
        if (!('description' in item) || item.description === null || item.description === '') {
            itemWarnings.push('Missing or empty description');
        }
        if (!('description_source' in item) || item.description_source === null || item.description_source === '') {
            itemWarnings.push('Missing or empty description_source');
        }
        // Extra keys warning
        const allowed = ['name','franchise_slug','character_image','description','description_source','slug_name'];
        Object.keys(item).forEach(key => {
            if (!allowed.includes(key)) {
                itemWarnings.push(`Extra key '${key}'`);
            }
        });
        if (itemWarnings.length > 0) {
            warningsByItem.push({
                idx: idx+1,
                name: item.name || '(no name)',
                warnings: itemWarnings
            });
        }
        if (item.franchise_slug) franchises.add(item.franchise_slug);
    });
    let status = errors.length > 0 ? 'error' : (warningsByItem.length > 0 ? 'warning' : 'success');
    return {
        valid: errors.length === 0,
        errors,
        warningsByItem,
        count: json.length,
        franchises: Array.from(franchises),
        status
    };
}

function validateFranchisesJson(json) {
    if (!Array.isArray(json)) return { valid: false, errors: ['Root JSON must be an array.'], warningsByItem: [], count: 0, status: 'error' };
    let errors = [];
    let warningsByItem = [];
    json.forEach((item, idx) => {
        if (typeof item !== 'object' || Array.isArray(item)) {
            errors.push(`Item #${idx+1} is not an object.`);
            return;
        }
        const keys = Object.keys(item);
        let itemErrors = [];
        if (!('franchise_name' in item) || typeof item.franchise_name !== 'string' || !item.franchise_name) {
            itemErrors.push(`'franchise_name' is required`);
        }
        if (!('franchise_image' in item) || typeof item.franchise_image !== 'string' || !item.franchise_image) {
            itemErrors.push(`'franchise_image' is required and must be a string`);
        }
        if (!('slug_name' in item) || typeof item.slug_name !== 'string' || !item.slug_name) {
            itemErrors.push(`'slug_name' is required and must be a string`);
        }
        if (itemErrors.length > 0) {
            errors.push(`Item #${idx+1}${item.franchise_name ? ` (${item.franchise_name})` : ''}: ${itemErrors.join(', ')}`);
            return;
        }
        if (keys.length !== 3 || !keys.includes('franchise_name') || !keys.includes('franchise_image') || !keys.includes('slug_name')) {
            errors.push(`Item #${idx+1} (${item.franchise_name}): must have only 'franchise_name', 'franchise_image', and 'slug_name' keys`);
        }
    });
    let status = errors.length > 0 ? 'error' : 'success';
    return {
        valid: errors.length === 0,
        errors,
        warningsByItem,
        count: json.length,
        status
    };
}

function renderStatusBadge(status) {
    if (status === 'success') {
        return `<span class="inline-block px-3 py-1 rounded-full bg-green-500 text-white font-semibold text-xs">Success</span>`;
    } else if (status === 'warning') {
        return `<span class="inline-block px-3 py-1 rounded-full bg-yellow-400 text-white font-semibold text-xs">Warning</span>`;
    } else if (status === 'error') {
        return `<span class="inline-block px-3 py-1 rounded-full bg-red-500 text-white font-semibold text-xs">Error</span>`;
    }
    return '';
}

function renderWarningsTable(warningsByItem) {
    if (!warningsByItem || warningsByItem.length === 0) return '';
    let rows = warningsByItem.map(w =>
        `<tr class="border-b border-primary">
            <td class="px-2 py-1 font-semibold text-white">${w.idx}</td>
            <td class="px-2 py-1 text-white">${w.name}</td>
            <td class="px-2 py-1 text-yellow-300">${w.warnings.join('<br>')}</td>
        </tr>`
    ).join('');
    return `
    <div class="overflow-x-auto">
        <table class="min-w-full text-xs border border-primary rounded bg-black">
            <thead>
                <tr>
                    <th class="px-2 py-1 text-left text-white">#</th>
                    <th class="px-2 py-1 text-left text-white">Name</th>
                    <th class="px-2 py-1 text-left text-yellow-300">Warnings</th>
                </tr>
            </thead>
            <tbody>
                ${rows}
            </tbody>
        </table>
    </div>
    `;
}

function updateProgressBar(status) {
    const bar = document.getElementById('jsonProgressBar');
    let percent = 0, color = '#64748b', label = '0%';
    if (status === 'error') {
        percent = 25; color = '#d52a2aff'; label = '25% Unacceptable';
    } else if (status === 'warning') {
        percent = 75; color = '#cd530dff'; label = '75% With Warnings,  Acceptable';
    } else if (status === 'success') {
        percent = 100; color = '#22c55e'; label = '100% Perfect';
    }
    bar.style.width = percent + '%';
    bar.style.backgroundColor = color;
    bar.textContent = label;
    bar.style.minWidth = '180px';
    bar.style.fontSize = '1.1rem';
    bar.style.overflow = 'visible';
    bar.style.whiteSpace = 'nowrap';
    if (percent === 0) {
        bar.textContent = '0%';
    }
    // Enable/disable upload button
    const uploadBtn = document.getElementById('uploadBtn');
    if (uploadBtn) {
        if (status === 'warning' || status === 'success') {
            uploadBtn.disabled = false;
        } else {
            uploadBtn.disabled = true;
        }
    }
}

// Start with empty progress bar
updateProgressBar(null);

document.getElementById('jsonFile').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('jsonPreview');
    const stats = document.getElementById('jsonStats');
    const errorsDiv = document.getElementById('jsonErrors');
    const warningsDiv = document.getElementById('jsonWarnings');
    const badge = document.getElementById('jsonStatusBadge');
    // Clean content
    preview.innerHTML = '';
    stats.textContent = '';
    errorsDiv.innerHTML = '';
    warningsDiv.innerHTML = '';
    badge.innerHTML = '';
    updateProgressBar(null);
    if (!file) {
        preview.textContent = '// The JSON content will appear here...';
        updateProgressBar(null);
        return;
    }
    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            const json = JSON.parse(e.target.result);
            // Use JSONFormatter to display pretty JSON
            const formatter = new JSONFormatter(json, 2, { theme: 'dark' });
            preview.appendChild(formatter.render());

            let result;
            if (importType === 'characters') {
                result = validateCharactersJson(json);
                stats.textContent = `Characters found: ${result.count}` +
                    (result.franchises ? ` | Franchises in characters: ${result.franchises.length}` : '');
            } else if (importType === 'franchises') {
                result = validateFranchisesJson(json);
                stats.textContent = `Franchises found: ${result.count}`;
            } else {
                stats.textContent = '';
            }
            if (result) {
                badge.innerHTML = renderStatusBadge(result.status);
                updateProgressBar(result.status);
                // Show errors
                if (result.errors && result.errors.length > 0) {
                    errorsDiv.innerHTML = result.errors.map(e => `<div>• ${e}</div>`).join('');
                }
                // Show warnings as table
                if (result.warningsByItem && result.warningsByItem.length > 0) {
                    warningsDiv.innerHTML = renderWarningsTable(result.warningsByItem);
                }
            }
        } catch (err) {
            preview.textContent = '// Invalid JSON file.';
            errorsDiv.innerHTML = '';
            warningsDiv.innerHTML = '';
            badge.innerHTML = renderStatusBadge('error');
            stats.textContent = '';
            updateProgressBar('error');
        }
    };
    reader.readAsText(file);
});
const hiddenInput = document.getElementById('hiddenJsonFile');
document.getElementById('jsonFile').addEventListener('change', function(event) {
    if (hiddenInput && event.target.files.length > 0) {
        hiddenInput.files = event.target.files;
    }
});

document.getElementById('uploadBtn').addEventListener('click', function() {
    const form = document.getElementById('importForm');
    if (form) {
        form.submit();
    }
});
</script>
@endpush