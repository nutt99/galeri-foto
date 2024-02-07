<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;

class AlbumController extends Controller
{
    private $ekstensi = ['jpg', 'jpeg', 'png'];
    public function detailView(Request $req, $id_album){
        $detailFoto = Foto::get()->where('albumId', $id_album);
        $album = Album::firstWhere('id', $id_album);
        $namaAlbum = explode("@", $album['nama_album'])[0];
        return view('detailFotoView', [
            'namaAlbum' => $namaAlbum,
            'detailFoto' => $detailFoto
        ]);
    }

    public function mkDirrr(Request $req){
        // system('mkdir tesss');
        try{
            mkdir("album_user/".$req->album_name."@".$req->session()->get('username'));
            Album::create([
                'nama_album' => $req->album_name."@".$req->session()->get('username'),
                'userid' => $req->session()->get('uid'),
                'visibilitas' => $req->visible,
            ]);
            return redirect()->intended("/dashboard");
        } catch(Exception $e) {
              return redirect()->intended('/dashboard')->with([
                  'status_code' => 401,
                  'message' => 'album sudah ada'
              ]);
        }
    }
    private function cekEkstensi(Request $req){
        $res=false;
        for($a = 0; $a < count($this->ekstensi); $a++){
            if($this->ekstensi[$a] == $req->file("foto")->getClientOriginalExtension()){
                $res = true;
                return $res;
            }
        }
        return $res;
    }
    public function upFoto(Request $req){
        if($this->cekEkstensi($req) == true){
            try{
                $file = $req->file("foto");
                $file->move("album_user/".explode("!!!",$req->albumName)[0], $file->getClientOriginalName());
                Foto::create([
                    'judul_foto' => $req->file("foto")->getClientOriginalName(),
                    'lokasi_file' => "album_user/".explode("!!!", $req->albumName)[0]."/".$req->file("foto")->getClientOriginalName(),
                    'albumId' => explode("!!!", $req->albumName)[1],
                    'userId' => $req->session()->get('uid')
                ]);
                return redirect()->intended('/dashboard')->with([
                    'status' => 200
                ]);
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        else {
            return redirect()->intended('/dashboard')->with([
                'status' => 403
            ]);
        }
    }
}
