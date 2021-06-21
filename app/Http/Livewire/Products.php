<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Products extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $cant = '10';
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $name, $slug, $price, $stock, $description, $image, $category_id, $brand_id, $identifier;
    public $currentImage;
    public $product;
    public $showModal = false;
    public $readyToLoad = false;

    protected $listeners = ['destroy'];
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'], 
        'search' => ['except' => '']
    ];
    protected $rules = [
        'name' => 'required|min:2|max:255',
        'slug' => 'required|unique:products,slug',
        'price' => 'required',
        'category_id' => 'required',
        'brand_id' => 'required',
        'description' => 'required',
        'stock' => 'required',
        'image' => 'nullable|image|max:2048',
    ];
    protected $messages = [
        'name.required' => 'El producto no puede estar vacio.',
        'name.min' => 'El producto debe tener al menos 2 caracteres.',
        'name.max' => 'El producto no debe tener mas de 255 caracteres.',
        'price.required' => 'El precio no puede estar vacio.',
        'category_id.required' => 'La categoria no puede estar vacia',
        'brand_id.required' => 'La marca no puede estar vacia',
        'description.required' => 'La descripcion no puede estar vacia',
        'stock.required' => 'El stock no puede estar vacio',
        'image.required' => 'La imagen no puede estar vacia',
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            $products = Product::where('name', 'like', '%' . $this->search .'%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);
        }
        else{
            $products = [];
        }
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.products', compact('products','brands','categories'));
    }

    public function mount()
    {
        $this->product = new Product();
        $this->identifier = rand();
    }

    public function loadProducts(){
        $this->readyToLoad = true;
    }
   
    // reset the current page to "1" when filtering is applied.
    public function updatingSearch() {
        $this->resetPage();
    }

    public function order($sort) {
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

    // Store methods
    public function createShowModal() {
        $this->resetValidation();
        $this->reset([
            'name',
            'slug',
            'price',
            'category_id',
            'brand_id',
            'description',
            'stock',
            'image',
            'product'
        ]);
        $this->showModal = true;
    }
    public function store() {
        $this->validate();
        Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'description' => $this->description,
            'stock' => $this->stock,
            'image' => $this->image
        ]);
        $this->reset([
            'name',
            'slug',
            'price',
            'category_id',
            'brand_id',
            'description',
            'stock',
            'image',
            'product',
            'showModal'
        ]);
        $this->emit('alert', 'El producto se creo satisfactoriamente');
    }

    // Update methods
    public function updateShowModal(Product $product) {
        $this->resetValidation();
        $this->product = $product;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->description = $product->description;
        $this->currentImage = $product->image;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->showModal = true;
    }
    public function update() {
        $this->validate();
        if($this->image) {
            if (file_exists('storage/' . $this->currentImage)) {
                Storage::delete([$this->currentImage]);
            }
            $this->image = $this->image->store('products');
        }

        $this->product = Product::find($this->product->id);
        $this->product->name = $this->name;
        $this->product->price = $this->price;
        $this->product->stock = $this->stock;
        $this->product->description = $this->description;
        $this->product->image = $this->image;
        $this->product->category_id = $this->category_id;
        $this->product->brand_id = $this->brand_id;
        $this->product->save();

        $this->reset([
            'name', 
            'price',
            'stock',
            'description',
            'image',
            'category_id',
            'brand_id',
            'showModal'
        ]);
        $this->identificador = rand();
        $this->emit('alert', 'El producto se actualizo satisfactoriamente');
    }

    // Delete method
    public function destroy(Product $product){
        $product->delete();
    }



    // idk
    public function updatedName () {
        $this->slug = Str::slug($this->name);
        $this->validateOnly('name');   
    }
}
