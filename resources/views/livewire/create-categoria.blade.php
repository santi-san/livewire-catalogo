<div>
    <x-jet-danger-button wire:click="$set('open', 'true')">
        Crear nueva categoria
    </x-jet-danger-button>


    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva marca
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre de la marca"/>
                <x-jet-input type="text" class="w-full" wire:model="catNombre"/>

                {{-- Validation --}}
                <x-jet-input-error for="catNombre"/>
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
