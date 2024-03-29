<div x-data>

    <p class="text-gray-700 mb-4">
        <span class="font-semibold text-lg">Stock disponible:</span> {{ $quantity }}
    </p>

    <div class="flex">
        <div class="mr-4">
            <x-secondary-button
                disabled
                x-bind:disabled="$wire.qty <= 1"
                wire:loading.attr="disabled"
                wire:target="decrement"
                wire:click="decrement">
                -
            </x-secondary-button>

            <span class="mx-2 text-gray-700">{{$qty}}</span>

            <x-secondary-button
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled"
                wire:target="increment"
                wire:click="increment">
                +
            </x-secondary-button>
        </div>

        <div class="flex-1">
            <x-button-customized
                x-bind:disabled="$wire.qty > $wire.quantity"
                color="orange"
                class="w-full justify-center"
                wire:click="addItem"
                wire:loading.attr="disabled"
                wire:target="addItem">
                Agregar al carrito
            </x-button-customized>
        </div>
    </div>
</div>
