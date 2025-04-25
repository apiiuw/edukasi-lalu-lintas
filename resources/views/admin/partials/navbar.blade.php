<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="https://flowbite.com" class="flex ms-2 lg:gap-x-3 md:me-24">
            <img src="{{ asset('img/logo/logo-jasaraharja.png') }}" class="hidden lg:block h-16" alt="Flowbite Logo" />
            <img src="{{ asset('img/logo/logo-edulantas.png') }}" class="h-12 lg:h-16" alt="Flowbite Logo" />
          </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
              <div class="flex items-center gap-x-1 lg:gap-x-2 ms-auto py-1 lg:ps-6 lg:order-3 lg:col-span-3">
                @if (Auth::check())
                  <button type="button" class="flex justify-center py-2 px-3 mr-2 lg:mr-0 items-center text-sm bg-black rounded-full md:me-0 focus:ring-4 focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <i class="fa-solid fa-user lg:fa-xl rounded-full text-white pr-2"></i>
                    <p class="text-white text-sm lg:text-base">{{ Auth::user()->name }}</p>
                  </button>
                  <!-- Dropdown menu -->
                  <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg" id="user-dropdown">
                    <div class="px-4 py-3">
                      <span class="block text-sm text-black">{{ Auth::user()->name }}</span>
                      <span class="block text-sm  text-black truncate">{{ Auth::user()->email }}</span>
                      <span class="block text-blueJR text-xs">{{ Auth::user()->role }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                      @if(Auth::check() && Auth::user()->role === 'Admin')
                        <li>
                          <a href="/admin-statistik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Dashboard
                          </a>
                        </li>
                      @endif          
                      <li>
                        <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-600 hover:text-white">
                          @csrf
                          <button type="submit" class="w-full text-start">Sign out</button>
                        </form>
                      </li>
                    </ul>
                  </div>
                @else
                    <a href="/sign-up" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100">
                        Sign up
                    </a>
                    <a href="/login" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-blueJR text-white">
                        Sign In
                    </a>
                @endif
              </div>
            </div>
          </div>
      </div>
    </div>
</nav>