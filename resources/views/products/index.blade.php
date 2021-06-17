<x-app-layout>
    
    <div class="container py-8 ">

        <h1 class="text-center mb-8">Productos</h1>

        <div class="grid grid-cols-5 gap-6">
            @foreach ($products as $product)
                <article class="card overflow-hidden rounded-lg bg-gray-800" style="">
                    <div class="w-full h-56">
                        <img class="w-full h-full" src="{{Storage::url($product->image)}}" alt="">
                    </div>
                    <div class="ui-item__content py-4 px-4 ">
                        <div class="ui-item__price-block">
                            <span class="price-tag ui-item__price">
                                <span class="price-tag-amount">
                                    <span class="price-tag-symbol">$</span>
                                    <span class="price-tag-fraction">{{$product->price}}</span>
                                </span>
                            </span>
                        </div>
                        <a href="{{route('products.show', $product)}}" class="ui-item__title overflow-hidden max-h-11">{{$product->name}}</a>
                    </div>
                    {{-- <div class="card-content absolute bottom-0 pb-4 pt-6 px-6 w-full" style="background: linear-gradient( hsl(0 0% 0% / 0), hsl(0 0% 0% / 0.1) 10%, hsl(10 0% 0% / 0.3) 25%, hsl(0 0% 0% / .8))">
                        
                        <h1 class="card-title truncate overflow-ellipsis cursor-pointer no-underline  py-1.5 px-5 hover:bg-green-400 rounded">
                            {{$product->name}}
                        </h1>
                        <div>
                            <a href="#" class="text-xs inline-block rounded bg-indigo-300 p-1">{{$product->RelCategory->name}}</a>
                        </div>

                    </div> --}}
                </article>
            @endforeach
        </div>

        <div class="px-5 py-4">
            {{$products->links()}}
        </div>
    </div>
   


</x-app-layout>