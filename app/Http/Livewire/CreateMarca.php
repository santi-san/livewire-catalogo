<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class CreateMarca extends Component
{
    public $name;
    public $website;
    public $open = false;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'website' => 'min:8'|'max:100',
    ];

    protected $messages = [
        'name.required' => 'La marca no puede estar vacia.',
        'name.min' => 'La marca debe tener al menos 2 caracteres.',
        'name.max' => 'La marca no debe tener mas de 30 caracteres.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        Brand::create([
            'name' => $this->name,
            'website' => $this->website
        ]);

        $this->reset();

        # emitTo limita el componente que escucha el evento render
        $this->emitTo('show-marcas','render');
        
        $this->emit('alert', 'La marca se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-marca');
    }
}
