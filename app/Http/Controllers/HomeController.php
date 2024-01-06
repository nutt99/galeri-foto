<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeView(Request $req){
        if($req->session()->get('username') == null && $req->session()->get('uid') == null){
            return redirect()->intended('/');
        }
        else{
            return view('home');
        }
    }
}
