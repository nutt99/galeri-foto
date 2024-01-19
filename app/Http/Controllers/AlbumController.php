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

    public function mkDirrr(Request $req){
        // system('mkdir tesss');
        try{
            mkdir('album_user/'.$req->album_name);
            Album::create([
                'nama_album' => $req->album_name,
                'userid' => $req->session()->get('uid'),
                'visibilitas' => $req->visible,
            ]);
            return redirect()->intended("/home");
        } catch(Exception $e) {
            return redirect()->intended('/home')->with([
                'status_code' => 403,
                'message' => 'album sudah ada'
            ]);
        }
    }
}
