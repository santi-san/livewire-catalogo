<?php

use App\Http\Controllers\ProductController;
use App\Http\Livewire\Brands;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Products;
use App\Http\Livewire\ShowProductos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/dashboard', Brands::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/marcas', Brands::class)->name('marcas');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/brands', Brands::class)->name('brands');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/categorias', Categories::class)->name('categorias');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/productos2', ShowProductos::class)->name('productos2');
Route::middleware(['auth:sanctum', 'verified'])
        ->get('/productos', Products::class)->name('productos');
