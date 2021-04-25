<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProducto extends Component
{

    use WithFileUploads;

    public $prdNombre;
    public $prdPrecio;
    public $idMarca;
    public $idCategoria;
    public $prdPresentacion;
    public $prdStock;
    public $prdImagen;
    public $identificador;

    public $open = false;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'prdNombre' => 'required|min:2|max:30',
        'prdPrecio' => 'required',
        'idMarca' => 'required',
        'idCategoria' => 'required',
        'prdPresentacion' => 'required',
        'prdStock' => 'required',
        'prdImagen' => 'required|image|max:2048',
    ];

    protected $messages = [
        'prdNombre.required' => 'El producto no puede estar vacia.',
        'prdNombre.min' => 'El producto debe tener al menos 2 caracteres.',
        'prdNombre.max' => 'El producto no debe tener mas de 30 caracteres.',
        'prdPrecio' => 'el precio',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();
        $img = $this->prdImagen->store('productos');

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
        # resetea el input file por medio de su id
        $this->identificador = rand();

        # emitTo limita el componente que escucha el evento render
        $this->emitTo('show-productos','render');
        
        $this->emit('alert', 'El producto se creo satisfactoriamente');
    }

    public function render()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('livewire.create-producto', compact('marcas','categorias'));
    }
}
