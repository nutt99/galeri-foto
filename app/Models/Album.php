<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at'
    ];
    public function fotos(){
        return $this->morphMany(Foto::class, 'fotoable', 'fotoType', 'albumId');
    }
}
