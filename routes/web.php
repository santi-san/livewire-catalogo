<?php

use App\Http\Livewire\ShowCategorias;
use App\Http\Livewire\ShowMarcas;
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

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/dashboard', ShowMarcas::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/categorias', ShowCategorias::class)->name('categorias');
