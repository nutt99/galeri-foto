<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use App\Http\Controllers\FunctionListt;
use App\Models\Foto;


class HomeController extends Controller
{
    public function homeView(Request $req){
        $fl = new FunctionListt;
        if($fl->sessionCheck($req) == false){
            return redirect()->intended('/login');
        }
        else{   
            $album = Album::get()->where('userid', $req->session()->get('uid'));
            return view('home', [
                'albumm' => $album,
            ]);
        }   
    }
    public function berandaView(){
        $rawFoto = Foto::with('albums')->whereHas('albums', function($query){
            $query->where('visibilitas', '=', 'publik');
        });
        return view('beranda', [
            'foto' => $rawFoto->orderBy(DB::raw('RAND()'))->take(10)->get()
        ]);
    }
    public function berandaJSON(){
        $rawFoto = Foto::with('albums')->whereHas('albums', function($query){
            $query->where('visibilitas', '=', 'publik');
        });
    //    return response()->json($rawFoto->orderBy(DB::raw('RAND()'))->take(20)->get(), 200);
       return response()->json($rawFoto->latest()->paginate(16), 200);
    }
    public function getIp(Request $req){
        return $req->ip();
    }
}
