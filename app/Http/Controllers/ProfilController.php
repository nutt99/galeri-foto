<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Http\Controllers\FunctionListt;


class ProfilController extends Controller
{
    private function setChecker(Request $req){
        $fl = new FunctionListt;
        return $fl->sessionCheck($req);
    }
    
    public function profileView(Request $req){
        if($this->setChecker($req) == true){
            return "ini page profile";
        }
        else{
            return redirect()->intended('/login');
        }
    }
}
