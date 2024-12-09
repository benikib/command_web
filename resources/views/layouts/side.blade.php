<div id="hs-application-sidebar"
     class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform fixed top-0 start-0 bottom-0 z-[60] w-64 bg-gradient-to-br from-gray-900 via-gray-950 to-black border-e border-gray-800/50 pt-7 pb-10 overflow-y-auto lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-900/50 [&::-webkit-scrollbar-thumb]:bg-gray-800">
    <!-- Logo Section -->
    <div class="px-6 mb-8">
        <a class="flex items-center gap-x-3 text-xl font-semibold text-white group" href="/">
            <div class="p-2 bg-gradient-to-br from-yellow-400/20 to-yellow-400/10 rounded-lg group-hover:from-yellow-400/30 group-hover:to-yellow-400/20 transition-all duration-200 shadow-lg shadow-yellow-400/10">
                <svg class="w-8 h-8 text-yellow-400" viewBox="0 0 24 24" fill="none">
                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <span class="tracking-wide bg-gradient-to-r from-yellow-200 to-yellow-400 text-transparent bg-clip-text">PVS</span>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="px-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-white/5 hover:text-white transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white shadow-lg' : '' }}">
            <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-yellow-400/20 to-yellow-400/5 rounded-lg group-hover:from-yellow-400/30 group-hover:to-yellow-400/10 transition-all duration-200">
                <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                </svg>
            </div>
            <span>Tableau de bord</span>
        </a>

        <!-- Programme -->
        <a href="{{ route('programme_surveillant', ['id' => Auth::id()]) }}"
           class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-white/5 hover:text-white transition-all duration-200 group {{ request()->routeIs('programme_surveillant') ? 'bg-white/10 text-white shadow-lg' : '' }}">
            <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-yellow-400/20 to-yellow-400/5 rounded-lg group-hover:from-yellow-400/30 group-hover:to-yellow-400/10 transition-all duration-200">
                <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <span>Programme</span>
        </a>

        <!-- Documentation -->
        <a href="#"
           class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-white/5 hover:text-white transition-all duration-200 group">
            <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-yellow-400/20 to-yellow-400/5 rounded-lg group-hover:from-yellow-400/30 group-hover:to-yellow-400/10 transition-all duration-200">
                <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
            </div>
            <span>Documentation</span>
        </a>
    </nav>

    <!-- Version -->
    <div class="absolute bottom-4 left-0 right-0 px-6">
        <div class="py-2 px-3 bg-white/5 rounded-lg">
            <p class="text-xs text-gray-400 text-center">Version 1.0.0</p>
        </div>
    </div>
</div>
