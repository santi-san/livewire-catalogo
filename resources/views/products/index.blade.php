<x-app-layout>
    
    <div class="container py-8 ">

        <h1 class="text-center mb-8">Productos</h1>

        <div class="grid grid-cols-4 gap-6">
            @foreach ($products as $product)
                <article class="card relative  text-white bg-cover pt-24 w-full h-80 overflow-hidden rounded-lg" style="background-image: 
                url('{{Storage::url($product->image)}}')">
                    <div class="card-content absolute bottom-0 pb-4 px-6" style="
                        background: linear-gradient( hsl(0 0% 0% / 0), hsl(10 0% 0% / 0.4) 20%, hsl(0 0% 0% / 1) 
                        )">
                        
                        <h2 class="card-title">
                            {{$product->name}}
                        </h2>
                        <p class="card-body overflow-ellipsis overflow-hidden">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, ipsam!
                        </p>
                        <a href="" class="inline-block cursor-pointer no-underline bg-green-500 py-1.5 px-5 hover:bg-green-400 rounded">read more</a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="px-5 py-4">
            {{$products->links()}}
        </div>
    </div>
   


</x-app-layout>