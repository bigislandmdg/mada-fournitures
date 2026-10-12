
@php
    // Charger les catégories actives pour le header
    $categoriesMenu = \App\Models\Categorie::actif()->ordonne()->get();
@endphp

<header
    x-data="{ scrolled: false, mobileOpen: false, fournituresOpen: false }"
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

                {{-- NOS FOURNITURES --}}
                <div class="relative"
                     x-data="{ open: false }"
                     @mouseenter="open = true"
                     @mouseleave="open = false"
                     @keydown.escape.window="open = false">

                    @php
                        $isFournitures = request()->routeIs('fournitures.*')
                            || request()->routeIs('produit.*');
                    @endphp

                    <button
                        type="button"
                        @click="open = !open"
                        :aria-expanded="open.toString()"
                        aria-haspopup="true"
                        class="relative px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200 whitespace-nowrap flex items-center gap-1
                            {{ $isFournitures ? 'text-brand-700 bg-brand-50' : 'text-gray-700 hover:text-brand-700 hover:bg-gray-50' }}"
                    >
                        Nos fournitures

                        <svg class="w-4 h-4 transition-transform duration-200"
                             :class="open ? 'rotate-180' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>

                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-brand-600 rounded-full transition-all duration-200
                            {{ $isFournitures ? 'w-6' : 'w-0' }}"></span>
                    </button>

                    {{-- DROPDOWN --}}
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        @keydown.escape.window="open = false"
                        class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-80 max-w-[90vw] bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50 max-h-[70vh] overflow-y-auto"
                        style="display: none;"
                    >
                        {{-- Toutes les fournitures --}}
                        <a href="{{ route('fournitures.index') }}"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-800 hover:bg-brand-50 hover:text-brand-700 transition-colors font-semibold border-b border-gray-100">

                            <div class="w-9 h-9 bg-brand-50 text-brand-700 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </div>

                            <div>
                                <div>Toutes les fournitures</div>
                                <div class="text-xs text-gray-500 font-normal mt-0.5">
                                    {{ $categoriesMenu->sum(fn($c) => $c->produits()->count()) }} produits
                                </div>
                            </div>
                        </a>

                        {{-- Catégories dynamiques --}}
                        @forelse($categoriesMenu as $cat)
                            <a href="{{ route('fournitures.categorie', $cat->slug) }}"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-brand-50 hover:text-brand-700 transition-colors group">

                                <div class="w-9 h-9 bg-gray-50 group-hover:bg-brand-100 text-gray-500 group-hover:text-brand-700 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <div class="truncate font-medium">{{ $cat->nom }}</div>

                                    @if($cat->description)
                                        <div class="text-xs text-gray-500 truncate mt-0.5">
                                            {{ \Illuminate\Support\Str::limit($cat->description, 50) }}
                                        </div>
                                    @endif
                                </div>

                                <span class="text-xs text-gray-400 group-hover:text-brand-700 font-semibold flex-shrink-0 transition-colors">
                                    {{ $cat->produits()->count() }}
                                </span>
                            </a>
                        @empty
                            <div class="px-4 py-4 text-sm text-gray-500 text-center">
                                Aucune catégorie disponible
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Marchés publics --}}
                <a href="{{ route('marches') }}"
                   @class([
                       'relative px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200 whitespace-nowrap',
                       'text-brand-700 bg-brand-50' => request()->routeIs('marches'),
                       'text-gray-700 hover:text-brand-700 hover:bg-gray-50' => !request()->routeIs('marches'),
                   ])>
                    Marchés publics
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

            {{-- Nos fournitures --}}
            <div x-data="{ subOpen: false }">
                <button
                    type="button"
                    @click="subOpen = !subOpen"
                    :aria-expanded="subOpen.toString()"
                    class="w-full flex items-center justify-between px-4 py-2.5 text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-lg transition-colors font-medium"
                >
                    <span>Nos fournitures</span>

                    <svg class="w-4 h-4 transition-transform duration-200"
                         :class="subOpen ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div
                    x-show="subOpen"
                    x-transition
                    class="pl-4 mt-1 space-y-1 border-l-2 border-brand-100 ml-4"
                    style="display: none;"
                >
                    <a href="{{ route('fournitures.index') }}"
                       @click="mobileOpen = false"
                       class="block px-4 py-2 text-sm text-gray-600 hover:text-brand-700 hover:bg-brand-50 rounded-lg transition-colors font-semibold">
                        Toutes les fournitures
                    </a>

                    @foreach($categoriesMenu as $cat)
                        <a href="{{ route('fournitures.categorie', $cat->slug) }}"
                           @click="mobileOpen = false"
                           class="flex items-center justify-between gap-2 px-4 py-2 text-sm text-gray-600 hover:text-brand-700 hover:bg-brand-50 rounded-lg transition-colors">
                            <span>{{ $cat->nom }}</span>
                            <span class="text-xs text-gray-400">
                                ({{ $cat->produits()->count() }})
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Marchés publics --}}
            <a href="{{ route('marches') }}"
               @click="mobileOpen = false"
               @class([
                   'block px-4 py-2.5 rounded-lg transition-colors font-medium',
                   'bg-brand-50 text-brand-700' => request()->routeIs('marches'),
                   'text-gray-700 hover:bg-brand-50 hover:text-brand-700' => !request()->routeIs('marches'),
               ])>
                Marchés publics
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
