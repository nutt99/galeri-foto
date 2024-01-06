<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
class LoginController extends Controller
{
    public function loginView(){
        return view('login');
    }
    public function loginAction(Request $req){
        $row = Pengguna::firstWhere('username', '=',$req['username']) ?? [];
        $type = gettype($row);
        if($type != "object" ){
            if(count($row) == 0){
                return view('login', ['status' => 404]);
            }
        }
        else{
            if($req['password'] == $row['password']){
                return redirect()->intended('/home');
            }
            else{
                return view('login', ['status' => 403]);
            }
        }
    }
}
