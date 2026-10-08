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

            {{-- Sidebar catégories --}}
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 sticky top-24">
                    <h3 class="font-bold text-gray-900 mb-4">Catégories</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('fournitures.index') }}"
                               class="block px-3 py-2 rounded-lg text-sm transition
                                      {{ !$categorie ? 'bg-brand-50 text-brand-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                                Toutes les catégories
                            </a>
                        </li>
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('fournitures.categorie', $cat->slug) }}"
                                   class="block px-3 py-2 rounded-lg text-sm transition
                                          {{ $categorie && $categorie->id === $cat->id ? 'bg-brand-50 text-brand-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                                    {{ $cat->nom }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            {{-- Contenu principal --}}
            <div class="lg:col-span-3">
                {{-- Barre de recherche --}}
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
</div>