<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{

    use WithPagination;

    
    public function render()
    {

        $products = Product::orderBy('id', 'desc')
        ->paginate(10);

        return view('livewire.admin.home', compact('products'));
    }

    public function show($slug){

        $product = Product::where('slug', $slug)->first();
 
         $related = Product::where('category_id', $product->category_id)
                             ->where('id', '!=', $product->id)
                             ->latest('id')
                             ->take(5)
                             ->get();
 
 
         return view('livewire.admin.show', compact('product', 'related'));
 
     }
}
