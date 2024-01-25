<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Http\Controllers\FunctionListt;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->intended('/');
    }
    private function setChecker(Request $req){
        $fl = new FunctionListt;
        return $fl->sessionCheck($req);
    }

    public function loginView(Request $request){
        if($this->setChecker($request) == true){
            return redirect()->intended('/home');
        }
        else{
            return view('login');
        }
    }
    public function registerView(Request $req){
        if($this->setChecker($req) == false){
            return view('register');
        }
        return redirect()->intended('/home');
    }
    public function loginAction(Request $req){
        $row = Pengguna::firstWhere('username', '=',$req['username']) ?? [];
        $type = gettype($row);
        if($type != "object" ){
            if(count($row) == 0){
                return view('login', ['status' => 404]);
            }
        }
        // else{
        //     if($req['password'] == $row['password']){
        //         $req->session()->put('username', $row->username);
        //         $req->session()->put('uid', $row->id);
        //         return redirect()->intended('/home');
        //     }
        //     else{
        //         return view('login', ['status' => 403]);
        //     }
        // }
        else{
            if(Hash::check($req->password, $row->password)){
                $req->session()->put('username', $row->username);
                $req->session()->put('uid', $row->id);
                return redirect()->intended('/home');
            }
            else{
                return view('login', ['status' => 403]);
            }
        }
    }
    public function registerPengguna(Request $req){
        $fullname = explode("@", $req->email);
        try {
            Pengguna::create([
                'username' => $req->username,
                'password' => Hash::make($req->password),
                'email' => $req->email,
                'nama_lengkap' => $fullname[0]
            ]);
            return redirect()->intended('/')->with([
                'status' => 400,
                'message' => "Akun berhasil dibuat"
            ]);
        } catch (\Exception $e){
            return view('register', [
                'status' => 401,
                'message' => "Username sudah digunakan"
            ]);
        }
    }
}
