<div wire:init="loadProductos">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-5 lg:px-8 py-12">
        <x-table>

            <div class="px-5 py-4 flex items-center">

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
            @if (count($productos))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-32 cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('idProducto')">
                                ID

                                {{-- Sort --}}
                                @if ($sort == 'idProducto')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdNombre')">
                                Producto

                                {{-- Sort --}}
                                @if ($sort == 'prdNombre')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdPrecio')">
                                Precio

                                {{-- Sort --}}
                                @if ($sort == 'prdPrecio')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('mkNombre')">
                                Marca

                                {{-- Sort --}}
                                @if ($sort == 'mkNombre')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('catNombre')">
                                Categoria

                                {{-- Sort --}}
                                @if ($sort == 'catNombre')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdPresentacion')">
                                Presentacion

                                {{-- Sort --}}
                                @if ($sort == 'prdPresentacion')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdStock')">
                                Stock

                                {{-- Sort --}}
                                @if ($sort == 'prdStock')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Imagen
                            </th>
                            <th scope="col" 
                                class="cursor-pointer px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($productos as $item)
                        <tr>
                            <td class="px-5 py-4">
                                <div class="text-sm text-gray-900">{{$item->idProducto}}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="text-sm text-gray-900">{{$item->prdNombre}}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="text-sm text-gray-900">{{$item->prdPrecio}}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="text-sm text-gray-900">{{$item->mkNombre}}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="text-sm text-gray-900">{{$item->catNombre}}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="text-sm text-gray-900">{{$item->prdPresentacion}}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="text-sm text-gray-900">{{$item->prdStock}}</div>
                            </td>
                            <td class="px-6 py-4">
                               <img src="{{Storage::url($item->prdImagen)}}" alt="">
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                {{-- @livewire('edit-producto', ['producto' => $producto], key($producto->idProducto)) --}}
                                <a class="btn btn-green" wire:click="edit({{$item}})">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($productos->hasPages())
                    <div class="px-5 py-3">
                        {{$productos->links()}}
                    </div>
                @endif
            @else
                <div class="px-5 py-4">
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
                <x-jet-input wire:model="producto.prdNombre" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio"/>
                <x-jet-input wire:model="producto.prdPrecio" type="number" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Presentacion del producto" />
                <textarea wire:model="producto.prdPresentacion" rows="6" class="form-control w-full"></textarea>
            </div>

            <div class="mb-4">
                <x-jet-label value="Stock"/>
                <x-jet-input wire:model="producto.prdStock" type="number" class="w-full"/>
            </div>
            <div class="mb-4">
                <input type="file" wire:model="prdImagen" id="{{$identificador}}">
                {{-- Validation --}}
                <x-jet-input-error for="prdImagen"/>
            </div>

            <div wire:loading wire:target="prdImagen" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
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

                @if ($prdImagen)
                    <img src="{{ $prdImagen->temporaryUrl() }}" alt="">
                    @else
                        <img src="{{Storage::url($producto->prdImagen)}}" alt="">
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

   
</div>
