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
          <a href="https://flowbite.com" class="flex ms-2 md:me-24">
            <img src="{{ asset('img/logo/logo-jasaraharja.png') }}" class="hidden lg:block h-16" alt="Flowbite Logo" />
            <img src="{{ asset('img/logo/logo-edulantas.png') }}" class="h-12 lg:h-16" alt="Flowbite Logo" />
          </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
              <div>
                <button type="button" class="flex rounded-full w-full h-full" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <i class="fa-solid fa-circle-user fa-2xl w-full h-full rounded-full text-blueJR focus:ring-4 focus:ring-gray-500"></i>
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm text-gray-900" role="none">
                    Admin Edu
                  </p>
                  <p class="text-sm font-medium text-gray-900 truncate" role="none">
                    admin@edukasilalulintas.com
                  </p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</nav>