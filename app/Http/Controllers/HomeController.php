<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Controllers\FunctionListt;

class HomeController extends Controller
{
    public function homeView(Request $req){
        $fl = new FunctionListt;
        if($fl->sessionCheck($req) == false){
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
