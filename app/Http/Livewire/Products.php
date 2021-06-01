<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $product;
    public $modelId;

    public $prdNombre, $prdPrecio, $idMarca, $idCategoria, $prdStock;
    public $prdImagen;
    public $prdPresentacion = '';
    public $identificador;
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
        $this->reset(['prdImagen']);
        $this->resetValidation();
        $this->reset();
        
        $this->modalFormVisible = true;
    }


    public function mount()
    {
        $this->product = new Producto();
        $this->identificador = rand();
    }

    public function updateShowModal($id) {
        $this->resetValidation();
        $this->modelId = $id;
        $this->loadModel();
        $this->modalFormVisible = true;

       
    }

    public function loadModel(){

        $data = Producto::find($this->modelId);
        $this->prdNombre = $data->prdNombre;
        $this->prdPrecio = $data->prdPrecio;
        $this->idMarca = $data->idMarca;
        $this->idCategoria = $data->idCategoria;
        $this->prdPresentacion = $data->prdPresentacion;
        $this->prdStock = $data->prdStock;
        $this->prdImagen = $data->prdImagen;
    }

    public function update()
    {
        $this->validate();
        if($this->prdImagen) {
            Storage::delete([$this->product->prdImagen]);

            $this->product->prdImagen = $this->prdImagen->store('productos', 'public');
        }
        $this->updateModel();
        $this->product->save();
        $this->reset();
        $this->identificador = rand();
        $this->reset(['prdImagen']);

    }

    public function updateModel()
    {
        $this->product->prdNombre = $this->prdNombre;
        $this->product->prdPrecio = $this->prdPrecio;
        $this->product->idMarca = $this->idMarca;
        $this->product->idCategoria = $this->idCategoria;
        $this->product->prdPresentacion = $this->prdPresentacion;
        $this->product->prdStock = $this->prdStock;
        $this->product->prdImagen = $this->prdImagen;
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
        $this->identificador = rand();
        $this->modalFormVisible = false;
    }


    public function render()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $products = Producto::with('relMarca', 'relCategoria')
            ->get();
        return view('livewire.products', compact('products','marcas','categorias'));
    }


    
}
