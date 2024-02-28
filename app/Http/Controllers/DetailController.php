<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\LikeFoto;
use App\Models\Komentar;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function detailFotoView(Request $req, $id){
        $foto = Foto::with(['komentars', 'like_fotos'])->firstWhere('id', $id);
        $ceklike = false;
         foreach($foto->like_fotos as $like){
             if($req->session()->get('uid') == $like->userId){
                $ceklike = true;
            }
             elseif($req->session()->get('uid') == $like->userId){
                $ceklike = false;
             }
         }
        return view('detailFoto', [
            'foto' => $foto,
            'ceklike' => $ceklike
        ]);
    }
    public function addLike(Request $req, $id){
        $isChecked = $req->input('is_checked') == "true" ? true : false;
        if($isChecked == true){
            LikeFoto::create([
                'fotoId' => $id,
                'userId' => $req->session()->get('uid'),
                'likeType' => "App\Models\Foto"
            ]);
            return response()->json(['message' => "success di like, like nya $isChecked"], 200);
        } 
    }
    public function unlike(Request $req, $id){
        LikeFoto::where('userId', '=', $req->session()->get('uid'))->where('fotoId', '=', $id)->delete();
        return response()->json(['message' => "sukses dihapus"], 200);
    }
    public function addKomentar(Request $req, $id){
            Komentar::create([
                'fotoId' => $id,
                'userId' => $req->session()->get('uid'),
                'komentarType' => "App\Models\Foto",
                'komentar' => $req->komentar
            ]);
            return response()->json([
                'message' => "sukses"
            ], 200);
    }
}
