<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProducto extends Component
{

    use WithFileUploads;

    public $name;
    public $price;
    public $category_id;
    public $brand_id;
    public $description;
    public $stock;
    public $image;
    public $identificador;

    public $open = false;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'name' => 'required|min:2|max:30',
        'price' => 'required',
        'category_id' => 'required',
        'brand_id' => 'required',
        'description' => 'required',
        'stock' => 'required',
        'image' => 'required|image|max:2048',
    ];

    protected $messages = [
        'name.required' => 'El producto no puede estar vacia.',
        'name.min' => 'El producto debe tener al menos 2 caracteres.',
        'name.max' => 'El producto no debe tener mas de 30 caracteres.',
        'price' => 'el precio',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $image = $this->image->store('products', 'public');

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'description' => $this->description,
            'stock' => $this->stock,
            'image' => $image,
        ]);

        $this->reset(['open','name','price','category_id','brand_id','description','stock',
        'image', 'identificador']);
        # resetea el input file por medio de su id
        $this->identificador = rand();

        # emitTo limita el componente que escucha el evento render
        $this->emitTo('show-productos', 'render');
        
        $this->emit('alert', 'El producto se creo satisfactoriamente');
    }

    public function render()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.create-producto', compact('brands','categories'));
    }
}
