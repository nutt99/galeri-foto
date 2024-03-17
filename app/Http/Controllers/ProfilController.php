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
    
    public function profileView(Request $req, $id){
        if($this->setChecker($req) == true){
            $user = Pengguna::with('albums')->firstWhere('id', $id);
            return view('profile', [
                'user' => $user
            ]);
        }
        else{
            return redirect()->intended('/login');
        }
    }
}
