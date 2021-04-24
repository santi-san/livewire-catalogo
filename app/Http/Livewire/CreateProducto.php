<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class CreateProducto extends Component
{
    public $prdNombre;
    public $open = false;

    protected $rules = [
        'prdNombre' => 'required|min:2|max:30',
    ];

    protected $messages = [
        'prdNombre.required' => 'El producto no puede estar vacia.',
        'prdNombre.min' => 'El producto debe tener al menos 2 caracteres.',
        'prdNombre.max' => 'El producto no debe tener mas de 30 caracteres.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        Producto::create([
            'prdNombre' => $this->prdNombre
        ]);

        $this->reset();

        # emitTo limita el componente que escucha el evento render
        $this->emitTo('show-productos','render');
        
        $this->emit('alert', 'El producto se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-producto');
    }
}
