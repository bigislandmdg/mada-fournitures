<header
    x-data="{ scrolled: false, mobileOpen: false }"
    @scroll.window="scrolled = window.scrollY > 10"
    :class="scrolled
        ? 'bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100'
        : 'bg-white border-b border-transparent'"
    class="sticky top-0 z-50 transition-all duration-300"
>
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-[4.5rem] relative">

            {{-- LOGO --}}
            <a href="{{ route('home') }}"
               class="flex items-center gap-2.5 group flex-shrink-0"
               aria-label="Mada Fournitures - Accueil">

                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-500 to-brand-700 rounded-xl rotate-3 group-hover:rotate-6 transition-transform duration-300 opacity-40 blur-sm"></div>

                    <div class="relative bg-gradient-to-br from-brand-600 to-brand-800 text-white font-bold rounded-xl w-10 h-10 flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300">
                        MF
                    </div>
                </div>

                <div class="hidden sm:block">
                    <div class="font-bold text-lg text-gray-900 leading-tight tracking-tight">
                        Mada Fournitures
                    </div>
                    <div class="text-[10px] text-gray-500 uppercase tracking-wider mt-0.5">
                        Solutions professionnelles
                    </div>
                </div>
            </a>

            {{-- MENU DESKTOP --}}
            <div class="hidden md:flex items-center gap-1 absolute left-1/2 -translate-x-1/2">

                {{-- Accueil --}}
                <a href="{{ route('home') }}"
                   @class([
                       'relative px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200 whitespace-nowrap',
                       'text-brand-700 bg-brand-50' => request()->routeIs('home'),
                       'text-gray-700 hover:text-brand-700 hover:bg-gray-50' => !request()->routeIs('home'),
                   ])>
                    Accueil

                    <span @class([
                        'absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-brand-600 rounded-full transition-all duration-200',
                        'w-6' => request()->routeIs('home'),
                        'w-0' => !request()->routeIs('home'),
                    ])></span>
                </a>

                {{-- Nos expertises (remplace Marchés publics) --}}
                <a href="{{ route('marches') }}"
                   @class([
                       'relative px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200 whitespace-nowrap',
                       'text-brand-700 bg-brand-50' => request()->routeIs('marches'),
                       'text-gray-700 hover:text-brand-700 hover:bg-gray-50' => !request()->routeIs('marches'),
                   ])>
                    Nos expertises
                    <span @class([
                        'absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-brand-600 rounded-full transition-all duration-200',
                        'w-6' => request()->routeIs('marches'),
                        'w-0' => !request()->routeIs('marches'),
                    ])></span>
                </a>

                {{-- À propos --}}
                <a href="{{ route('a-propos') }}"
                   @class([
                       'relative px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200 whitespace-nowrap',
                       'text-brand-700 bg-brand-50' => request()->routeIs('a-propos'),
                       'text-gray-700 hover:text-brand-700 hover:bg-gray-50' => !request()->routeIs('a-propos'),
                   ])>
                    À propos
                    <span @class([
                        'absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-brand-600 rounded-full transition-all duration-200',
                        'w-6' => request()->routeIs('a-propos'),
                        'w-0' => !request()->routeIs('a-propos'),
                    ])></span>
                </a>

                {{-- Contact --}}
                <a href="{{ route('contact') }}"
                   @class([
                       'relative px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200 whitespace-nowrap',
                       'text-brand-700 bg-brand-50' => request()->routeIs('contact'),
                       'text-gray-700 hover:text-brand-700 hover:bg-gray-50' => !request()->routeIs('contact'),
                   ])>
                    Contact
                    <span @class([
                        'absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-brand-600 rounded-full transition-all duration-200',
                        'w-6' => request()->routeIs('contact'),
                        'w-0' => !request()->routeIs('contact'),
                    ])></span>
                </a>
            </div>

            {{-- CTA DESKTOP --}}
            <div class="hidden md:flex items-center flex-shrink-0">
                <a href="{{ route('devis') }}"
                   class="group relative overflow-hidden bg-gradient-to-r from-brand-600 to-brand-700 text-white px-4 lg:px-5 py-2.5 rounded-xl hover:shadow-md hover:-translate-y-px focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:ring-offset-2 transition-all duration-200 text-sm font-semibold flex items-center gap-2">

                    <span class="absolute inset-0 bg-brand-800 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></span>

                    <span class="relative flex items-center gap-2 whitespace-nowrap">
                        Demander un devis

                        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform duration-200"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>
            </div>

            {{-- BOUTON MOBILE --}}
            <button
                type="button"
                @click="mobileOpen = !mobileOpen"
                :aria-expanded="mobileOpen.toString()"
                aria-label="Ouvrir ou fermer le menu"
                class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl text-gray-700 hover:bg-gray-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 transition-colors"
            >
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

                <svg x-show="mobileOpen" x-transition class="w-6 h-6"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     aria-hidden="true" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="1.8" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- MENU MOBILE --}}
        <div
            x-show="mobileOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            @keydown.escape.window="mobileOpen = false"
            class="md:hidden border-t border-gray-100 py-4 space-y-1"
            style="display: none;"
        >
            {{-- Accueil --}}
            <a href="{{ route('home') }}"
               @click="mobileOpen = false"
               @class([
                   'block px-4 py-2.5 rounded-lg transition-colors font-medium',
                   'bg-brand-50 text-brand-700' => request()->routeIs('home'),
                   'text-gray-700 hover:bg-brand-50 hover:text-brand-700' => !request()->routeIs('home'),
               ])>
                Accueil
            </a>

            {{-- Nos expertises (remplace Marchés publics) --}}
            <a href="{{ route('marches') }}"
               @click="mobileOpen = false"
               @class([
                   'block px-4 py-2.5 rounded-lg transition-colors font-medium',
                   'bg-brand-50 text-brand-700' => request()->routeIs('marches'),
                   'text-gray-700 hover:bg-brand-50 hover:text-brand-700' => !request()->routeIs('marches'),
               ])>
                Nos expertises
            </a>

            {{-- À propos --}}
            <a href="{{ route('a-propos') }}"
               @click="mobileOpen = false"
               @class([
                   'block px-4 py-2.5 rounded-lg transition-colors font-medium',
                   'bg-brand-50 text-brand-700' => request()->routeIs('a-propos'),
                   'text-gray-700 hover:bg-brand-50 hover:text-brand-700' => !request()->routeIs('a-propos'),
               ])>
                À propos
            </a>

            {{-- Contact --}}
            <a href="{{ route('contact') }}"
               @click="mobileOpen = false"
               @class([
                   'block px-4 py-2.5 rounded-lg transition-colors font-medium',
                   'bg-brand-50 text-brand-700' => request()->routeIs('contact'),
                   'text-gray-700 hover:bg-brand-50 hover:text-brand-700' => !request()->routeIs('contact'),
               ])>
                Contact
            </a>

            {{-- CTA MOBILE --}}
            <a href="{{ route('devis') }}"
               @click="mobileOpen = false"
               class="flex items-center justify-center gap-2 mx-4 mt-3 text-center bg-gradient-to-r from-brand-600 to-brand-700 text-white px-4 py-3 rounded-xl font-semibold shadow-sm hover:shadow-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:ring-offset-2 transition-all duration-200">
                Demander un devis

                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </nav>
</header>
