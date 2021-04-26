<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>

            <div class="px-6 py-4 flex items-center">
                <x-jet-input class="flex-1 mr-4" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search"/>
                {{-- create modal --}}
                @livewire('create-producto')
            </div>
            @if ($productos->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdImagen')">
                                Imagen

                                {{-- Sort --}}
                                @if ($sort == 'prdImagen')
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($productos as $producto)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->idProducto}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->prdNombre}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->prdPrecio}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->mkNombre}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->catNombre}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->prdPresentacion}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->prdStock}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$producto->prdImagen}}</div>
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="text-sm text-gray-900">editar</div>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No se encontraron registros para <strong>{{$search}}</strong>
                </div>
            @endif
        </x-table>
    </div>

</div>
