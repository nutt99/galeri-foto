<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at'
    ];
    public function komentarable(){
        return $this->morphTo();
    }
    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'userId');
    }
}
