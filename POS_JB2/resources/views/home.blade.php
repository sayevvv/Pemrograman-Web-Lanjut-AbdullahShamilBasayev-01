<x-layout>
    <section class="flex flex-col md:flex-row items-center justify-between px-8 md:px-16 py-20 bg-white min-h-screen">
        <div class="max-w-2xl text-center md:text-left">
          <h1 class="text-5xl font-bold leading-tight text-gray-900">
            Simplify Your Sales with <span class="text-blue-600">Smart POS</span>
          </h1>
          <p class="mt-6 text-lg text-gray-600">
            A fast, reliable, and intuitive POS system to manage transactions, track inventory, and grow your business effortlessly.
          </p>
          <p class="mt-6 text-sm text-gray-800">By Abdullah Shamil Basayev.</p>
          <div class="mt-8 flex justify-center md:justify-start gap-4">
            <button class="px-6 py-3 text-lg font-semibold text-white bg-blue-600 rounded-full hover:bg-blue-700 transition">
              Get Started
            </button>
          </div>
        </div>

        <div class="hidden md:block mt-12 md:mt-0">
          <img
            src={{ asset('images/cashier.jpg') }}
            alt="POS System"
            class="w-full max-w-md md:max-w-xl rounded-full"
          />
        </div>
      </section>
</x-layout>
