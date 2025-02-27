<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="mb-4 text-2xl font-bold text-gray-800">Products in {{ $category->name }}</h2>
        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back to Categories</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach($products as $product)
                <section class="p-4 border border-gray-300 shadow-md rounded-lg bg-white hover:scale-105 transition">
                    <h5 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h5>
                    <p class="text-gray-600">Price: ${{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-600">Stock: {{ $product->stock }}</p>
                </section>
            @endforeach
        </div>

        @if($products->isEmpty())
            <p class="mt-4 text-gray-500">No products found in this category.</p>
        @endif
    </div>
</x-layout>
