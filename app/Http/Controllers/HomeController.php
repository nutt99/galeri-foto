<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class HomeController extends Controller
{
    public function homeView(Request $req){
        if($req->session()->get('username') == null && $req->session()->get('uid') == null){
            return redirect()->intended('/');
        }
        else{
            $album = Album::get()->where('userid', $req->session()->get('uid'));
            return view('home', [
                'album' => $album,
            ]);
        }
    }
}
