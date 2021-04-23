<?php

namespace App\Http\Livewire;

use App\Models\Marca;
use Livewire\Component;

class CreateMarca extends Component
{
    public $mkNombre;
    public $open = false;

    public function render()
    {
        return view('livewire.create-marca');
    }

    public function save()
    {
        Marca::create([
            'mkNombre' => $this->mkNombre
        ]);

        $this->reset();

        # emitTo limita el componente que escucha el evento render
        $this->emitTo('show-marcas','render');
        
        $this->emit('alert', 'La marca se creo satisfactoriamente');
    }
}
