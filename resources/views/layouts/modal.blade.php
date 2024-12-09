<div id="hs-focus-management-modal"
     class="hs-overlay hidden fixed inset-0 z-[80] overflow-y-auto">
    <!-- Overlay backdrop -->
    <div class="hs-overlay-backdrop fixed inset-0 bg-neutral-900/60 transition-all duration-300"></div>

    <!-- Modal container -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Modal content -->
        <div class="relative bg-white w-full max-w-xl rounded-xl shadow-lg transition-all duration-300 opacity-0 hs-overlay-open:opacity-100 transform -translate-y-4 hs-overlay-open:translate-y-0 dark:bg-neutral-800 dark:border dark:border-neutral-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                @yield("title")

                <button type="button"
                        class="flex justify-center items-center size-8 rounded-full border border-transparent text-gray-400 hover:bg-gray-100 hover:text-gray-500 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                        data-hs-overlay="#hs-focus-management-modal">
                    <span class="sr-only">Fermer</span>
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="relative">
                @yield("form")
            </div>
        </div>
    </div>
</div>
