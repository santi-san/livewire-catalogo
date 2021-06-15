<div wire:init="loadBrands">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marcas') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            <x-table-header>
                {{-- CREATE MODAL --}}
                <x-jet-danger-button class="whitespace-nowrap" wire:click="createShowModal">
                    {{ __('Crear nueva marca') }}
                </x-jet-danger-button>
            </x-table-header>
            {{-- TABLE & PAGINATION --}}
            @if (count($brands))
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
                        @foreach ($brands as $item)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$item->id}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$item->name}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 hover:text-gray-900">
                                    <a href="{{$item->website}}">{{$item->website}}</a>
                                </div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium">
                                <a class="btn btn-green mx-3" wire:click="updateShowModal({{$item->id}})">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                <a class="btn btn-red ml-2 " wire:click="$emit('deleteBrand', '{{$item->id}}', '{{$item->relProducts->count()}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($brands->hasPages())
                    <div class="px-5 py-4">
                        {{$brands->links()}}
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
            @if (isset($this->brand->id))
                {{ __(' Editar producto') }} 
            @else
                {{ __(' Agregar producto') }} 
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label for="name" value="{{__('Nombre de la marca')}}"/>
                <x-jet-input id="name" wire:model="name" type="text" class="w-full" />
                <x-jet-input-error for="name"/>
            </div>
            <div class="mb-4">
                <x-jet-label for="website" value="{{__('sitio web')}}"/>
                <x-jet-input id="website" wire:model="website" type="text" class="w-full" />
                <x-jet-input-error for="website"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            {{-- wire:click="$toggle('showModal')"  --}}
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


    @push('js')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('deleteBrand', function( productId, productsrel) {
                if(productsrel > 0 ){
                    Swal.fire({
                    title: 'Error',
                    text: "La marca tiene productos relacionados y no puede ser borrada",
                    icon: 'warning'
                })
                    return;
                }
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

                        Livewire.emitTo('brands', 'destroy', productId )

                        Swal.fire(
                            'Deleted!',
                            'La marca fue borrada',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
