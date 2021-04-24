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
                <x-jet-label value="Nombre del producto"/>
                <x-jet-input type="text" class="w-full" wire:model="prdNombre"/>

                {{-- Validation --}}
                <x-jet-input-error for="prdNombre"/>
            </div>

        </x-slot>

        {{-- Modal --}}
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Crear post
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

</div>