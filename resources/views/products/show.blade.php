<x-app-layout>
    <x-slot name="header">
        {{$product->relCategory->name}}
    </x-slot>
    <div class="container py-8 dark:text-gray-300 ">
        <div class="grid grid-cols-3 p-5 gap-5 bg-yellow-900" style="outline: 1px solid cyan">
            {{-- Product --}}
            <div class="col-span-2">
                <div class="bg-gray-800 p-5 rounded-lg">
                    <img class="rounded-lg" src="{{Storage::url($product->image)}}" alt="">
                </div>
            </div>
            {{-- Sell details --}}
            <aside class="">
                <div class="bg-gray-800 rounded-lg p-5">
                    <span class="text-xs dark:text-gray-300 text-opacity-50 whitespace-pre-wrap">Nuevo   |   7 vendidos</span>
                    {{-- Product Name + Fav --}}
                    <div class="flex">
                        <h1 class="flex-auto text-4xl font-bold ">{{$product->name}}</h1>
                        <div>
                            <a class="text-yellow-300" href="#">
                            <i class="fas fa-heart fa-2x"></i>
                        </a>
                        </div>
                    </div>
                    {{-- Price + payment --}}
                    <div>
                        <p class="text-yellow-300 text-3xl">${{$product->price}}</p>
                     @php
                         $price = $product->price / 3;
                     @endphp
                        <p class="text-sm">
                            en 3 cuotas de <span class="text-yellow-300">$ {{round($price, 2)}}</span> sin interés.
                        </p>
                        <a href="#" class="text-sm text-yellow-300">Ver los medios de pago</a>
                    </div>
                       
                        <p>{{$product->description}}</p>
                    <p> Envío gratis a todo el país.</p> 
                    <p> Conocé los tiempos y las formas de envío.</p>
                    <p class="text-yellow-300"><i class="fas fa-map-marker-alt"></i>   Calcular cuando llega</p>
            </div>
            </aside>
        </div>
    </div>

</x-app-layout>