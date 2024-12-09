<header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:ps-64 dark:bg-neutral-800 dark:border-neutral-700">
    <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6 md:px-8" aria-label="Global">
        <div class="me-5 lg:me-0 lg:hidden">
            <button type="button" class="flex items-center justify-center size-9 text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-application-sidebar" aria-controls="hs-application-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6"/>
                    <line x1="3" x2="21" y1="12" y2="12"/>
                    <line x1="3" x2="21" y1="18" y2="18"/>
                </svg>
            </button>
        </div>

        <div class="w-full flex items-center justify-end ms-auto sm:gap-x-3 sm:order-3">
            <!-- Notifications Dropdown -->
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <span class="sr-only">Notifications</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                    </svg>
                </button>
            </div>

            <!-- User Dropdown -->
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="inline-flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium text-gray-800 rounded-lg border border-gray-200 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-offcanvas="#hs-offcanvas-right">
                    <img class="size-8 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="User Avatar">
                    <span class="text-gray-600 font-medium truncate max-w-[7.5rem] dark:text-gray-400">{{ Auth::user()->name }}</span>
                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700" aria-labelledby="hs-dropdown-with-header">
                    <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-neutral-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Connecté en tant que</p>
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-300">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="mt-2 py-2 first:pt-0 last:pb-0">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-neutral-700 dark:hover:text-gray-300" href="#">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            Mon profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-neutral-700 dark:hover:text-gray-300">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" x2="9" y1="12" y2="12"/>
                                </svg>
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
