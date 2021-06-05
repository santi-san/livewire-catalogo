<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowProductos extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $product, $image, $identificador;
    public $search = '';
    public $open_edit = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $queryString = 
        [
            'cant' => ['except' => '10'],
            'sort' => ['except' => 'id'],
            'direction' => ['except' => 'desc'], 
            'search' => ['except' => '']
        ];

    protected $rules = [
        'product.name' =>'required|min:2|max:30',
        'product.price' =>'required',
        'product.brand_id' =>'required',
        'product.category_id' =>'required',
        'product.description' =>'required',
        'product.stock' =>'required',
        'product.image' =>'required',
        
    ];
    
    protected $messages = [
        'name.required' => 'El producto no puede estar vacio.',
        'name.min' => 'El producto debe tener al menos 2 caracteres.',
        'name.max' => 'El producto no debe tener mas de 30 caracteres.',
        'price' => 'el precio',
    ];

    # Cuando el escucha y el metodo llevan el mismo nombre se puede acortar. 
    protected $listeners = ['render', 'destroy'];

    public function mount()
    {
        $this->identificador = rand();
        $this->product = new Product();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        if ($this->readyToLoad) {
            $products = Product::with('relCategory', 'relBrand')
            ->where('name', 'like', '%' . $this->search .'%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        }
        else{
            $products = [];
        }
        return view('livewire.show-productos', compact('products'));
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


    public function edit(Product $product)
    {
        $this->product = $product;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        if($this->image) {
            Storage::delete([$this->product->prdImagen]);

            $this->product->image = $this->image->store('productos', 'public');
        }
        $this->product->save();

        $this->reset(['open_edit','prdImagen']);

        $this->identificador = rand();

        $this->emit('alert', 'El producto se actualizo satisfactoriamente');
    }


    public function destroy(Product $product){
        $product->delete();
    }
}
