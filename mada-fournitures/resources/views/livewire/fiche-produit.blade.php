<div>
    {{-- Fil d'Ariane --}}
    <div class="bg-gray-100 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-brand-600">Accueil</a>
            <span class="mx-2">/</span>
            <a href="{{ route('fournitures.index') }}" class="hover:text-brand-600">Nos fournitures</a>
            <span class="mx-2">/</span>
            <a href="{{ route('fournitures.categorie', $produit->categorie->slug) }}" class="hover:text-brand-600">
                {{ $produit->categorie->nom }}
            </a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $produit->nom }}</span>
        </div>
    </div>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-6">
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            {{-- Image --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden aspect-square flex items-center justify-center">
                @if($produit->image)
                    <img src="{{ asset('storage/' . $produit->image) }}"
                         alt="{{ $produit->nom }}"
                         class="w-full h-full object-cover">
                @else
                    <svg class="w-32 h-32 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                @endif
            </div>

            {{-- Infos --}}
            <div>
                <span class="text-sm text-brand-600 font-semibold uppercase tracking-wider">
                    {{ $produit->categorie->nom }}
                </span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">
                    {{ $produit->nom }}
                </h1>

                @if($produit->prix_indicatif)
                    <p class="text-3xl font-extrabold text-brand-700 mb-6">
                        {{ number_format($produit->prix_indicatif, 0, ',', ' ') }} Ar
                        <span class="text-base text-gray-500 font-medium">/ {{ $produit->unite }}</span>
                    </p>
                @else
                    <p class="text-xl text-gray-600 mb-6">Prix sur demande</p>
                @endif

                @if($produit->description)
                    <div class="prose prose-sm text-gray-700 mb-8">
                        <p>{{ $produit->description }}</p>
                    </div>
                @endif

                {{-- Sélecteur quantité --}}
                <div class="flex items-center gap-4 mb-6">
                    <label class="text-sm font-medium text-gray-700">Quantité :</label>
                    <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
                        <button wire:click="$set('quantite', {{ max(1, $quantite - 1) }})"
                                class="px-4 py-2 hover:bg-gray-100 transition">−</button>
                        <input type="number"
                               wire:model.live="quantite"
                               min="1"
                               class="w-16 text-center border-0 focus:ring-0">
                        <button wire:click="$set('quantite', {{ $quantite + 1 }})"
                                class="px-4 py-2 hover:bg-gray-100 transition">+</button>
                    </div>
                </div>

                {{-- Bouton ajouter --}}
                <button wire:click="ajouterAuDevis"
                        class="w-full bg-gradient-to-r from-brand-600 to-brand-700 text-white py-4 rounded-xl font-bold hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Ajouter à ma demande de devis
                </button>

                <a href="{{ route('devis') }}"
                   class="block text-center text-brand-600 mt-4 hover:underline text-sm">
                    Voir ma demande de devis →
                </a>
            </div>
        </div>

        {{-- Produits similaires --}}
        @if($similaires->count())
            <div class="mt-20">
                <h2 class="text-2xl font-bold mb-8">Produits similaires</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($similaires as $similaire)
                        <a href="{{ route('produit.show', $similaire->slug) }}"
                           class="group bg-white rounded-xl shadow-sm hover:shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:-translate-y-1 p-4">
                            <div class="aspect-video bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-sm text-gray-900 group-hover:text-brand-600 line-clamp-2">
                                {{ $similaire->nom }}
                            </h3>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>