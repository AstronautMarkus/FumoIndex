<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fumo;
use App\Models\FumoType;
use App\Models\Character;

class FumosController extends Controller
{
    public function index()
    {
        $fumoList = Fumo::with(['character', 'fumoType', 'releases'])->paginate(10);
        return view('fumos', compact('fumoList'));
    }
}
