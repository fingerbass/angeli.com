<x-app-layout>
    <div class="container mt-4">
        <div class="rounded-lg shadow bg-white p-6">
            <p class="text-green-600 text-xl font-semibold">¡Felicitaciones!</p>
            <p class="text-gray-700 my-3">Tu compra fue procesada correctamente y será entregada en tu dirección en los
                próximos 7 días.</p>
            <x-button-enlace href="{{ route('home') }}" color="orange" class="mt-2">
                Regresar a la tienda
            </x-button-enlace>
        </div>
    </div>
</x-app-layout>
