<?php

use App\Http\Livewire\Products;
use App\Http\Livewire\ShowCategorias;
use App\Http\Livewire\ShowMarcas;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
                return view('dashboard');
        })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/marcas', ShowMarcas::class)->name('marcas');        

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/categorias', ShowCategorias::class)->name('categorias');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/productos', ShowProductos::class)->name('productos');


/*------------------THE EASY WAY------------------ */
Route::middleware(['auth:sanctum', 'verified'])
        ->get('/products', Products::class)->name('products');