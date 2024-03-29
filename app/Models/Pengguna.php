<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at'
    ];
    public function fotos(){
        return $this->hasMany(Foto::class, 'userId', 'id');
    }
    public function komentars(){
        return $this->hasMany(Komentar::class, 'userId', 'id');
    }
    public function albums(){
        return $this->hasMany(Album::class, 'userid', 'id');
    }
    public function follows(){
        return $this->hasMany(Follow::class, 'targetId', 'id');
    }
}
