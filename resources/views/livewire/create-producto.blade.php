<div>
    <x-jet-danger-button wire:click="$set('open', 'true')">
        Crear nuevo producto
    </x-jet-danger-button>


    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo producto
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre"/>
                <x-jet-input type="text" class="w-full" wire:model="prdNombre"/>

                {{-- Validation --}}
                <x-jet-input-error for="prdNombre"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio"/>
                <x-jet-input type="number" class="w-full" wire:model="prdPrecio"/>

                {{-- Validation --}}
                <x-jet-input-error for="prdPrecio"/>
            </div>

            <div class="mb-4">

                <select name="idMarca" class="form-control" wire:model="idMarca">
                    <option value="">Seleccione una marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->idMarca}}">{{ $marca->mkNombre }}</option>
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
                <textarea 
                    wire:model="prdPresentacion"
                    id="editor" 
                    class="form-control w-full" 
                    rows="6">
                </textarea> 

                {{-- Validation --}}
                <x-jet-input-error for="prdPresentacion"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Stock"/>
                <x-jet-input type="number" class="w-full" wire:model="prdStock"/>

                {{-- Validation --}}
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

                @if ($prdImagen)
                    <img src="{{$prdImagen->temporaryUrl()}}" alt="">
                @endif
            

        </x-slot>

        {{-- Modal --}}
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, prdImagen" class="disabled:opacity-25">
                Crear post
            </x-jet-danger-button>

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