<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Http\Controllers\FunctionListt;
use App\Models\Follow;


class ProfilController extends Controller
{
    private function setChecker(Request $req){
        $fl = new FunctionListt;
        return $fl->sessionCheck($req);
    }
    
    public function profileView(Request $req, $id){
        if($this->setChecker($req) == true){
            $user = Pengguna::with(['albums', 'follows'])->firstWhere('id', $id);
            return view('profile', [
                'user' => $user
            ]);
        }
        else{
            return redirect()->intended('/login');
        }
    }
    
    public function addFollow(Request $req){
        $target = $req->input('targetId');
        Follow::create([
            'clientId' => $req->session()->get('uid'),
            'targetId' => $target
        ]);
        return response()->json([
            'data' => "sukses"
        ], 200);
    }

    public function removeFollow(Request $req){
        $target = $req->input('targetId');
        Follow::where('clientId', '=', $req->session()->get('uid'))->where('targetId', '=', $target)->delete();
        return response()->json([
            'data' => "sukses"
        ], 200);
    }

    public function editUser(Request $req){
        $name = $req->input('displayName');
        $user = Pengguna::firstWhere('id', $req->session()->get('uid'));
        $user->nama_lengkap = $name;
        $user->save();
        return response()->json([
            'data' => "sukses"
        ], 200);
    }

    public function getDataFollower(Request $req){
        $target = $req->input('targetId');
        $follower = Follow::whereHas('pengguna', function($query){
            $query->get();
        });
        return response()->json([
            'data' => $follower
        ], 200);
    }
}
