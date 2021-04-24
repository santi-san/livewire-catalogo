<?php

namespace App\Http\Livewire;

use App\Models\Marca;
use Livewire\Component;

class CreateMarca extends Component
{
    public $mkNombre;
    public $open = false;

    protected $rules = [
        'mkNombre' => 'required|min:2|max:30',
    ];

    protected $messages = [
        'mkNombre.required' => 'La marca no puede estar vacia.',
        'mkNombre.min' => 'La marca debe tener al menos 2 caracteres.',
        'mkNombre.max' => 'La marca no debe tener mas de 30 caracteres.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        Marca::create([
            'mkNombre' => $this->mkNombre
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
