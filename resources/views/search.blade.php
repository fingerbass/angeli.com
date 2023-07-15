<x-app-layout>
    <div class="container py-8">
        <div class="mb-4">
            {{ $products->links() }}
        </div>

        <ul>
            @forelse($products as $product)
                <x-product-list :product="$product"/>
            @empty
                <li class="bg-white rounded shadow-lg">
                    <div class="p-4">
                        <p class="text-lg text-gray-700">Lo sentimos, no encontramos resultados para
                            <span class="text-orange-500 text-xl font-semibold">'{{ $name }}'</span>
                        </p>
                        <p class="text-gray-500">Intenta buscar con un término más general.</p>
                    </div>
                </li>
            @endforelse
        </ul>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
