<div wire:init="loadProducts">
    <x-slot name="header">
            {{ __('Productos') }}
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            <x-table-header>
                {{-- CREATE MODAL --}}
                <x-jet-danger-button class="whitespace-nowrap" wire:click="createShowModal">
                    {{ __('Crear nuevo Producto') }}
                </x-jet-danger-button>
            </x-table-header>
            {{-- TABLE & PAGINATION --}}
            @if (count($products))
            <table class="min-w-full w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-36 text-left whitespace-nowrap  cursor-pointer px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('id')">
                            ID

                            {{-- Sort --}}
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="mt-px pl-3 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="mt-px pl-3 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="mt-px pl-3 fas fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="w-36 whitespace-nowrap  cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('name')">
                            Producto

                            {{-- Sort --}}
                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="mt-px pl-3 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="mt-px pl-3 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="mt-px pl-3 fas fa-sort"></i>
                            @endif
                            
                        </th>
                        <th scope="col"
                            class="w-36  whitespace-nowrap  cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('price')">
                            Precio

                            {{-- Sort --}}
                            @if ($sort == 'price')
                                @if ($direction == 'asc')
                                    <i class="mt-px pl-3 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="mt-px pl-3 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="mt-px pl-3 fas fa-sort"></i>
                            @endif
                            
                        </th>
                        <th scope="col"
                            class="w-36  whitespace-nowrap  cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('brand_id')">
                            Marca

                            {{-- check later Sort --}}
                            @if ($sort == 'brand_id')
                                @if ($direction == 'asc')
                                    <i class="mt-px pl-3 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="mt-px pl-3 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="mt-px pl-3 fas fa-sort"></i>
                            @endif
                            
                        </th>
                        <th scope="col"
                            class="w-36  whitespace-nowrap  cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('category_id')">
                            Categoria

                            {{-- check later Sort --}}
                            @if ($sort == 'category_id')
                                @if ($direction == 'asc')
                                    <i class="mt-px pl-3 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="mt-px pl-3 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="mt-px pl-3 fas fa-sort"></i>
                            @endif
                            
                        </th>
                        <th scope="col"
                            class="w-36  cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase "
                            wire:click="order('description')">
                            Descripcion

                            {{-- Sort --}}
                            @if ($sort == 'description')
                                @if ($direction == 'asc')
                                    <i class="mt-px pl-3 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="mt-px pl-3 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="mt-px pl-3 fas fa-sort"></i>
                            @endif
                            
                        </th>
                        <th scope="col"
                            class="w-36 whitespace-nowrap  cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('stock')">
                            Stock

                            {{-- Sort --}}
                            @if ($sort == 'stock')
                                @if ($direction == 'asc')
                                    <i class="mt-px pl-3 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="mt-px pl-3 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="mt-px pl-3 fas fa-sort"></i>
                            @endif
                            
                        </th>
                        <th scope="col"
                            class="w-36 text-center whitespace-nowrap  cursor-pointer px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Imagen
                        </th>
                        <th scope="col" 
                            class="w-36 text-center whitespace-nowrap  cursor-pointer px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $item)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <div class="text-sm text-gray-900">{{$item->id}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$item->name}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-center text-gray-900">{{$item->price}}</div>
                        </td>
                        <td class="px-4 py-4 ">
                            <div class="text-sm text-gray-900 w-32 truncate">{{$item->relBrand->name}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$item->relCategory->name}}</div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="text-sm text-gray-900 w-32 truncate" title="{{$item->description}}">{{$item->description}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$item->stock}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                           <img src="{{Storage::url($item->image)}}" alt="">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <a class="btn btn-green mx-3" wire:click="updateShowModal({{$item->id}})">
                                <i class="fas fa-edit"></i>
                            </a> 
                            <a class="btn btn-red ml-2 " wire:click="$emit('deleteProduct', '{{$item->id}}')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                @if ($products->hasPages())
                    <div class="px-5 py-4">
                        {{$products->links()}}
                    </div>
                @endif
            @else
                <div class="px-5 py-4">
                    No se encontraron registros para <strong>{{$search}}</strong>
                </div>
            @endif
        </x-table>
    </div>

    {{-- MODAL FORM --}}
    <x-jet-dialog-modal wire:model="showModal">
        <x-slot name="title">
            @if (isset($this->product->id))
                {{ __(' Editar producto') }} 
            @else
                {{ __(' Agregar producto') }} 
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label for="name" value="{{__('Nombre del producto')}}"/>
                <x-jet-input id="name" wire:model="name" type="text" class="w-full" />
                <x-jet-input-error for="name"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Precio"/>
                <x-jet-input wire:model="price" type="number" class="w-full" />
                <x-jet-input-error for="price"/>
                <x-jet-label value="Stock"/>
                <x-jet-input wire:model="stock" type="number" class="w-full"/>
                <x-jet-input-error for="stock"/>
            </div>
            <div class="mb-4">
                <select name="brand_id" class="form-control" wire:model="brand_id">
                    <option value="">Seleccione una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="brand_id"/>

                <select name="category_id" class="form-control" wire:model="category_id">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="category_id"/>
            </div>
            <div class="mb-4" wire:ignore>
                <x-jet-label value="Descripcion"/>
                <textarea 
                    wire:model="description"
                    id="editor2" 
                    class="form-control w-full" 
                    rows="6">
                </textarea> 
                <x-jet-input-error for="description"/>
            </div>
            
            <div class="mb-4">
                <input type="file" wire:model="image" id="{{$identifier}}">
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

            {{-- @if ($newImage)
                <img src="{{Storage::url($product->image)}}" alt="">
            @elseif ($image)
                <img src="{{ $image->temporaryUrl() }}" alt=""> 
            @endif  --}}
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt=""> 
            @elseif ($currentImage)
                <img src="{{Storage::url($currentImage)}}" alt="">
            @endif 

        </x-slot>

        <x-slot name="footer">
            {{-- wire:click="$toggle('showModal')"  --}}
            <x-jet-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                {{ __('Cancelar')}}
            </x-jet-secondary-button>


            @if (isset($this->product->id))
                <x-jet-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                    {{ __('Actualizar')}}
                </x-jets-button>
            @else
                <x-jet-button wire:click="store" wire:loading.attr="disabled" wire:target="store" class="disabled:opacity-25">
                    {{ __('Crear')}}
                </x-jets-button>
            @endif
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

                        Livewire.emitTo('products', 'destroy', productId )

                        Swal.fire(
                            'Borrado!',
                            'El producto fue borrado',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
