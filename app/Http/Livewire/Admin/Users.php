<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    public $cant = '10';
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $name, $email;
    public $roless = [];
    public $user;
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
        'name' => 'required|min:2|max:255',
        'email' => 'required|email',
    ];
    protected $messages = [
        'name.required' => 'El nombre no puede estar vacio.',
        'name.min' => 'El nombre debe tener al menos 2 caracteres.',
        'name.max' => 'El nombre no debe tener mas de 255 caracteres.',
        'email.required' => 'El email no puede estar vacio.'
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            $users = User::with('roles')
                            ->where('name', 'like', '%' . $this->search .'%')
                            ->orWhere('email', 'like', '%' . $this->search .'%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);
            }
            else{
                $users = [];
            }
            $roles = Role::all();
        return view('livewire.admin.users', compact('users', 'roles'));
    }

    public function loadUsers(){
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

    // Update methods
    public function updateShowModal(User $user) {
        $this->resetValidation();
        // $this->roles = Role::all();
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->showModal = true;
    }
    public function update() {
        $this->validate();
        $this->user = User::find($this->user->id);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->save();

        $this->reset(['name','email','showModal']);
        $this->emit('alert', 'El usuario se actualizo satisfactoriamente');
    }

    // Delete method
    public function destroy(User $user){
        $user->delete();
    }
}
