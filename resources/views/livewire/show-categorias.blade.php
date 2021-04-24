<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>


    {{$search}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>

            <div class="px-6 py-4 flex items-center">
                <x-jet-input class="flex-1 mr-4" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search"/>
                {{-- create modal --}}
                @livewire('create-categoria')
            </div>
            @if ($categorias->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('idCategoria')">
                                ID

                                {{-- Sort --}}
                                @if ($sort == 'idCategoria')
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
                            <th scope="col" colspan="2"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Agregar
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$categoria->idCategoria}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$categoria->catNombre}}</div>
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="text-sm text-gray-900">editar</div>
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
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
