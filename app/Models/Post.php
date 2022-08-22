<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//incluye softdeletes
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
    'title',
    'img'
    ];

    //funcion para obtener la imagen de la publicacion
    public function getImageAttribute()
    {
        return Storage::url($this->attributes['img']);
    }
}
