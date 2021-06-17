<div class="px-5 py-4 flex items-center dark:text-gray-300">
    <div class="flex items-center">
        <span>Mostrar</span>
        <select wire:model="cant" class="mx-4 form-control dark:bg-gray-900 dark:border-red-500">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <span>entradas</span>
    </div>
     {{-- SEARCH --}}
    <x-jet-input class="flex-1 mx-4" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search"/>
    {{-- CREATE MODAL --}}
    {{$slot}}
</div>