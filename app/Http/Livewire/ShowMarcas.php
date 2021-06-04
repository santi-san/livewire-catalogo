<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class ShowMarcas extends Component
{

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    # Escucha 'render' de CreateMarca y ejecuta el metodo render() de ShowMarcas
    # protected $listeners = ['render' => 'render']; 
    # Cuando el escucha y el metodo llevan el mismo nombre se puede acortar. 
    protected $listeners = ['render'];

    public function render()
    {
        $brands = Brand::where('name', 'like', '%' . $this->search .'%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();
        return view('livewire.show-marcas', compact('brands'));
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
