<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-28 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <h1 class="text-base text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-14 after:h-[1.5px] after:bg-blueJR after:mx-auto after:mt-1">
                    DASHBOARD ADMIN
                </h1>
            </li>
            <li>
                <a href="/admin-statistik" class="flex items-center p-2 rounded-lg group {{ request()->is('admin-statistik') ? 'bg-gray-200 text-gray-900' : 'text-gray-900' }} hover:bg-gray-100">
                    <i class="fa-solid fa-chart-line fa-lg {{ request()->is('admin-statistik') ? 'text-gray-900' : 'text-gray-500 group-hover:text-gray-900' }}"></i>
                    <span class="ms-3">Statistik Pengunjung</span>
                </a>
            </li>
            <li>
                <a href="/admin-item" class="flex items-center p-2 rounded-lg group {{ in_array(request()->path(), ['admin-item', 'admin-add-books', 'admin-add-video']) ? 'bg-gray-200 text-gray-900' : 'text-gray-900' }} hover:bg-gray-100">
                    <svg class="shrink-0 w-5 h-5 {{ in_array(request()->path(), ['admin-item', 'admin-add-books', 'admin-add-video']) ? 'text-gray-900' : 'text-gray-500 group-hover:text-gray-900' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Item</span>
                </a>
            </li>
            <li>
                <a href="/admin-request-item" class="flex items-center p-2 rounded-lg group {{ request()->is('admin-request-item') ? 'bg-gray-200 text-gray-900' : 'text-gray-900' }} hover:bg-gray-100">
                    <svg class="shrink-0 w-5 h-5 {{ request()->is('admin-request-item') ? 'text-gray-900' : 'text-gray-500 group-hover:text-gray-900' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.418 3.623l-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Request Item</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blueJR bg-blue-100 rounded-full">
                        {{ $totalRequestDiproses }}
                    </span>                    
                </a>
            </li>
            <li>
                <a href="/admin-forum-diskusi" class="flex items-center p-2 rounded-lg group {{ request()->is('admin-forum-diskusi') ? 'bg-gray-200 text-gray-900' : 'text-gray-900' }} hover:bg-gray-100">
                    <svg class="shrink-0 w-5 h-5 {{ request()->is('admin-forum-diskusi') ? 'text-gray-900' : 'text-gray-500 group-hover:text-gray-900' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Forum Diskusi</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blueJR bg-blue-100 rounded-full">
                        {{ $jumlahDiproses ?? 0 }}
                    </span>
                </a>
            </li>
            <li>
                <a href="/" class="flex items-center p-2 rounded-lg group {{ request()->is('/') ? 'bg-gray-200 text-gray-900' : 'text-gray-900' }} hover:bg-gray-100">
                    <i class="fa-solid fa-house-chimney fa-lg {{ request()->is('/') ? 'text-gray-900' : 'text-gray-500 group-hover:text-gray-900' }}"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Tampilan Pengguna</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
