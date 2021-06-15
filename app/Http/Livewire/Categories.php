<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $cant = '10';
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $name;
    public $category;
    public $showModal = false;
    public $readyToLoad = false;

    protected $listeners = ['destroy'];
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'], 
        'search' => ['except' => '']
    ];
    protected $rules = [
        'name' => 'required|min:2|max:255'
        ];
    protected $messages = [
        'name.required' => 'La categoria no puede estar vacia.',
        'name.min' => 'La categoria debe tener al menos 2 caracteres.',
        'name.max' => 'La categoria no debe tener mas de 255 caracteres.'
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            $categories = Category::where('name', 'like', '%' . $this->search .'%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);
            }
            else{
                $categories = [];
            }
        return view('livewire.categories', compact('categories'));
    }


    public function loadCategories(){
        $this->readyToLoad = true;
    }
   
    // reset the current page to "1" when filtering is applied.
    public function updatingSearch() {
        $this->resetPage();
    }

    public function order($sort) {
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

    // Store methods
    public function createShowModal() {
        $this->resetValidation();
        $this->reset(['name','category']);
        // $this->resetValidation();
        $this->showModal = true;
    }
    public function store() {
        $this->validate();
        Category::create([
            'name' => $this->name
        ]);
        $this->reset(['name','showModal']);
        $this->emit('alert', 'La categoria se creo satisfactoriamente');
    }

    // Update methods
    public function updateShowModal(Category $category) {
        $this->resetValidation();
        $this->category = $category;
        $this->name = $this->category->name;
        $this->showModal = true;
    }
    public function update() {
        $this->validate();
        $this->category = Category::find($this->category->id);
        $this->category->name = $this->name;
        $this->category->save();

        $this->reset(['name','showModal']);
        $this->emit('alert', 'La categoria se actualizo satisfactoriamente');
    }

    // Delete method
    public function destroy(Category $category){
        $category->delete();
    }
}
