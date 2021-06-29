<div wire:init="loadUsers">
    <x-slot name="header">
        {{ __('Usuarios') }}
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            <x-table-header/>
            {{-- TABLE & PAGINATION --}}
            @if (count($users))
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
                                        <i class="fas fa-sort-alpha-up-alt pl-3"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt pl-3"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort pl-3"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Nombre

                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt pl-3"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt pl-3"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort pl-3"></i>
                                @endif
                                
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('email')">
                                Email

                                {{-- Sort --}}
                                @if ($sort == 'email')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt pl-3"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt pl-3"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort pl-3"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rol
                            </th>
                            <th scope="col" colspan="2"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $item)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$item->id}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$item->name}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 hover:text-gray-900">
                                    {{$item->email}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 hover:text-gray-900">
                                    @if ( count($item->getRoleNames()) == 0 )
                                    
                                    @elseif ($item->getRoleNames()->contains('Admin'))
                                    Admin
                                    @elseif ($item->getRoleNames()->contains('Publisher'))
                                    Publisher
                                    @else
                                    Suscriber
                                    @endif
                                    

                                </div>
                            </td>
                            <td class="px-2 py-4 text-center whitespace-nowrap text-sm font-medium">
                                <a class="btn btn-green mx-3" wire:click="updateShowModal({{$item->id}})">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                <a class="btn btn-red ml-2 " wire:click="$emit('deleteUser', '{{$item->id}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($users->hasPages())
                    <div class="px-5 py-4">
                        {{$users->links()}}
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
            @if (isset($this->user->id))
                {{ __(' Editar usuario') }} 
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label for="name" value="{{__('Nombre del usuario')}}"/>
                <x-jet-input id="name" wire:model="name" type="text" class="w-full" />
                <x-jet-input-error for="name"/>
            </div>
            <div class="mb-4">
                <x-jet-label for="email" value="{{__('Email')}}"/>
                <x-jet-input id="email" wire:model="email" type="text" class="w-full" />
                <x-jet-input-error for="email"/>
            </div>
            <div class="mb-4">
                @foreach ( $roles as $role )
                       
                    <input type="checkbox" wire:model="user" value="{{$role->id}}" >
                    <span>{{ $role->name }}</span>
            
                @endforeach
                
            </div>
           
        </x-slot>

        <x-slot name="footer">
            {{-- wire:click="$toggle('showModal')"  --}}
            <x-jet-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                {{ __('Cancelar')}}
            </x-jet-secondary-button>


            @if (isset($this->user->id))
                <x-jet-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                    {{ __('Actualizar')}}
                </x-jets-button>
            @endif
        </x-slot>
</x-jet-dialog-modal>


    @push('js')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('deleteUser', userId => {
                Swal.fire({
                    title: 'Estas seguro de borrar este usuario?',
                    text: "No se puede revertir este cambio!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar usuario!',
                    cancelButtonText: 'No, volver atras!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.users', 'destroy', userId )

                        Swal.fire(
                            'Borrado!',
                            'El usuario fue borrado',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
