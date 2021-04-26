<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProducto extends Component
{
    use WithFileUploads;

    public $open = false;
    public $producto, $prdNombre, $prdPrecio, $prdStock, $idMarca, $idCategoria, $prdPresentacion, $prdImagen, $identificador;

    protected $rules = [
            'producto.prdNombre' =>'required|min:2|max:30',
            'producto.prdPrecio' =>'required',
            'producto.idMarca' =>'required|numeric',
            'producto.idCategoria' =>'required|numeric',
            'producto.prdPresentacion' =>'required',
            'producto.prdStock' =>'required',
        ];

    public function mount(Producto $producto)
    {
        $this->producto = $producto;

        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();
        $this->producto->save();

        $this->reset();

        $this->emitTo('show-productos','render');
        $this->emit('alert', 'El producto se actualizo satisfactoriamente');
    }
    public function render()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('livewire.edit-producto', compact('marcas','categorias'));
    }
}
