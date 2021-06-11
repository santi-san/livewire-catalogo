<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Brands extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $name, $website;
    public $brand;
    public $showModal = false;


    protected $rules = [
        'brand.name' => 'required|min:2|max:255',
        'brand.website' => 'required|min:5|max:100',
    ];
    protected $messages = [
        'brand.name.required' => 'La marca no puede estar vacia.',
        'brand.name.min' => 'La marca debe tener al menos 2 caracteres.',
        'brand.name.max' => 'La marca no debe tener mas de 255 caracteres.',
        'brand.website.required' => 'El sitio web no puede estar vacio.',
        'brand.website.min' => 'El sitio web debe tener al menos 5 caracteres.',
        'brand.website.max' => 'El sitio web no debe tener mas de 100 caracteres.'
    ];
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
    public function render()
    {
        $brands = Brand::where('name', 'like', '%' . $this->search .'%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();
        return view('livewire.brands', compact('brands'));
    }
    // Store methods
    public function createShowModal() {
        $this->resetValidation();
        $this->reset();
        $this->showModal = true;
    }
    public function store()
    {
        $this->validate();
        Brand::create([
            'name' => $this->brand['name'],
            'website' => $this->brand['website']
        ]);
        $this->reset();
        $this->emit('alert', 'La marca se creo satisfactoriamente');
    }
    // Update methods
    public function updateShowModal(Brand $brand) {
        $this->resetValidation();
        $this->brand = $brand;
        $this->showModal = true;
    }
    public function update()
    {
        $this->validate();
        $this->brand->save();
        $this->reset();
    }
}
