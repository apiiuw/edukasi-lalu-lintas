<header id="navbar" class="fixed top-0 left-0 w-full z-50 py-3 transition-all duration-300 bg-white">
  <nav class="relative max-w-7xl w-full flex flex-wrap lg:grid lg:grid-cols-12 basis-full items-center px-4 md:px-6 lg:px-8 mx-auto">
    <div class="lg:col-span-3 flex items-center">
      <a class="flex-none rounded-xl w-32 lg:w-48 text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80" href="../templates/creative-agency/index.html" aria-label="Preline">
        <img src="{{ asset('img/logo/logo-edulantas.png') }}" alt="logo edulantas">
      </a>
    </div>

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
          <a href="/login" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-blueJR hover:bg-blueDarkJR text-white">
              Sign In
          </a>
      @endif

      <div class="lg:hidden">
        <button type="button" class="hs-collapse-toggle size-9.5 flex justify-center items-center text-sm font-semibold rounded-xl text-black focus:outline-hidden" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" data-hs-collapse="#hs-navbar-hcail">
          <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>

    <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block lg:w-auto lg:basis-auto lg:order-2 lg:col-span-6">
      <div class="flex flex-col gap-y-4 gap-x-0 mt-5 lg:flex-row lg:justify-center lg:items-center lg:gap-y-0 lg:gap-x-7 lg:mt-0">
        <div class="flex justify-center">
          <a class="inline-block text-black focus:outline-hidden 
              {{ request()->is('/') ? 'relative before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-blueJR' : 'hover:text-gray-600' }}" 
              href="/" aria-current="page">
              Beranda
          </a>
        </div>
        <div class="flex justify-center">
            <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden 
                {{ (in_array(request()->path(), ['repositori', 'request-item']) || Str::startsWith(request()->path(), 'detail-item')) 
                    ? 'relative before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-blueJR' 
                    : '' }}" 
                href="/repositori">          
                Repositori
            </a>
        </div>
        <div class="flex justify-center">
            <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden 
                {{ request()->is('tentang-kami') ? 'relative before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-blueJR' : '' }}" 
                href="/tentang-kami">
                Tentang Kami
            </a>
        </div>
        <div class="flex justify-center">
            <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden 
                {{ in_array(request()->path(), ['forum-diskusi', 'form-forum-diskusi']) ? 'relative before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-blueJR' : '' }}" 
                href="/forum-diskusi">
                Forum Diskusi
            </a>
        </div>
        <div id="dropdownHubungiBtn" class="relative flex justify-center items-center cursor-pointer">
            <a class="inline-block text-black hover:text-gray-600 focus:outline-none" href="#">Hubungi Kami</a>
            <svg class="ml-1 w-4 h-4 text-black hover:text-blueJR" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>      

        <div id="dropdownHubungi" class="hidden absolute left-auto right-72 top-12 mt-1 w-48 bg-white border border-gray-200 shadow-lg rounded-lg py-2">
          <a href="https://maps.app.goo.gl/ppvfeNSHD9Cn2bpW9" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            <i class="fa-solid lg:fa-xl fa-building-columns mr-2"></i>
            <div class="flex flex-col">
              <p class="text-sm font-semibold">Alamat Kantor</p>
              <p class="text-sm">Jl. Jatinegara Timur No.123, RT.1/RW.2, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310.</p>
            </div>
          </a>
          <a href="tel:+622121012904" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            <i class="fa-solid lg:fa-xl fa-phone-volume mr-2"></i>
            <div class="flex flex-col">
              <p class="text-sm font-semibold">Nomor Telepon</p>
              <p class="text-sm">(021) 21012904</p>
            </div>
          </a>
        </div>

        <div id="mobileDropdownHubungi" class="hs-collapse mt-3 hidden absolute top-full left-0 w-full bg-white/60 backdrop-blur-sm text-center shadow-lg py-2 lg:hidden">
          <div class="relative z-10">
            <a href="tel:+622121012904" class="flex items-center justify-center px-4 py-2 text-black/100 hover:bg-gray-100">
              <i class="fa-solid lg:fa-xl fa-building-columns mr-2"></i>
              <div class="flex flex-col text-sm">
                <p class="font-semibold">Alamat Kantor</p>
                <p>Jl. Jatinegara Timur No.123, RT.1/RW.2, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310.</p>
              </div>
            </a>
            <a href="tel:+622121012904" class="flex items-center justify-center px-4 py-2 text-black hover:bg-gray-100">
              <i class="fa-solid lg:fa-xl fa-phone-volume mr-2"></i>
              <div class="flex flex-col text-sm">
                <p class="font-semibold">Nomor Telepon</p>
                <p>(021) 21012904</p>
              </div>
            </a>
          </div>
        </div>        
      </div>
    </div>
  </nav>
</header>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      const dropdownBtn = document.getElementById("dropdownHubungiBtn");
      const dropdownMenu = document.getElementById("dropdownHubungi");
      const mobileDropdownMenu = document.getElementById("mobileDropdownHubungi");

      dropdownBtn.addEventListener("click", function (event) {
          event.preventDefault();
          event.stopPropagation();

          if (window.innerWidth >= 1024) { 
              dropdownMenu.classList.toggle("hidden");
              mobileDropdownMenu.classList.add("hidden"); 
          } else { 
              mobileDropdownMenu.classList.toggle("hidden");
              dropdownMenu.classList.add("hidden"); 
          }
      });

      document.addEventListener("click", function (event) {
          if (!dropdownBtn.contains(event.target) &&
              !dropdownMenu.contains(event.target) &&
              !mobileDropdownMenu.contains(event.target)) {
              dropdownMenu.classList.add("hidden");
              mobileDropdownMenu.classList.add("hidden");
          }
      });
  });

  window.addEventListener("scroll", function() {
    const navbar = document.getElementById("navbar");
    const desktopDropdown = document.getElementById("dropdownHubungi"); 
    const mobileDropdown = document.getElementById("mobileDropdownHubungi"); 
    const dropdownMenu = document.getElementById("dropdownHubungi");
    const dropdownUser = document.getElementById("user-dropdown");

    if (window.scrollY > 50) {
      navbar.classList.add("bg-white/60", "backdrop-blur-sm");
      desktopDropdown.classList.add("bg-white/80", "backdrop-blur-sm");
      mobileDropdown.classList.add("bg-white/80", "backdrop-blur-sm");
      dropdownUser.classList.add("bg-white/80", "backdrop-blur-sm");
      navbar.classList.remove("bg-white");
      desktopDropdown.classList.remove("bg-white");
      mobileDropdown.classList.remove("bg-white");
      dropdownUser.classList.remove("bg-white");
    } else {
      navbar.classList.remove("bg-white/60", "backdrop-blur-sm");
      desktopDropdown.classList.remove("bg-white/80", "backdrop-blur-sm");
      mobileDropdown.classList.remove("bg-white/80", "backdrop-blur-sm");
      dropdownUser.classList.remove("bg-white/80", "backdrop-blur-sm");
      navbar.classList.add("bg-white");
      desktopDropdown.classList.add("bg-white");
      mobileDropdown.classList.add("bg-white");
      dropdownUser.classList.add("bg-white");
    }
  });

</script>