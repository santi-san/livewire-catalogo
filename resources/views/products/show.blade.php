<x-app-layout>
    <x-slot name="header">
        {{$product->relCategory->name}}
    </x-slot>
    <div class="container py-8 dark:text-gray-300 ">
        <div class="grid grid-cols-3 p-5 gap-5 bg-gray-800 rounded-md">
            {{-- Product --}}
            <div class="col-span-3 md:col-span-3 lg:col-span-2">
                <div class=" bg-gray-900 p-5 rounded-lg ">
                    <div class="flex justify-center mb-5 p-5 rounded-lg h-96" style="background-image: url({{Storage::url($product->image)}});background-size: contain;
                        background-position: center;
                        background-repeat: no-repeat;">
                    </div>
                    <div>
                        <h2 class=" text-2xl mb-4 ">Descripción:</h2>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
            </div>
            {{-- Info + related products --}}
            <aside class="col-span-3 md:col-span-3 lg:col-span-1">
                {{-- Sell details --}}
                <div class="bg-gray-900 rounded-lg p-5 mb-5">
                    <div class="flex justify-between">
                        <span class="text-xs dark:text-gray-300 text-opacity-50 whitespace-pre-wrap">Nuevo   |   {{rand(1,50)}} vendidos</span>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20"><g stroke-width="1.0" fill-rule="evenodd"><path stroke="#e6bb5d" d="M10.977 2.705C11.93 1.618 13.162 1 14.895 1c3.333 0 5.607 2.152 5.607 6.274 0 .08-.002.16-.005.24-.107 2.596-1.876 5.253-4.737 7.892a33.77 33.77 0 0 1-3.165 2.57 32.447 32.447 0 0 1-1.45.983l-.394.243-.394-.243-.009-.005-.021-.014-.08-.05a32.447 32.447 0 0 1-1.34-.914 33.77 33.77 0 0 1-3.165-2.57c-2.86-2.639-4.63-5.296-4.737-7.892A5.839 5.839 0 0 1 1 7.274C1 3.152 3.274 1 6.607 1c1.733 0 2.966.618 3.918 1.705.056.064.137.165.226.282.09-.117.17-.218.226-.282z"></path></g></svg>
                    </a>
                    </div>
                    {{-- Product Name + Fav --}}
                    <h1  class=" text-4xl font-bold ">{{$product->name}}</h1>
                        
                    {{-- Price + payment --}}
                    <div>
                        <p class="text-yellow-300 text-3xl">${{$product->price}}</p>
                     @php
                         $price = $product->price / 3;
                     @endphp
                        <p class="text-sm">
                            en 3 cuotas de <span class="text-yellow-300">$ {{ number_format($price, 2)}}</span> sin interés.
                        </p>
                        <a href="#" class="text-sm text-yellow-300">Ver los medios de pago</a>
                    </div>
                    {{-- Delivery time --}}
                    <div class="mt-5 dark:bg-gray-800 p-5 rounded-lg">
                        <div class="flex items-start">
                            <figure class="mr-4 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-yellow-300" width="20" height="20" viewBox="0 0 18 15"><path fill-rule="nonzero" d="M7.763 12.207a2.398 2.398 0 0 1-4.726 0H1.8a1.8 1.8 0 0 1-1.8-1.8V2.195a1.8 1.8 0 0 1 1.8-1.8h8.445a1.8 1.8 0 0 1 1.8 1.8v.568l3.322.035L18 6.821v5.386h-2.394a2.398 2.398 0 0 1-4.727 0H7.763zm-.1-1.2h3.182V2.195a.6.6 0 0 0-.6-.6H1.8a.6.6 0 0 0-.6.6v8.212a.6.6 0 0 0 .6.6h1.337a2.399 2.399 0 0 1 4.526 0zm7.843 0H16.8V7.179l-2.086-3.187-2.669-.029v5.76a2.399 2.399 0 0 1 3.461 1.284zm-2.263 1.99a1.198 1.198 0 1 0 0-2.395 1.198 1.198 0 0 0 0 2.396zm-7.843 0a1.198 1.198 0 1 0 0-2.395 1.198 1.198 0 0 0 0 2.396z"></path></svg>
                            </figure>
                            <div>
                                <p>Llega gratis <span class=" dark:text-green-600 font-bold">el martes</span></p>
                                <p class="text-sm dark:text-gray-300 text-opacity-50">Beneficio Mercado Puntos</p>
                                <a href="#" class="text-sm text-yellow-300">Ver más formas de entrega</a>
                            </div>
                        </div>
                    </div>
                    {{-- Returns --}}
                    <div class="mt-5 dark:bg-gray-800 p-5 rounded-lg">
                        <div class="flex items-start">
                            <figure class="mr-4 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-yellow-300" width="20" height="20" viewBox="0 0 14 12"><path d="M2.474 7.2h7.225a2.7 2.7 0 1 0 0-5.4H7V.6h2.7a3.9 3.9 0 1 1 0 7.8H2.473l2.45 2.389-.839.859L.14 7.8l3.945-3.848.838.859L2.473 7.2z"></path></svg>
                            </figure>
                            <div>
                                <p>Devolución gratis</p>
                                <p class="text-sm dark:text-gray-300 text-opacity-50">Tenés 30 días desde que lo recibís.</p>
                                <a href="#" class="text-sm text-yellow-300">Conocer mas</a>
                            </div>
                        </div>
                    </div>
                    {{-- Stock --}}
                    <div class="mt-5">
                        <p class="text-yellow-300 font-bold mb-4">Stock disponible</p>
                        <div>
                            <p class="text-sm">Cantidad:
                            <select name="" class="form-control form-control py-0 pl-0 pr-2">
                                <option value="1">1 unidad</option>
                                @for ($i = 2; $i <= $product->stock; $i++)
                                <option value="{{$i}}">{{ $i . ' unidades' }}</option>
                                @endfor
                            </select>
                             <span> ({{$product->stock}} disponibles) </span>
                            </p>
                        </div>
                        <div class="mt-5">
                            <button class="w-full py-3 border border-transparent hover:border-yellow-400 rounded-md dark:bg-gray-800">COMPRAR AHORA</button>
                        </div>
                    </div>
                </div>
                {{-- Related products --}}
                <div class="bg-gray-900 rounded-lg p-5">
                    <span class="text-sm dark:text-gray-300">Productos relacionados</span>
                    {{-- Product --}}
                    <ul>
                        @foreach ($related as $item)
                        <li class="hover:bg-gray-800 p-2 rounded-lg mt-4 flex h-24">
                            <img class="w-20 h-20 rounded-md" src="{{Storage::url($item->image)}}" alt="{{$item->name}}">
                            <div class="ml-4 overflow-hidden">
                                <span class="text-yellow-300">$ {{$item->price}} </span>
                                <p class="text-sm text-green-700">envio gratis</p>
                                <p class="text-sm">{{$item->description}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    
                </div>
            </aside>
        </div>
    </div>

</x-app-layout>