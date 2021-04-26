<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class ShowProductos extends Component
{

    public $search = '';
    public $sort = 'idProducto';
    public $direction = 'desc';
    # Cuando el escucha y el metodo llevan el mismo nombre se puede acortar. 
    protected $listeners = ['render'];


    public function render()
    {
        $productos = Producto::where('prdNombre', 'like', '%' . $this->search .'%')
                        ->join('marcas', 'productos.idMarca', '=', 'marcas.idMarca')
                        ->join('categorias', 'productos.idCategoria', '=', 'categorias.idCategoria')
                        ->orderBy($this->sort, $this->direction)
                        ->get();
        return view('livewire.show-productos', compact('productos'));
    }

    public function order($sort)
    {
        if ($this->sort = $sort) {

            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }
            else {
                $this->direction = 'desc';
            }

        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
