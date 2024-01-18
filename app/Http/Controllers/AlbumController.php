<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function detailView(Request $req, $id_album){
        return "Halo kamu sedang di album $id_album";
    }

    public function mkdir(Request $req){
        // system('mkdir tesss');
        try{
            system('mkdir lol');
            Album::create([
                'nama_album' => "lolaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                'deskripsi' => "tes upload album",
                'userid' => $req->session()->get('uid'),
                'visibilitas' => 'publik',
            ]);
        } catch(Exception $e) {
            return redirect()->intended('/home')->with([
                'status_code' => 403,
                'message' => 'album sudah ada'
            ]);
        }
    }
}
