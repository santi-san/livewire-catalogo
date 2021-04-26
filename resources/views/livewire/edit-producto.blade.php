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
                <x-jet-input wire:model="producto.prdNombre" type="text" class="w-full"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio"/>
                <x-jet-input wire:model="producto.prdPrecio" type="number" class="w-full"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Presentacion del producto" />
                <textarea wire:model="producto.prdPresentacion" rows="6" class="form-control w-full"></textarea>
            </div>

            <div class="mb-4">
                <select name="idCategoria" class="form-control" wire:model="idCategoria">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($categorias as $categoria)
                        <option {{ $producto->idCategoria == $categoria->idCategoria ? 'selected':''}}
                            value="{{ $categoria->idCategoria }}" >
                            {{ $categoria->catNombre }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-4">
                <x-jet-label value="Stock"/>
                <x-jet-input wire:model="producto.prdStock" type="number" class="w-full"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelr
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

   </x-jet-dialog-modal>
</div>
