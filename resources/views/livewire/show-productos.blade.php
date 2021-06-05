<div wire:init="loadProductos">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-2 lg:px-8 py-12">
        <x-table>

            <div class="px-2 py-4 flex items-center">

                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 form-control ">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entradas</span>
                </div>

                <x-jet-input class="flex-1 mx-4" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search"/>
                {{-- create modal --}}
                @livewire('create-producto')
            </div>
            {{-- List products --}}
            @if (count($products))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID

                                {{-- Sort --}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort ml-2"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Producto

                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort ml-2"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('price')">
                                Precio

                                {{-- Sort --}}
                                @if ($sort == 'price')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort ml-2"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('brand_id')">
                                Marca

                                {{-- check later Sort --}}
                                @if ($sort == 'brand_id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort ml-2"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('category_id')">
                                Categoria

                                {{-- check later Sort --}}
                                @if ($sort == 'category_id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort ml-2"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase "
                                wire:click="order('description')">
                                Descripcion

                                {{-- Sort --}}
                                @if ($sort == 'description')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort ml-2"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('stock')">
                                Stock

                                {{-- Sort --}}
                                @if ($sort == 'stock')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt ml-2"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt ml-2"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort ml-2"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Imagen
                            </th>
                            <th scope="col" 
                                class="whitespace-nowrap w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $item)
                        <tr>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->id}}</div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->name}}</div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->price}}</div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->relBrand->name}}</div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->relCategory->name}}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900 w-64 truncate" title="{{$item->description}}">{{$item->description}}</div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->stock}}</div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                               <img src="{{Storage::url($item->image)}}" alt="">
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium flex">
                                <a class="btn btn-green mx-3" wire:click="edit({{$item}})">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                <a class="btn btn-red ml-2 " wire:click="$emit('deleteProduct', {{$item->id}})">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($products->hasPages())
                    <div class="px-2 py-3">
                        {{$products->links()}}
                    </div>
                @endif
            @else
                <div class="px-2 py-4">
                    No se encontraron registros para <strong>{{$search}}</strong>
                </div>
            @endif
            
           
        </x-table>
    </div>


    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            Editar el producto
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Titulo del producto"/>
                <x-jet-input wire:model="product.name" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio"/>
                <x-jet-input wire:model="product.price" type="number" class="w-full" />
            </div>

            <div class="mb-4" wire:ignore>
                <x-jet-label value="Presentacion"/>
                <textarea 
                    wire:model="product.description"
                    id="editor2" 
                    class="form-control w-full" 
                    rows="6">
                </textarea> 

                {{-- Validation --}}
                <x-jet-input-error for="product.description"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Stock"/>
                <x-jet-input wire:model="product.prdStock" type="number" class="w-full"/>
            </div>
            <div class="mb-4">
                <input type="file" wire:model="image" id="{{$identificador}}">
                {{-- Validation --}}
                <x-jet-input-error for="image"/>
            </div>

            <div wire:loading wire:target="image" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Imagen cargando</p>
                        <p class="text-sm">Aguarde un momento hasta que la imagen se haya procesado.</p>
                    </div>
                </div>
            </div>

            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="">
                @else
                    <img src="{{Storage::url($product->image)}}" alt="">
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update"  wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

   </x-jet-dialog-modal>
   @push('js')

   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deleteProduct', productId => {
            Swal.fire({
                title: 'Estas seguro de borrar este producto?',
                text: "No se puede revertir este cambio!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar producto!',
                cancelButtonText: 'No, volver atras!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('show-productos', 'destroy', productId )

                    Swal.fire(
                        'Deleted!',
                        'El producto fue borrado',
                        'success'
                    )
                }
            })
        });
    </script>

   <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

   <script>
       ClassicEditor
           .create( document.querySelector( '#editor2' ) )
           .then(function(editor){
               editor.model.document.on('change:data', () => {
               
                   @this.set('product.prdPresentacion', editor.getData());
               })
           })
           .catch( error => {
               console.error( error );
           } );
   </script>

   @endpush
   
</div>
