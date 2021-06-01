<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    {{-- List products --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-2 lg:px-8 py-12">
        <x-table>
            <div class="px-2 py-4 flex items-center">
                {{-- Filter quantity --}}
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
                {{-- Search --}}
                <x-jet-input class="flex-1 mx-4" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search"/>
                {{-- Create button to open modal --}}
                <x-jet-danger-button wire:click="createShowModal">
                    {{ __('Crear nuevo producto') }}
                </x-jet-danger-button>
            </div>
            {{-- Table --}}
            @if ($products->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr class="whitespace-nowrap">
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('idProducto')">
                                ID
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdNombre')">
                                Producto
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdPrecio')">
                                Precio
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('mkNombre')">
                                Marca
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('catNombre')">
                                Categoria
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdPresentacion')">
                                Presentacion
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('prdStock')">
                                Stock
                            </th>
                            <th scope="col"
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Imagen
                            </th>
                            <th scope="col" 
                                class="w-36 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $item)
                        <tr class="">
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900">{{$item->idProducto}}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900">{{$item->prdNombre}}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900">{{$item->prdPrecio}}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900">{{$item->relMarca->mkNombre}}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900">{{$item->relCategoria->catNombre}}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900 truncate">
                                    {{ $item->prdPresentacion }}</div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-sm text-gray-900">{{$item->prdStock}}</div>
                            </td>
                            <td class="px-2 py-4">
                                <img src="{{Storage::url($item->prdImagen)}}" alt="">
                            </td>
                            <td class="px-2 py-4 text-sm font-medium whitespace-nowrap">
                                <a class="btn btn-green mx-3" wire:click="updateShowModal({{$item->idProducto}})">
                                    {{ __('Update')}}
                                    {{-- <i class="fas fa-edit"></i> --}}
                                </a> 
                                <a class="btn btn-red " wire:click="edit({{$item}})">
                                    {{ __('Delete')}}
                                    {{-- <i class="fas fa-edit"></i> --}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </x-table>
    </div>
   
    {{-- Modal form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            @if ($product)
                {{ __(' Editar el producto') }} 
            @else
                {{ __(' Guardar un producto') }} 
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label for="prdNombre" value="{{__('Nombre del producto')}}"/>
                <x-jet-input id="prdNombre" wire:model="prdNombre" type="text" class="w-full" />
                <x-jet-input-error for="prdNombre"/>
            </div>
            <div class="mb-4">
                <x-jet-label for="prdPrecio" value="Precio"/>
                <x-jet-input id="prdPrecio" wire:model="prdPrecio" type="number" class="w-full" />
                <x-jet-input-error for="prdPrecio"/>
            </div>
            <div class="mb-4">

                <select name="idMarca" class="form-control" wire:model="idMarca">
                    <option value="">Seleccione una marca</option>
                    @foreach ($marcas as $marca)
                            <option value="{{$marca->idMarca}}"> {{$marca->mkNombre}}</option>
                    @endforeach 
                </select>
                {{-- Validation --}}
                <x-jet-input-error for="idMarca"/>

                 <select name="idCategoria" class="form-control" wire:model="idCategoria">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->idCategoria}}">{{ $categoria->catNombre }}</option>
                    @endforeach
                </select>
                {{-- Validation --}}
                <x-jet-input-error for="idCategoria"/>
            </div>
            <div class="mb-4" wire:ignore>
                <x-jet-label value="Presentacion"/>
                <textarea id="editor"
                        wire:model="prdPresentacion"
                        class="form-control w-full"
                        rows="6">
                        {{!! 'prdPresentacion'  !!}}
                </textarea> 
                <x-jet-input-error for="prdPresentacion"/>
                </div>
            <div class="mb-4">
                <x-jet-label for="prdStock" value="Stock"/>
                <x-jet-input wire:model="prdStock" type="number" class="w-full"/>
                <x-jet-input-error for="prdStock"/>
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

                @if ($prdImagen )
                    <img src="{{ $prdImagen->temporaryUrl() }}" alt="">
                @else
                    <img src="{{Storage::url($prdImagen)}}" alt="">
                @endif







        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancelar')}}
            </x-jet-secondary-button>


            @if ($product)
                <x-jet-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                    {{ __('Actualizar')}}
                </x-jets-button>
            @else
                <x-jet-button wire:click="store" wire:loading.attr="disabled" wire:target="store, prdImagen" class="disabled:opacity-25">
                    {{ __('Crear')}}
                </x-jets-button>
            @endif
        </x-slot>

   </x-jet-dialog-modal>


   @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

        <script>
            
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('prdPresentacion', editor.getData());
                    })
                })
                .catch( error => {
                    console.error( error );
                } );
            
         </script>

    @endpush
</div>
