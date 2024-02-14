<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at'
    ];
    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'userId');
    }
    public function komentars(){
        return $this->morphMany(Komentar::class, 'komentarable');
    }
    public function likefotos(){
        return $this->morphMany(LikeFoto::class, 'likefotoable');
    }
}
