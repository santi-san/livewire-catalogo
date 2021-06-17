<x-app-layout>
    <x-slot name="header">
        {{$product->relCategory->name}}
    </x-slot>
    <div class="container py-8 dark:text-gray-300">
        <div class="grid grid-cols-3 p-5" style="outline: 1px solid cyan">
            {{-- Product --}}
            <div class="col-span-2 ">
                <img class="rounded-lg" src="{{Storage::url($product->image)}}" alt="">
                <h1 class="text-4xl font-bold ">{{$product->name}}</h1>
                <p>${{$product->price}}</p>
                <p>{{$product->description}}</p>
            </div>
            {{-- Sell details --}}
            <aside class=" bg-gray-800">
                <div class="bg-gray-900 p-5">
                    Envío gratis a todo el país Conocé los tiempos y las formas de envío.
                <svg xmlns="http://www.w3.org/2000/svg" class="ui-pdp-icon ui-pdp-icon--shipping ui-pdp-icon--truck ui-pdp-color--GREEN" width="18" height="15" viewBox="0 0 18 15">
                    <path fill-rule="nonzero" d="M7.763 12.207a2.398 2.398 0 0 1-4.726 0H1.8a1.8 1.8 0 0 1-1.8-1.8V2.195a1.8 1.8 0 0 1 1.8-1.8h8.445a1.8 1.8 0 0 1 1.8 1.8v.568l3.322.035L18 6.821v5.386h-2.394a2.398 2.398 0 0 1-4.727 0H7.763zm-.1-1.2h3.182V2.195a.6.6 0 0 0-.6-.6H1.8a.6.6 0 0 0-.6.6v8.212a.6.6 0 0 0 .6.6h1.337a2.399 2.399 0 0 1 4.526 0zm7.843 0H16.8V7.179l-2.086-3.187-2.669-.029v5.76a2.399 2.399 0 0 1 3.461 1.284zm-2.263 1.99a1.198 1.198 0 1 0 0-2.395 1.198 1.198 0 0 0 0 2.396zm-7.843 0a1.198 1.198 0 1 0 0-2.395 1.198 1.198 0 0 0 0 2.396z"></path>
                </svg>
            </div>
            </aside>
        </div>
    </div>

</x-app-layout>