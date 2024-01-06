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
        if($row == 0){
            exit;
        }
        else{
            if($req['password'] == $row['password']){
                return view('home');
            }
            else{
                exit;
            }
        }
    }
}
