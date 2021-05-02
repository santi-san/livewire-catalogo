<div>
   <a class="btn btn-green" wire:click="$set('open', true)">
       <i class="fas fa-edit"></i>
   </a>

   <x-jet-dialog-modal wire:model="open">

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
                    <img src="{{$prdImagen->temporaryUrl()}}" alt="">
                    @else
                    <img src="{{Storage::url($producto->prdImagen)}}" alt="">
                @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save"  wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

   </x-jet-dialog-modal>
</div>
