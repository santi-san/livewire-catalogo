<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProducto extends Component
{
    use WithFileUploads;

    public $open = false;
    public $producto, $prdImagen, $identificador;

    protected $rules = [
            'producto.prdNombre' =>'required|min:2|max:30',
            'producto.prdPrecio' =>'required',
            'producto.idMarca' =>'required',
            'producto.idCategoria' =>'required',
            'producto.prdPresentacion' =>'required',
            'producto.prdStock' =>'required',
            'producto.prdImagen' => 'required|image|max:2048',
        ];

    public function mount(Producto $producto)
    {
        $this->producto = $producto;

        $this->identificador = rand();
    }

    public function save() {
        $this->validate();
        
        
        if ($this->prdImagen) {
            Storage::delete([$this->producto->prdImagen]);

            $this->producto->prdImagen = $this->prdImagen->store('productos', 'public');
        }
        
        $this->producto->save();

        $this->reset();

        $this->identificador = rand();

        $this->emitTo('show-productos','render');
        $this->emit('alert', 'El producto se actualizo satisfactoriamente');
    }
    public function render()
    {
        return view('livewire.edit-producto');
    }
}
