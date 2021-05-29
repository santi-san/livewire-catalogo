<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Products extends Component
{
    public $prdNombre, $prdPrecio, $idMarca, $idCategoria, $prdPresentacion, $prdStock, $prdImagen;
    public $modalFormVisible = false;
    
    protected $rules = [
        'prdNombre' => 'required|min:2|max:30',
        'prdPrecio' => 'required|min:0',
        'idMarca' => 'required',
        'idCategoria' => 'required',
        'prdPresentacion' => 'required',
        'prdStock' => 'required',
        'prdImagen' => 'required|image|max:2048',
    ];
    protected $messages = [
        'prdNombre.required' => 'El producto no puede estar vacio.',
        'prdNombre.min' => 'El producto debe tener al menos 2 caracteres.',
        'prdNombre.max' => 'El producto no debe tener mas de 30 caracteres.',
        'prdPrecio.required' => 'El precio no puede estar vacio.',
        'prdPrecio.min' => 'el precio.',
        'idMarca.required' => 'La marca no puede estar vacia.',
        'idCategoria.required' => 'La categoria no puede estar vacia.',
        'prdPresentacion.required' => 'La presentacion no puede estar vacia.',
        'prdStock.required' => 'El stock no puede estar vacio.',
        'prdImagen.required' => 'El producto necesita una imagen.',
        
    ];

    public function createShowModal() {
        $this->modalFormVisible = true;
    }

    public function store()
    {
        $this->validate();
        $img = $this->prdImagen->store('productos', 'public');

        Producto::create([
            'prdNombre' => $this->prdNombre,
            'prdPrecio' => $this->prdPrecio,
            'idMarca' => $this->idMarca,
            'idCategoria' => $this->idCategoria,
            'prdPresentacion' => $this->prdPresentacion,
            'prdStock' => $this->prdStock,
            'prdImagen' => $img,
        ]);
        $this->reset();
        
        $this->modalFormVisible = false;
    }


    public function render()
    {
        $products = Producto::join('marcas', 'productos.idMarca', '=', 'marcas.idMarca')
            ->join('categorias', 'productos.idCategoria', '=', 'categorias.idCategoria')
            ->get();
        return view('livewire.products', compact('products'));
    }


    
}
