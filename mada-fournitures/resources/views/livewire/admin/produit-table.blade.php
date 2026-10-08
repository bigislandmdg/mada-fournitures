<div>
    {{-- ============ HEADER ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-5">
        <div class="relative w-full sm:w-80">
            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text"
                   wire:model.live.debounce.400ms="recherche"
                   placeholder="Rechercher un produit..."
                   class="w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100 text-sm">
        </div>

        <button wire:click="ouvrirModal"
                class="bg-gradient-to-r from-brand-600 to-brand-700 text-white px-5 py-2.5 rounded-lg font-semibold hover:shadow-lg transition-all text-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nouveau produit
        </button>
    </div>

    {{-- ============ MESSAGE DE SUCCÈS ============ --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-4 text-sm flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- ============ TABLE ============ --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr class="text-left text-gray-600">
                        <th class="px-4 py-3 font-semibold">Produit</th>
                        <th class="px-4 py-3 font-semibold">Catégorie</th>
                        <th class="px-4 py-3 font-semibold">Prix</th>
                        <th class="px-4 py-3 font-semibold">Stock</th>
                        <th class="px-4 py-3 font-semibold">Statut</th>
                        <th class="px-4 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($produits as $produit)
                        <tr class="hover:bg-gray-50 transition" wire:key="produit-{{ $produit->id }}">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                                        @if($produit->image)
                                            <img src="{{ asset('storage/' . $produit->image) }}"
                                                 alt="{{ $produit->nom }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <div class="font-medium text-gray-900 truncate">{{ $produit->nom }}</div>
                                        <div class="text-xs text-gray-500">{{ $produit->unite }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $produit->categorie->nom }}</td>
                            <td class="px-4 py-3 text-gray-600">
                                @if($produit->prix_indicatif)
                                    {{ number_format($produit->prix_indicatif, 0, ',', ' ') }} Ar
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $produit->stock }}</td>
                            <td class="px-4 py-3">
                                <button wire:click="toggleActif({{ $produit->id }})"
                                        class="text-xs px-2.5 py-1 rounded-full font-semibold transition
                                               {{ $produit->actif ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                    {{ $produit->actif ? 'Actif' : 'Inactif' }}
                                </button>
                            </td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button wire:click="ouvrirModal({{ $produit->id }})"
                                        class="text-brand-600 hover:text-brand-800 p-1.5 rounded-lg hover:bg-brand-50 transition"
                                        title="Modifier">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>

                                {{-- ⬇⬇⬇ BOUTON SUPPRIMER MODIFIÉ ⬇⬇⬇ --}}
                                <button wire:click="confirmerSuppression({{ $produit->id }})"
                                        class="text-red-500 hover:text-red-700 p-1.5 rounded-lg hover:bg-red-50 transition ml-1"
                                        title="Supprimer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-12 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                Aucun produit trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ============ PAGINATION ============ --}}
    <div class="mt-4">
        {{ $produits->links() }}
    </div>

    {{-- ============ MODAL CRÉATION/ÉDITION ============ --}}
    @include('livewire.admin.partials.produit-modal')

    {{-- ============ MODAL CONFIRMATION SUPPRESSION (NOUVEAU) ============ --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4"
             wire:click.self="annulerSuppression">

            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md"
                 wire:click.stop>

                {{-- Icône d'avertissement --}}
                <div class="p-6 text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        Confirmer la suppression
                    </h3>
                    <p class="text-sm text-gray-600">
                        Voulez-vous vraiment supprimer le produit
                        <strong class="text-gray-900">{{ $deleteTargetName }}</strong> ?
                    </p>
                    <p class="text-xs text-red-600 mt-2">
                        Cette action est irréversible.
                    </p>
                </div>

                {{-- Boutons --}}
                <div class="flex gap-2 p-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
                    <button wire:click="annulerSuppression"
                            class="flex-1 px-4 py-2.5 rounded-lg text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 transition font-medium">
                        Annuler
                    </button>
                    <button wire:click="supprimer"
                            wire:loading.attr="disabled"
                            wire:target="supprimer"
                            class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-lg font-semibold transition-all disabled:opacity-60 flex items-center justify-center gap-2">
                        <span wire:loading.remove wire:target="supprimer">
                            Supprimer
                        </span>
                        <span wire:loading wire:target="supprimer" class="flex items-center gap-2">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                            Suppression...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>