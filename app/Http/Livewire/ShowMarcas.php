<?php

namespace App\Http\Livewire;

use App\Models\Marca;
use Livewire\Component;

class ShowMarcas extends Component
{

    public $search = '';
    public $sort = 'idMarca';
    public $direction = 'desc';


    public function render()
    {
        $marcas = Marca::where('mkNombre', 'like', '%' . $this->search .'%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();
        return view('livewire.show-marcas', compact('marcas'));
    }

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
}
