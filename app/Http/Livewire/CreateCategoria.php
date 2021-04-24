<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CreateCategoria extends Component
{
    public $catNombre;
    public $open = false;

    protected $rules = [
        'catNombre' => 'required|min:2|max:30',
    ];

    protected $messages = [
        'catNombre.required' => 'La categoria no puede estar vacia.',
        'catNombre.min' => 'La categoria debe tener al menos 2 caracteres.',
        'catNombre.max' => 'La categoria no debe tener mas de 30 caracteres.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        Categoria::create([
            'catNombre' => $this->catNombre
        ]);

        $this->reset();

        # emitTo limita el componente que escucha el evento render
        $this->emitTo('show-categorias','render');
        
        $this->emit('alert', 'La categoria se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-categoria');
    }
}
