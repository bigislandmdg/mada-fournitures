<div>
    {{-- En-tête --}}
    <section class="bg-gradient-to-br from-brand-700 to-brand-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="text-sm text-blue-200 mb-3">
                <a href="{{ route('home') }}" class="hover:text-white">Accueil</a>
                <span class="mx-2">/</span>
                <a href="{{ route('fournitures.index') }}" class="hover:text-white">Nos fournitures</a>
                @if($categorie)
                    <span class="mx-2">/</span>
                    <span class="text-white">{{ $categorie->nom }}</span>
                @endif
            </nav>
            <h1 class="text-3xl md:text-4xl font-bold">
                {{ $categorie->nom ?? 'Toutes nos fournitures' }}
            </h1>
            @if($categorie)
                <p class="text-blue-100 mt-2">{{ $categorie->description }}</p>
            @endif
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            {{-- Sidebar --}}
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 sticky top-24 space-y-6">

                    {{-- Catégories --}}
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-gray-900">Catégories</h3>
                            <span class="text-xs bg-brand-50 text-brand-700 px-2 py-0.5 rounded-full font-semibold">
                                {{ $categories->count() }}
                            </span>
                        </div>

                        {{-- Recherche catégorie --}}
                        <div class="relative mb-3">
                            <svg class="w-4 h-4 absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text"
                                   id="cat-search-input"
                                   placeholder="Filtrer les catégories..."
                                   class="w-full pl-8 pr-8 py-2 text-sm rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition">
                            <button type="button"
                                    id="cat-search-clear"
                                    class="hidden absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Liste catégories --}}
                        <ul class="space-y-1" id="cat-list">
                            <li data-cat-name="toutes les categories">
                                <a href="{{ route('fournitures.index') }}"
                                   class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition
                                          {{ !$categorie ? 'bg-brand-50 text-brand-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                                    <span>Toutes les catégories</span>
                                    <span class="text-xs text-gray-400">
                                        {{ $categories->sum('produits_count') }}
                                    </span>
                                </a>
                            </li>

                            @foreach($categories as $cat)
                                @php $isActive = $categorie && $categorie->id === $cat->id; @endphp
                                <li data-cat-name="{{ strtolower($cat->nom) }}">
                                    <a href="{{ route('fournitures.categorie', $cat->slug) }}"
                                       class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition
                                              {{ $isActive ? 'bg-brand-50 text-brand-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                                        <span class="truncate">{{ $cat->nom }}</span>
                                        <span class="text-xs {{ $isActive ? 'text-brand-600' : 'text-gray-400' }} flex-shrink-0 ml-2">
                                            {{ $cat->produits_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <p id="cat-no-result" class="hidden text-sm text-gray-500 text-center py-4">
                            Aucune catégorie trouvée
                        </p>
                    </div>

                    {{-- Filtre Prix --}}
                    <div class="pt-5 border-t border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-900 mb-2">Prix (Ar)</h4>
                        <div class="flex gap-2 items-center mb-2">
                            <input type="number"
                                   wire:model="prixMin"
                                   placeholder="Min"
                                   min="0"
                                   class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-100">
                            <span class="text-gray-400 text-xs">—</span>
                            <input type="number"
                                   wire:model="prixMax"
                                   placeholder="Max"
                                   min="0"
                                   class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-100">
                        </div>
                        <button type="button"
                                wire:click="appliquerPrix"
                                class="w-full text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 py-1.5 rounded-lg transition">
                            Appliquer
                        </button>
                        @error('prixMin') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        @error('prixMax') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Filtre Disponibilité --}}
                    <div class="pt-5 border-t border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-900 mb-2">Disponibilité</h4>
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox"
                                   wire:model.live="enStock"
                                   class="w-4 h-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                            En stock uniquement
                        </label>
                    </div>

                    {{-- Filtre Unité --}}
                    @if($unitesDisponibles->count() > 0)
                        <div class="pt-5 border-t border-gray-200">
                            <h4 class="text-sm font-semibold text-gray-900 mb-2">Unité de vente</h4>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                    <input type="radio"
                                           wire:model.live="unite"
                                           value=""
                                           class="w-4 h-4 border-gray-300 text-brand-600 focus:ring-brand-500">
                                    Toutes les unités
                                </label>
                                @foreach($unitesDisponibles as $u)
                                    <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                        <input type="radio"
                                               wire:model.live="unite"
                                               value="{{ $u }}"
                                               class="w-4 h-4 border-gray-300 text-brand-600 focus:ring-brand-500">
                                        {{ ucfirst($u) }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Bouton Reset --}}
                    @if($recherche || $prixMin !== null || $prixMax !== null || $enStock || $unite)
                        <div class="pt-5 border-t border-gray-200">
                            <button type="button"
                                    wire:click="resetFiltres"
                                    class="w-full text-sm text-red-600 hover:text-red-700 hover:bg-red-50 py-1.5 rounded-lg transition font-medium">
                                Effacer tous les filtres
                            </button>
                        </div>
                    @endif
                </div>
            </aside>

            {{-- Contenu principal --}}
            <div class="lg:col-span-3">

                {{-- Recherche produit --}}
                <div class="mb-6 flex gap-3">
                    <div class="relative flex-1">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text"
                               wire:model.live.debounce.400ms="recherche"
                               placeholder="Rechercher un produit..."
                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition">
                    </div>
                    @if($recherche)
                        <button wire:click="resetFiltres"
                                class="px-4 py-3 text-sm text-gray-600 hover:text-red-500 rounded-xl border border-gray-200 hover:border-red-200 transition">
                            Effacer
                        </button>
                    @endif
                </div>

                {{-- Compteur --}}
                <p class="text-sm text-gray-500 mb-4">
                    {{ $produits->total() }} produit(s) trouvé(s)
                </p>

                {{-- Grille produits --}}
                @if($produits->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($produits as $produit)
                            <a href="{{ route('produit.show', $produit->slug) }}"
                               class="group bg-white rounded-xl shadow-sm hover:shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:-translate-y-1">
                                <div class="aspect-video bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center overflow-hidden">
                                    @if($produit->image)
                                        <img src="{{ asset('storage/' . $produit->image) }}"
                                             alt="{{ $produit->nom }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <span class="text-xs text-brand-600 font-semibold uppercase tracking-wider">
                                        {{ $produit->categorie->nom }}
                                    </span>
                                    <h3 class="font-semibold text-gray-900 mt-1 group-hover:text-brand-600 transition line-clamp-2">
                                        {{ $produit->nom }}
                                    </h3>
                                    @if($produit->prix_indicatif)
                                        <p class="text-brand-700 font-bold mt-2">
                                            {{ number_format($produit->prix_indicatif, 0, ',', ' ') }} Ar
                                            <span class="text-xs text-gray-500 font-normal">/ {{ $produit->unite }}</span>
                                        </p>
                                    @else
                                        <p class="text-sm text-gray-500 mt-2">Prix sur demande</p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $produits->links() }}
                    </div>
                @else
                    <div class="text-center py-16 bg-white rounded-xl border border-gray-100">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <p class="text-gray-500">Aucun produit ne correspond à votre recherche.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Script filtre catégories --}}
    <script>
        (function () {
            const input = document.getElementById('cat-search-input');
            const clearBtn = document.getElementById('cat-search-clear');
            const list = document.getElementById('cat-list');
            const noResult = document.getElementById('cat-no-result');

            if (!input || !list) return;

            function filterCategories() {
                const q = input.value.trim().toLowerCase();
                const items = list.querySelectorAll('li');
                let visible = 0;

                items.forEach(function (item) {
                    const name = item.getAttribute('data-cat-name') || '';
                    const matches = q === '' || name.includes(q);
                    item.style.display = matches ? '' : 'none';
                    if (matches) visible++;
                });

                if (clearBtn) {
                    clearBtn.classList.toggle('hidden', q === '');
                }

                if (noResult) {
                    noResult.classList.toggle('hidden', visible > 0);
                }
            }

            input.addEventListener('input', filterCategories);
            clearBtn.addEventListener('click', function () {
                input.value = '';
                filterCategories();
                input.focus();
            });
        })();
    </script>
</div>