<?php

use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Brands;
use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->middleware('can:admin.home' )->name('admin.home');

Route::get('/usuarios', Users::class)->middleware('can:admin.usuarios' )->name('admin.usuarios');

Route::get('/marcas', Brands::class)->middleware('can:admin.marcas' )->name('admin.marcas');

Route::get('/categorias', Categories::class)->middleware('can:admin.categorias' )->name('admin.categorias');

Route::get('/productos', Products::class)->middleware('can:admin.productos' )->name('admin.productos');