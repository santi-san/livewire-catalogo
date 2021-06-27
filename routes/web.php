<?php

use App\Http\Controllers\ProductController;
use App\Http\Livewire\Admin\Home;
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

Route::get('/', Home::class)->name('index');

Route::get('/productos/{product}', [ProductController::class, 'show'])->name('products.show');

