<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowProductos extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $producto, $prdImagen, $identificador;
    public $search = '';
    public $open_edit = false;
    public $sort = 'idProducto';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $queryString = 
        [
            'cant' => ['except' => '10'],
            'sort' => ['except' => 'idProducto'],
            'direction' => ['except' => 'desc'], 
            'search' => ['except' => '']
        ];

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


    public function render()
    {
        if ($this->readyToLoad) {
            $productos = Producto::where('prdNombre', 'like', '%' . $this->search .'%')
            ->join('marcas', 'productos.idMarca', '=', 'marcas.idMarca')
            ->join('categorias', 'productos.idCategoria', '=', 'categorias.idCategoria')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        }
        else {
            $productos = [];
        }
        return view('livewire.show-productos', compact('productos'));
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
        # resetea el input file por medio de su id
        $this->identificador = rand();

        # emitTo limita el componente que escucha el evento render
        $this->emitTo('show-productos','render');
        
        $this->emit('alert', 'El producto se creo satisfactoriamente');
    }

    public function mount()
    {
        $this->identificador = rand();
        $this->producto = new Producto();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadProductos(){
        $this->readyToLoad = true;
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
