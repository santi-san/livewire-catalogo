<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Brands extends Component
{
    use WithPagination;

    public $cant = '10';
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $name, $website;
    public $brand;
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
        'website' => 'required|min:5|max:100',
    ];
    protected $messages = [
        'name.required' => 'La marca no puede estar vacia.',
        'name.min' => 'La marca debe tener al menos 2 caracteres.',
        'name.max' => 'La marca no debe tener mas de 255 caracteres.',
        'website.required' => 'El sitio web no puede estar vacio.',
        'website.min' => 'El sitio web debe tener al menos 5 caracteres.',
        'website.max' => 'El sitio web no debe tener mas de 100 caracteres.'
    ];

    public function render()
    {

        if ($this->readyToLoad) {
            $brands = Brand::where('name', 'like', '%' . $this->search .'%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);
            }
            else{
                $brands = [];
            }
        return view('livewire.admin.brands', compact('brands'));
    }

    public function loadBrands(){
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
        $this->reset(['name','website','brand']);
        // $this->resetValidation();
        $this->showModal = true;
    }
    public function store() {
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'website' => $this->website
        ]);
        $this->reset(['name','website','showModal']);
        $this->emit('alert', 'La marca se creo satisfactoriamente');
    }

    // Update methods
    public function updateShowModal(Brand $brand) {
        $this->resetValidation();
        $this->brand = $brand;
        $this->name = $this->brand->name;
        $this->website = $this->brand->website;
        $this->showModal = true;
    }
    public function update() {
        $this->validate();
        $this->brand = Brand::find($this->brand->id);
        $this->brand->name = $this->name;
        $this->brand->website = $this->website;
        $this->brand->save();

        $this->reset(['name','website','showModal']);
        $this->emit('alert', 'La marca se actualizo satisfactoriamente');
    }

    // Delete method
    public function destroy(Brand $brand){
        $brand->delete();
    }
}
