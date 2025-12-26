<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function importExportView()
    {
        return view('dashboard.import_export');
    }

    public function importView($type)
    {
        return view('dashboard.import_export.import', ['type' => $type]);
    }

    public function exportView($type)
    {
        return view('dashboard.import_export.export', ['type' => $type]);
    }
}
