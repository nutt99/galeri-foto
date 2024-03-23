<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
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
        return view('beranda');
    }
    public function berandaJSON(){
        $rawFoto = Foto::with('albums')->whereHas('albums', function($query){
            $query->where('visibilitas', '=', 'publik');
        });
    //    return response()->json($rawFoto->orderBy(DB::raw('RAND()'))->take(20)->get(), 200);
       return response()->json($rawFoto->latest()->paginate(16), 200);
    }
    public function searchJSON(Request $req){
        $search = $req->input('search');
        $output = '';
        if($search != ''){
        $data = Pengguna::where('username', 'LIKE', '%'.$search.'%')->get();

        foreach ($data as $item) {
            $output.='<a class="text-decoration-none text-dark" href="/profil/'.$item['id'].'"><p>'.$item['username'].'</p></a>';
        }

        return response()->json([
            'data' => $output
        ], 200);

        }
        else{
            return response()->json([
                'data' => []
            ], 200);
        }
    }
    public function searchDataJSON(Request $req){
        $title = $req->input('searchTitle');
        $rawFoto = Foto::with('albums')->whereHas('albums', function($query){
            $query->where('visibilitas', '=', 'publik');
        })->where('deskripsi', 'LIKE', '%'.$title.'%');
    //    return response()->json($rawFoto->orderBy(DB::raw('RAND()'))->take(20)->get(), 200);
       if($rawFoto){
        return response()->json($rawFoto->latest()->paginate(16), 200);
       }
       else{
        return response()->json([], 200);
       }
    }
    public function searchView(Request $req){
        $title = $req->search;
        return view('search', [
            'searchTitle' => $title
        ]);
    }
    public function getIp(Request $req){
        return $req->ip();
    }
}
