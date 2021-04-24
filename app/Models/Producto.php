<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "productos";
    protected $primarykey = 'idProducto';
    public $timestamps = false;


    protected $fillable = 
        [
            'prdNombre',
            'prdPrecio',
            'idMarca',
            'idCategoria',
            'prdPresentacion ',
            'prdStock',
            'prdImagen',
        ];
}
