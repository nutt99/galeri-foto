<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    private $ekstensi = ['jpg', 'jpeg', 'png'];
    public function detailView(Request $req, $id_album){
        $detailFoto = Foto::get()->where('albumId', $id_album);
        $album = Album::firstWhere('id', $id_album);
        $namaAlbum = explode("@", $album['nama_album'])[0];
        return view('detailFotoView', [
            'namaAlbum' => $namaAlbum,
            'albumId' => $id_album,
            'visible' => $album->visibilitas,
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
    public function upFotoDetail(Request $req){
        if($this->cekEkstensi($req) == true){
            try{
                $file = $req->file("foto");
                $file->move("album_user/".$req->albumName."@".$req->session()->get('username'), $file->getClientOriginalName());
                Foto::create([
                    'judul_foto' => $req->file("foto")->getClientOriginalName(),
                    'lokasi_file' => "album_user/".$req->albumName."@".$req->session()->get('username')."/".$req->file("foto")->getClientOriginalName(),
                    'albumId' => $req->albumId,
                    'userId' => $req->session()->get('uid')
                ]);
                return back()->with([
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

    public function getAlbumInfo(Request $req){
        $id = $req->input('idAlbum');
        $album = Album::firstWhere('id', $id);
        return response()->json([
            'data' => $album
        ], 200);
    }
    public function editAlbum(Request $req){
        $id = $req->idAlbumm;
        $albumName = $req->namaAlbum;
        $deskripsi = $req->deskripsi ?? "";
        $visible = $req->visibilitas;
        $album = Album::firstWhere('id', $id);

        // rename("album_user/".$album->nama_album, "album_user/".$albumName."@".$req->session()->get('username'));

        // $album->nama_album = $albumName."@".$req->session()->get('username');
        $album->deskripsi = $deskripsi;
        $album->visibilitas = $visible;
        $album->save();

        return back();
    }
    public function deleteAlbum(Request $req){
        $id = $req->idAlbum;
        $album = Album::firstWhere('id', $id);
        $pathAlbum = system('cd')."\\album_user\\".$album->nama_album;
        File::cleanDirectory($pathAlbum);
        rmdir($pathAlbum);
        $foto = Foto::where('albumId', $id)->get();

        if($foto->count() >= 1){
            foreach($foto as $a){
                Foto::firstWhere('id', $a['id'])->delete();
            }
        }

        $album->delete();
        return back();
    }
    public function deleteFoto(Request $req, $id_album){
        $arrFoto = $req->input("arrFoto");

        foreach($arrFoto as $a){
           $foto =  Foto::firstWhere('id', $a);
            unlink($foto->lokasi_file);
            $foto->delete();
        }
        return response()->json([
            'message' => "success",
            'code' => 200
        ], 200);
    }
}
