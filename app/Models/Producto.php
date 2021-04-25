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


        # If your parent model does not use id as its primary key, or you wish to find the associated model using a different column, 
        # you may pass a third argument to the belongsTo method specifying your parent table's custom key:
        # return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        public function relMarca() 
        {
            return $this->belongsTo( Marca::class, 'idMarca','idMarca' );
        }
        public function relCategoria() 
        {
            return $this->belongsTo( Categoria::class, 'idCategoria', 'idCategoria' );
        }
}
