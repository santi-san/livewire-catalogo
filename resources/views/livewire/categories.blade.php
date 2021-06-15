<div wire:init="loadCategories">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-4 lg:px-8 py-12">
        <x-table>
            <x-table-header>
                {{-- CREATE MODAL --}}
                <x-jet-danger-button class="whitespace-nowrap" wire:click="createShowModal">
                    {{ __('Crear nueva categoria') }}
                </x-jet-danger-button>
            </x-table-header>
            {{-- TABLE & PAGINATION --}}
            @if (count($categories))
            <table class="min-w-full w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-36 whitespace-nowrap text-left cursor-pointer px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID

                                {{-- Sort --}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="mt-px fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="mt-px fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="mt-px fas fa-sort float-right"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="w-36 whitespace-nowrap cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Categoria

                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="mt-px fas fa-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="mt-px fas fa-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="mt-px fas fa-sort float-right"></i>
                                @endif
                                
                            </th>
                            <th scope="col" colspan="2"
                                class="w-36 whitespace-nowrap px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $item)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="text-sm text-gray-900 whitespace-nowrap text-center">{{$item->id}}</div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm text-gray-900">{{$item->name}}</div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a class="btn btn-green mx-3" wire:click="updateShowModal({{$item->id}})">
                                    <i class="mt-px fas fa-edit"></i>
                                </a> 
                                <a class="btn btn-red ml-2 " wire:click="$emit('deleteProduct', {{$item->id}})">
                                    <i class="mt-px fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($categories->hasPages())
                    <div class="px-5 py-4">
                        {{$categories->links()}}
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
            @if (isset($this->category->id))
                {{ __(' Editar categoria') }} 
            @else
                {{ __(' Agregar categoria') }} 
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label for="name" value="{{__('Nombre de la categoria')}}"/>
                <x-jet-input id="name" wire:model="name" type="text" class="w-full" />
                <x-jet-input-error for="name"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            {{-- wire:click="$toggle('showModal')"  --}}
            <x-jet-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                {{ __('Cancelar')}}
            </x-jet-secondary-button>


            @if (isset($this->category->id))
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
            Livewire.on('deleteProduct', id => {
                Swal.fire({
                    title: 'Estas seguro de querer borrar esta categoria?',
                    text: "No se puede revertir este cambio!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar categoria!',
                    cancelButtonText: 'No, volver atras!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('categories', 'destroy', id )

                        Swal.fire(
                            'Deleted!',
                            'La categoria fue borrada',
                            'success'
                        )
                    }
                })
            });
        </script>
   @endpush
</div>