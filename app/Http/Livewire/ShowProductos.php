<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
class ShowProductos extends Component
{
    use WithFileUploads;
    public $search, $producto, $prdImagen, $identificador;
    public $open_edit = false;
    public $sort = 'idProducto';
    public $direction = 'desc';
    protected $rules = [
        'producto.prdNombre' =>'required|min:2|max:30',
        'producto.prdPrecio' =>'required',
        'producto.idMarca' =>'required',
        'producto.idCategoria' =>'required',
        'producto.prdPresentacion' =>'required',
        'producto.prdStock' =>'required',
    ];
    
    # Cuando el escucha y el metodo llevan el mismo nombre se puede acortar. 
    protected $listeners = ['render'];

    public function mount()
    {
        $this->identificador = rand();
        $this->producto = new Producto();
    }

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


    public function edit(Producto $producto)
    {
        $this->producto = $producto;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        if($this->prdImagen) {
            Storage::delete([$this->producto->prdImagen]);

            $this->producto->prdImagen = $this->prdImagen->store('productos', 'public');
        }
        $this->producto->save();

        $this->reset(['open_edit','prdImagen']);

        $this->identificador = rand();

        $this->emit('alert', 'El producto se actualizo satisfactoriamente');
    }
}
