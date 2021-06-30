<?php

use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Brands;
use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('admin.home');

Route::get('/usuarios', Users::class)->name('admin.usuarios');

Route::get('/marcas', Brands::class)->name('admin.marcas');

Route::get('/categorias', Categories::class)->name('admin.categorias');

Route::get('/productos', Products::class)->name('admin.productos');