<nav class="bg-white border-b border-blue-300">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-center">
        <!-- Mobile menu button -->
        <button id="menu-button" type="button" class="absolute left-2 sm:hidden rounded-md p-2 text-blue-600 hover:bg-blue-100 hover:text-blue-800 focus:ring-2 focus:ring-blue-600 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
          <svg id="menu-icon" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg id="close-icon" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>

        <!-- Centered Links -->
        <div class="hidden sm:block">
          <div class="flex space-x-4 justify-center">
            <a href="/home" class="rounded-md px-3 py-2 text-sm font-medium {{ Request::is('home') ? 'text-lg text-blue-700 bg-blue-100' : 'text-blue-600 hover:text-blue-500' }}">Home</a>
            <a href="/categories" class="rounded-md px-3 py-2 text-sm font-medium {{ Request::is('categories') ? 'text-lg text-blue-700 bg-blue-100' : 'text-blue-600 hover:text-blue-500' }}">Products</a>
            <a href="/sales" class="rounded-md px-3 py-2 text-sm font-medium {{ Request::is('sales') ? 'text-lg text-blue-700 bg-blue-100' : 'text-blue-600 hover:text-blue-500' }}">Sales</a>
            <a href="{{ route('profile', ['id' => 1, 'name' => 'Abdullah Shamil Basayev']) }}" class="rounded-md px-3 py-2 text-sm font-medium {{ Request::is('profile') ? 'text-lg text-blue-700 bg-blue-100' : 'text-blue-600 hover:text-blue-500' }}">Profile</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden sm:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3">
        <a href="/home" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('home') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-100 hover:text-blue-800' }}">Home</a>
        <a href="/products" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('products') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-100 hover:text-blue-800' }}">Products</a>
        <a href="/products" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('products') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-100 hover:text-blue-800' }}">Products</a>
        <a href="/profile" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('profile') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-100 hover:text-blue-800' }}">Profile</a>
      </div>
    </div>
  </nav>
