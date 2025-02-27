<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="mb-4 text-2xl font-bold text-gray-800 text-center">Product Categories</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            @foreach($categories as $category)
                <section class="p-4 border border-gray-300 shadow-md rounded-lg bg-white flex justify-around hover:scale-105 transition">
                    <h5 class="text-lg mb-3 font-semibold text-gray-700">{{ $category['name'] }}</h5>
                    <a href="{{ route('categories.' . $category['slug']) }}" class="px-4 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">View Products</a>
                </section>
            @endforeach
        </div>
    </div>
</x-layout>
