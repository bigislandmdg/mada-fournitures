@php
    // Charger les catégories actives une seule fois pour tout le header
    $categoriesMenu = \App\Models\Categorie::actif()->ordonne()->get();
@endphp

<header x-data="{ scrolled: false, mobileOpen: false, fournituresOpen: false }"
        @scroll.window="scrolled = window.scrollY > 10"
        :class="scrolled
            ? 'bg-white/95 backdrop-blur-lg shadow-md border-b border-gray-100'
            : 'bg-white border-b border-transparent'"
        class="sticky top-0 z-50 transition-all duration-300">

    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-18 relative">

            {{-- ============ LOGO (GAUCHE) ============ --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group flex-shrink-0">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-500 to-brand-700 rounded-xl rotate-6 group-hover:rotate-12 transition-transform duration-500 opacity-60 blur-sm"></div>
                    <div class="relative bg-gradient-to-br from-brand-600 to-brand-800 text-white font-bold rounded-xl w-10 h-10 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                        MF
                    </div>
                </div>
                <div class="hidden sm:block">
                    <div class="font-bold text-lg text-gray-900 leading-tight">Mada Fournitures</div>
                    <div class="text-[10px] text-gray-500 uppercase tracking-wider">Solutions professionnelles</div>
                </div>
            </a>

            {{-- ============ MENU CENTRÉ (DESKTOP) ============ --}}
            <div class="hidden md:flex items-center space-x-1 absolute left-1/2 -translate-x-1/2">

                {{-- Accueil --}}
                <a href="{{ route('home') }}"
                   class="relative px-3 py-2 text-sm font-medium rounded-lg transition-all duration-300 group whitespace-nowrap
                          {{ request()->routeIs('home') ? 'text-brand-600' : 'text-gray-700 hover:text-brand-600' }}">
                    Accueil
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-gradient-to-r from-brand-500 to-brand-700 rounded-full transition-all duration-300
                                 {{ request()->routeIs('home') ? 'w-6' : 'w-0 group-hover:w-6' }}"></span>
                </a>

                {{-- ============ NOS FOURNITURES (DROPDOWN) ============ --}}
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    @php
                        $isFournitures = request()->routeIs('fournitures.*') || request()->routeIs('produit.*');
                    @endphp

                    <button type="button"
                            @click="open = !open"
                            class="relative px-3 py-2 text-sm font-medium rounded-lg transition-all duration-300 group whitespace-nowrap flex items-center gap-1
                                   {{ $isFournitures ? 'text-brand-600' : 'text-gray-700 hover:text-brand-600' }}">
                        Nos fournitures
                        <svg class="w-3.5 h-3.5 transition-transform duration-300" :class="open ? 'rotate-180' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-gradient-to-r from-brand-500 to-brand-700 rounded-full transition-all duration-300
                                     {{ $isFournitures ? 'w-6' : 'w-0 group-hover:w-6' }}"></span>
                    </button>

                    {{-- Menu déroulant --}}
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2"
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-72 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">

                        {{-- Lien "Toutes les fournitures" --}}
                        <a href="{{ route('fournitures.index') }}"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-brand-50 hover:text-brand-700 transition-colors font-semibold border-b border-gray-100">
                            <div class="w-8 h-8 bg-brand-100 text-brand-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </div>
                            <div>
                                <div>Toutes les fournitures</div>
                                <div class="text-xs text-gray-500 font-normal">{{ $categoriesMenu->sum(fn($c) => $c->produits()->count()) }} produits</div>
                            </div>
                        </a>

                        {{-- Liste des catégories --}}
                        @forelse($categoriesMenu as $cat)
                            <a href="{{ route('fournitures.categorie', $cat->slug) }}"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-brand-50 hover:text-brand-700 transition-colors group">
                                <div class="w-8 h-8 bg-gray-100 group-hover:bg-brand-100 text-gray-500 group-hover:text-brand-600 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="truncate">{{ $cat->nom }}</div>
                                    @if($cat->description)
                                        <div class="text-xs text-gray-500 truncate">{{ Str::limit($cat->description, 50) }}</div>
                                    @endif
                                </div>
                                <span class="text-xs text-gray-400 group-hover:text-brand-600 font-semibold flex-shrink-0 transition-colors">
                                    {{ $cat->produits()->count() }}
                                </span>
                            </a>
                        @empty
                            <div class="px-4 py-3 text-sm text-gray-500 text-center">
                                Aucune catégorie disponible
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Marchés publics --}}
                <a href="{{ route('marches') }}"
                   class="relative px-3 py-2 text-sm font-medium rounded-lg transition-all duration-300 group whitespace-nowrap
                          {{ request()->routeIs('marches') ? 'text-brand-600' : 'text-gray-700 hover:text-brand-600' }}">
                    Marchés publics
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-gradient-to-r from-brand-500 to-brand-700 rounded-full transition-all duration-300
                                 {{ request()->routeIs('marches') ? 'w-6' : 'w-0 group-hover:w-6' }}"></span>
                </a>

                {{-- À propos --}}
                <a href="{{ route('a-propos') }}"
                   class="relative px-3 py-2 text-sm font-medium rounded-lg transition-all duration-300 group whitespace-nowrap
                          {{ request()->routeIs('a-propos') ? 'text-brand-600' : 'text-gray-700 hover:text-brand-600' }}">
                    À propos
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-gradient-to-r from-brand-500 to-brand-700 rounded-full transition-all duration-300
                                 {{ request()->routeIs('a-propos') ? 'w-6' : 'w-0 group-hover:w-6' }}"></span>
                </a>

                {{-- Contact --}}
                <a href="{{ route('contact') }}"
                   class="relative px-3 py-2 text-sm font-medium rounded-lg transition-all duration-300 group whitespace-nowrap
                          {{ request()->routeIs('contact') ? 'text-brand-600' : 'text-gray-700 hover:text-brand-600' }}">
                    Contact
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-gradient-to-r from-brand-500 to-brand-700 rounded-full transition-all duration-300
                                 {{ request()->routeIs('contact') ? 'w-6' : 'w-0 group-hover:w-6' }}"></span>
                </a>
            </div>

            {{-- ============ CTA DEVIS (DROITE) ============ --}}
            <div class="hidden md:flex items-center flex-shrink-0">
                <a href="{{ route('devis') }}"
                   class="group relative overflow-hidden bg-gradient-to-r from-brand-600 to-brand-700 text-white px-5 py-2.5 rounded-xl hover:shadow-lg hover:shadow-brand-500/30 hover:-translate-y-0.5 transition-all duration-300 text-sm font-semibold flex items-center gap-2">
                    <span class="absolute inset-0 bg-gradient-to-r from-brand-700 to-brand-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    <span class="relative flex items-center gap-2">
                        Demander un devis
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>
            </div>

            {{-- ============ BURGER MOBILE ============ --}}
            <button @click="mobileOpen = !mobileOpen"
                    class="md:hidden relative w-10 h-10 flex items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 transition-colors">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" x-transition class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- ============ MENU MOBILE ============ --}}
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden py-4 space-y-1 border-t border-gray-100">

            {{-- Accueil --}}
            <a href="{{ route('home') }}"
               class="block px-4 py-2.5 text-gray-700 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors font-medium">
                Accueil
            </a>

            {{-- Nos fournitures (accordéon mobile) --}}
            <div x-data="{ subOpen: false }">
                <button @click="subOpen = !subOpen"
                        class="w-full flex items-center justify-between px-4 py-2.5 text-gray-700 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors font-medium">
                    <span>Nos fournitures</span>
                    <svg class="w-4 h-4 transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="subOpen"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="pl-4 mt-1 space-y-1 border-l-2 border-brand-100 ml-4">

                    <a href="{{ route('fournitures.index') }}"
                       class="block px-4 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors font-semibold">
                        Toutes les fournitures
                    </a>

                    @foreach($categoriesMenu as $cat)
                        <a href="{{ route('fournitures.categorie', $cat->slug) }}"
                           class="block px-4 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">
                            {{ $cat->nom }}
                            <span class="text-xs text-gray-400 ml-1">({{ $cat->produits()->count() }})</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Marchés publics --}}
            <a href="{{ route('marches') }}"
               class="block px-4 py-2.5 text-gray-700 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors font-medium">
                Marchés publics
            </a>

            {{-- À propos --}}
            <a href="{{ route('a-propos') }}"
               class="block px-4 py-2.5 text-gray-700 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors font-medium">
                À propos
            </a>

            {{-- Contact --}}
            <a href="{{ route('contact') }}"
               class="block px-4 py-2.5 text-gray-700 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors font-medium">
                Contact
            </a>

            {{-- CTA Devis --}}
            <a href="{{ route('devis') }}"
               class="block mx-4 mt-2 text-center bg-gradient-to-r from-brand-600 to-brand-700 text-white px-4 py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                Demander un devis
            </a>
        </div>
    </nav>
</header>