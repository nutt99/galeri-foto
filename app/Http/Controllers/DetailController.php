<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function detailFotoView($id){
        $foto = Foto::firstWhere('id', $id);
        return view('detailFoto', [
            'foto' => $foto
        ]);
    }
}
