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
                <x-jet-input type="text" class="w-full" wire:model="name"/>

                {{-- Validation --}}
                <x-jet-input-error for="name"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio"/>
                <x-jet-input type="number" class="w-full" wire:model="price"/>

                {{-- Validation --}}
                <x-jet-input-error for="price"/>
            </div>

            <div class="mb-4">

                <select name="brand_id" class="form-control" wire:model="id">
                    <option value="">Seleccione una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{ $brand->name }}</option>
                    @endforeach
                </select>

                {{-- Validation --}}
                <x-jet-input-error for="brand_id"/>

                <select name="category_id" class="form-control" wire:model="category_id">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{-- Validation --}}
                <x-jet-input-error for="category_id"/>
            </div>

            <div class="mb-4" wire:ignore>
                <x-jet-label value="Presentacion"/>
                <textarea 
                    wire:model="description"
                    id="editor" 
                    class="form-control w-full" 
                    rows="6">
                </textarea> 

                {{-- Validation --}}
                <x-jet-input-error for="description"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Stock"/>
                <x-jet-input type="number" class="w-full" wire:model="stock"/>

                {{-- Validation --}}
                <x-jet-input-error for="stock"/>
            </div>

            <div class="mb-4">
                <input type="file" wire:model="image" id="{{$identificador}}">
                {{-- Validation --}}
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

                @if ($image)
                    <img src="{{$image->temporaryUrl()}}" alt="">
                @endif
            

        </x-slot>

        {{-- Modal --}}
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
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
                    
                        @this.set('description', editor.getData());
                    })
                })
                .catch( error => {
                    console.error( error );
                } );
        </script>
    
        @endpush
</div>