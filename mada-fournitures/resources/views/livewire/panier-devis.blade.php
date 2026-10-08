<div>
    <section class="bg-gradient-to-br from-brand-700 to-brand-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-bold">Demander un devis</h1>
            <p class="text-blue-100 mt-2">Remplissez le formulaire ci-dessous, nous vous répondons sous 24h ouvrées.</p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Confirmation --}}
        @if(session('success') && session('devis_reference'))
            <div class="bg-green-50 border border-green-200 rounded-2xl p-8 text-center mb-8">
                <div class="w-16 h-16 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-green-900 mb-2">Demande envoyée !</h2>
                <p class="text-green-700 mb-4">
                    Votre référence : <strong>{{ session('devis_reference') }}</strong>
                </p>
                <p class="text-sm text-green-700">Nous vous répondrons sous 24h ouvrées.</p>
            </div>
        @endif

        @if(empty($items))
            <div class="bg-white rounded-2xl border border-gray-100 p-12 text-center">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Votre panier est vide</h2>
                <p class="text-gray-500 mb-6">Ajoutez des produits depuis notre catalogue pour demander un devis.</p>
                <a href="{{ route('fournitures.index') }}"
                   class="inline-block bg-gradient-to-r from-brand-600 to-brand-700 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition">
                    Voir le catalogue
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Panier + Formulaire --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Panier --}}
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                        <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                            <h2 class="font-bold text-lg">Produits sélectionnés ({{ count($items) }})</h2>
                            <button wire:click="vider"
                                    wire:confirm="Vider tout le panier ?"
                                    class="text-sm text-red-500 hover:text-red-700">
                                Tout vider
                            </button>
                        </div>

                        <div class="divide-y divide-gray-100">
                            @foreach($produits as $produit)
                                <div class="p-5 flex items-center gap-4">
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex-shrink-0 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-semibold text-gray-900 truncate">{{ $produit->nom }}</p>
                                        <p class="text-sm text-gray-500">{{ $produit->categorie->nom }}</p>
                                    </div>
                                    <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                                        <button wire:click="changerQuantite({{ $produit->id }}, {{ $items[$produit->id] - 1 }})"
                                                class="px-3 py-1 hover:bg-gray-100">−</button>
                                        <span class="w-10 text-center text-sm">{{ $items[$produit->id] }}</span>
                                        <button wire:click="changerQuantite({{ $produit->id }}, {{ $items[$produit->id] + 1 }})"
                                                class="px-3 py-1 hover:bg-gray-100">+</button>
                                    </div>
                                    <button wire:click="supprimer({{ $produit->id }})"
                                            class="text-gray-400 hover:text-red-500 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Formulaire --}}
                    <div class="bg-white rounded-2xl border border-gray-100 p-6">
                        <h2 class="font-bold text-lg mb-4">Vos coordonnées</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
                                <input type="text" wire:model="nom_client"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                                @error('nom_client') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Société</label>
                                <input type="text" wire:model="societe"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" wire:model="email"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                                @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
                                <input type="tel" wire:model="telephone"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                                @error('telephone') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                                <input type="text" wire:model="adresse"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea wire:model="message" rows="4"
                                          class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100"></textarea>
                            </div>
                        </div>

                        @error('items') <p class="text-sm text-red-500 mt-3">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Récapitulatif --}}
                <aside class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 sticky top-24">
                        <h2 class="font-bold text-lg mb-4">Récapitulatif</h2>

                        <div class="space-y-2 text-sm mb-4">
                            <div class="flex justify-between text-gray-600">
                                <span>Produits</span>
                                <span>{{ count($items) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Total articles</span>
                                <span>{{ array_sum($items) }}</span>
                            </div>
                        </div>

                        @if($total > 0)
                            <div class="border-t border-gray-100 pt-4 mb-4">
                                <div class="flex justify-between items-baseline">
                                    <span class="font-semibold">Estimation</span>
                                    <span class="text-2xl font-bold text-brand-700">
                                        {{ number_format($total, 0, ',', ' ') }} Ar
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Estimation indicative, un devis officiel vous sera envoyé.</p>
                            </div>
                        @endif

                        <button wire:click="envoyer"
                                wire:loading.attr="disabled"
                                class="w-full bg-gradient-to-r from-brand-600 to-brand-700 text-white py-4 rounded-xl font-bold hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <span wire:loading.remove>Envoyer ma demande</span>
                            <span wire:loading>
                                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                </svg>
                            </span>
                        </button>

                        <a href="{{ route('fournitures.index') }}"
                           class="block text-center text-sm text-brand-600 mt-4 hover:underline">
                            + Ajouter d'autres produits
                        </a>
                    </div>
                </aside>
            </div>
        @endif
    </div>
</div>