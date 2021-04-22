<?php

namespace App\Http\Livewire;

use App\Models\Marca;
use Livewire\Component;

class ShowMarcas extends Component
{

    public $search = '';


    public function render()
    {
        $marcas = Marca::where('mkNombre', 'like', '%' . $this->search .'%')->get();
        return view('livewire.show-marcas', compact('marcas'));
    }
}
