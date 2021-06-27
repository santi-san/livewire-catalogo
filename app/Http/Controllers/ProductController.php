<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Livewire\WithPagination;

class ProductController extends Controller
{
    use WithPagination;

    public function index(){
        
        $products = Product::orderBy('id', 'desc')
                        ->paginate(10);

        return view('products.index', compact('products'));
    }


    public function show($slug){

       $product = Product::where('slug', $slug)->first();

        $related = Product::where('category_id', $product->category_id)
                            ->where('id', '!=', $product->id)
                            ->latest('id')
                            ->take(5)
                            ->get();


        return view('products.show', compact('product', 'related'));

    }
}