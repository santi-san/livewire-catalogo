<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Category;
use Livewire\Component;

class CreateCategoria extends Component
{
    public $name;
    public $open = false;

    protected $rules = [
        'name' => 'required|min:2|max:255',
    ];

    protected $messages = [
        'name.required' => 'La categoria no puede estar vacia.',
        'name.min' => 'La categoria debe tener al menos 2 caracteres.',
        'name.max' => 'La categoria no debe tener mas de 255 caracteres.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        Category::create([
            'name' => $this->name
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
