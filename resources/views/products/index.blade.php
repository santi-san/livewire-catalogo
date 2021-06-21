<x-app-layout>
    
    <div class="container py-8 ">

        <h1 class="text-center mb-8">Productos</h1>

        <div class="grid grid-cols-5 gap-6 mb-5">
            @foreach ($products as $product)
            <article class="card overflow-hidden rounded-lg bg-gray-800">
                <a href="{{route('products.show', $product->slug)}}">
                    <div class="w-full h-56">
                        <img class="w-full h-full" src="{{Storage::url($product->image)}}" alt="{{$product->name}}">
                    </div>
                    <div class="py-4 px-4">
                        <div>
                            <span class="price dark:text-yellow-400">${{number_format($product->price, 2)}}</span>
                        </div>
                        <span class="overflow-hidden max-h-11 dark:text-gray-400">{{$product->name}}</span>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        <div class="px-5 py-4 dark:bg-gray-800 rounded-lg">
            {{$products->links()}}
        </div>
    </div>
   


</x-app-layout>