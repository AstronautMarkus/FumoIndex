<?php

namespace App\Http\Controllers\Fumo;

use App\Http\Controllers\Controller;
use App\Models\Fumo;
use Illuminate\Http\Request;

class GetFumosController extends Controller
{
    public function GetFumos(){
        $fumo = Fumo::all();
        return response()->json($fumo);
    }
}
