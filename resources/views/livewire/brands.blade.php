<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marcas') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
                 {{-- SEARCH --}}
                <x-jet-input class="flex-1 mr-4" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search"/>
                {{-- CREATE MODAL --}}
                <x-jet-danger-button wire:click="createShowModal">
                    {{ __('Crear nueva marca') }}
                </x-jet-danger-button>
            </div>
            {{-- TABLE --}}
            @if ($brands->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID

                                {{-- Sort --}}
                                @if ($sort == 'id')
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
                                wire:click="order('name')">
                                Marca

                                {{-- Sort --}}
                                @if ($sort == 'name')
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
                                wire:click="order('website')">
                                Website

                                {{-- Sort --}}
                                @if ($sort == 'website')
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
                                opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($brands as $brand)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$brand->id}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$brand->name}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 hover:text-gray-900">
                                    <a href="{{$brand->website}}">{{$brand->website}}</a>
                                </div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium">
                                <a class="btn btn-green mx-3" wire:click="updateShowModal({{$brand->id}})">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                <a class="btn btn-red ml-2 " wire:click="destroy({{$brand}})">
                                    <i class="fas fa-trash"></i>
                                </a>
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

    {{-- MODAL FORM --}}
    <x-jet-dialog-modal wire:model="showModal">
        <x-slot name="title">
            @if (isset($this->brand->id))
                {{ __(' Editar producto') }} 
            @else
                {{ __(' Agregar producto') }} 
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label for="name" value="{{__('Nombre de la marca')}}"/>
                <x-jet-input id="name" wire:model="brand.name" type="text" class="w-full" />
                <x-jet-input-error for="brand.name"/>
            </div>
            <div class="mb-4">
                <x-jet-label for="website" value="{{__('sitio web')}}"/>
                <x-jet-input id="website" wire:model="brand.website" type="text" class="w-full" />
                <x-jet-input-error for="brand.website"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                {{ __('Cancelar')}}
            </x-jet-secondary-button>


            @if (isset($this->brand->id))
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
</div>
