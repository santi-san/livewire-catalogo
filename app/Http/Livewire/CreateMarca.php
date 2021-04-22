<?php

namespace App\Http\Livewire;

use App\Models\Marca;
use Livewire\Component;

class CreateMarca extends Component
{
    public $mkNombre;
    public $open = true;

    public function render()
    {
        return view('livewire.create-marca');
    }

    public function save()
    {
        Marca::create([
            'mkNombre' => $this->mkNombre
        ]);
    }
}
