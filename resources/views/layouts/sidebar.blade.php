<div id="hs-application-sidebar"
     class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform fixed top-0 start-0 bottom-0 z-[60] w-64 bg-neutral-900 border-e border-neutral-800 pt-7 pb-10 overflow-y-auto lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-neutral-800 [&::-webkit-scrollbar-thumb]:bg-neutral-600">
    <!-- Logo Section -->
    <div class="px-6 mb-6">
        <a class="flex items-center gap-x-3 text-xl font-semibold text-white" href="/">
            <svg class="w-8 h-8 text-yellow-400" viewBox="0 0 24 24" fill="none">
                <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
            <span>PVS</span>
        </a>
      </div>

    <!-- Navigation -->
    <nav class="px-4">
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-x-3.5 py-2.5 px-3 text-sm text-gray-300 rounded-lg hover:bg-neutral-800 hover:text-white transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-neutral-800 text-white' : '' }}">
                    <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                </svg>
                    <span>Tableau de bord</span>
              </a>
            </li>

            <!-- Users Section -->
            <li>
                <div class="hs-accordion" id="users-accordion">
                    <button type="button"
                            class="hs-accordion-toggle w-full flex items-center gap-x-3.5 py-2.5 px-3 text-sm text-gray-300 rounded-lg hover:bg-neutral-800 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                  <circle cx="9" cy="7" r="4"/>
                  <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                        <span>Utilisateurs</span>
                        <svg class="ms-auto w-4 h-4 transition-transform duration-200 hs-accordion-active:rotate-180"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"/>
                </svg>
              </button>

                    <div id="users-accordion-child" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                        <ul class="pt-2 ps-2">
                  <li>
                                <a href="{{ route('admin') }}"
                                   class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-neutral-800 hover:text-white transition-all duration-200 {{ request()->routeIs('admin') ? 'bg-neutral-800 text-white' : '' }}">
                                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                     Administrateurs
                    </a>
                  </li>
                  <li>
                                <a href="{{ route('users') }}"
                                   class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-neutral-800 hover:text-white transition-all duration-200 {{ request()->routeIs('users') ? 'bg-neutral-800 text-white' : '' }}">
                                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                      Utilisateurs
                    </a>
                  </li>
                </ul>
                    </div>
              </div>
            </li>

            <!-- Sessions -->
            <li>
                <a href="{{ route('session') }}"
                   class="flex items-center gap-x-3.5 py-2.5 px-3 text-sm text-gray-300 rounded-lg hover:bg-neutral-800 hover:text-white transition-all duration-200 {{ request()->routeIs('session') ? 'bg-neutral-800 text-white' : '' }}">
                    <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <rect width="18" height="18" x="3" y="4" rx="2"/>
                  <line x1="16" x2="16" y1="2" y2="6"/>
                  <line x1="8" x2="8" y1="2" y2="6"/>
                  <line x1="3" x2="21" y1="10" y2="10"/>
                </svg>
                    <span>Sessions</span>
                </a>
            </li>

            <!-- Documentation -->
            <li>
                <a href="#"
                   class="flex items-center gap-x-3.5 py-2.5 px-3 text-sm text-gray-300 rounded-lg hover:bg-neutral-800 hover:text-white transition-all duration-200">
                    <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                  <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
                    <span>Documentation</span>
                </a>
            </li>
          </ul>
        </nav>
  </div>
