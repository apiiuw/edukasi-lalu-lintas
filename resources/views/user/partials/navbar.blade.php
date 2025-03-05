<!-- ========== HEADER ========== -->
<header id="navbar" class="fixed top-0 left-0 w-full z-50 py-3 transition-all duration-300 bg-white">
  <nav class="relative max-w-7xl w-full flex flex-wrap lg:grid lg:grid-cols-12 basis-full items-center px-4 md:px-6 lg:px-8 mx-auto">
    <div class="lg:col-span-3 flex items-center">
      <!-- Logo -->
      <a class="flex-none rounded-xl w-32 lg:w-48 text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80" href="../templates/creative-agency/index.html" aria-label="Preline">
        <img src="{{ asset('img/logo/logo-edulantas.png') }}" alt="logo edulantas">
      </a>
      <!-- End Logo -->

      <div class="ms-1 sm:ms-2">

      </div>
    </div>

    <!-- Button Group -->
    <div class="flex items-center gap-x-1 lg:gap-x-2 ms-auto py-1 lg:ps-6 lg:order-3 lg:col-span-3">
      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
        Sign in
      </button>
      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl border border-transparent bg-blueJR text-white focus:outline-hidden transition disabled:opacity-50 disabled:pointer-events-none">
        Login
      </button>

      <div class="lg:hidden">
        <button type="button" class="hs-collapse-toggle size-9.5 flex justify-center items-center text-sm font-semibold rounded-xl text-black focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
          <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <!-- End Button Group -->

    <!-- Collapse -->
    <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block lg:w-auto lg:basis-auto lg:order-2 lg:col-span-6" aria-labelledby="hs-navbar-hcail-collapse">
      <div class="flex flex-col gap-y-4 gap-x-0 mt-5 lg:flex-row lg:justify-center lg:items-center lg:gap-y-0 lg:gap-x-7 lg:mt-0">
        <div class="flex justify-center">
          <a class="relative inline-block text-black focus:outline-hidden before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-blueJR" href="#" aria-current="page">Beranda</a>
        </div>
        <div class="flex justify-center">
          <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Repositori</a>
        </div>
        <div class="flex justify-center">
          <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Tentang Kami</a>
        </div>
        <div class="flex justify-center">
          <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Forum Diskusi</a>
        </div>
        <div class="flex justify-center">
          <a class="inline-block text-black hover:text-gray-600 focus:outline-hidden focus:text-gray-600" href="#">Hubungi Kami</a>
        </div>
      </div>
    </div>
    <!-- End Collapse -->
  </nav>
</header>
<!-- ========== END HEADER ========== -->

<script>
  window.addEventListener("scroll", function() {
    const navbar = document.getElementById("navbar");

    if (window.scrollY > 50) {
      navbar.classList.add("bg-white/60", "backdrop-blur-sm");
      navbar.classList.remove("bg-white");
    } else {
      navbar.classList.remove("bg-white/60", "backdrop-blur-sm");
      navbar.classList.add("bg-white");
    }
  });
</script>