<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class ProductController extends Controller
{
    use WithPagination;

    public function index(){
        
        $products = Product::orderBy('id', 'desc')
                        ->paginate(8);

        return view('products.index', compact('products'));
    }
}
