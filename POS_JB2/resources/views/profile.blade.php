<x-layout>
    <div class="container mx-auto p-6 flex justify-center min-h-screen">
        <section class="p-6 border border-gray-300 shadow-lg rounded-xl bg-white w-full h-max max-w-md text-center">
            <div class="mb-4">
                <img src={{ asset('images/cashier.jpg') }} alt="User Avatar" class="w-24 h-24 mx-auto rounded-full shadow-md">
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $name }}</h1>
            <p class="text-gray-800">Hi! im Abdullah Shamil, my id number is {{ $id }}</p>
        </section>
    </div>
</x-layout>
