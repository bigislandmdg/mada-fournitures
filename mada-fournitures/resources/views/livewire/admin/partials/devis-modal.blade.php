@if($showModal && $devisSelectionne)
    <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
         wire:click.self="fermerModal">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto"
             wire:click.stop>

            {{-- ============ HEADER MODAL ============ --}}
            <div class="p-6 border-b border-gray-100 flex justify-between items-center sticky top-0 bg-white z-10 rounded-t-2xl">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h2 class="text-lg font-bold text-gray-900">
                            Devis <span class="font-mono">{{ $devisSelectionne->reference }}</span>
                        </h2>
                        <span class="text-xs px-2.5 py-1 rounded-full font-semibold
                                     {{ $devisSelectionne->statut === 'nouveau' ? 'bg-blue-100 text-blue-700' : '' }}
                                     {{ $devisSelectionne->statut === 'en_cours' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                     {{ $devisSelectionne->statut === 'traite' ? 'bg-green-100 text-green-700' : '' }}
                                     {{ $devisSelectionne->statut === 'refuse' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ str_replace('_', ' ', $devisSelectionne->statut) }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">
                        Créé le {{ $devisSelectionne->created_at->format('d/m/Y à H:i') }}
                    </p>
                </div>
                <button wire:click="fermerModal"
                        class="text-gray-400 hover:text-gray-700 p-1 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- ============ CONTENU ============ --}}
            <div class="p-6 space-y-6">

                {{-- Infos client --}}
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">Informations client</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                        <div>
                            <div class="text-xs text-gray-500 uppercase">Nom</div>
                            <div class="font-semibold text-gray-900">{{ $devisSelectionne->nom_client }}</div>
                        </div>
                        @if($devisSelectionne->societe)
                            <div>
                                <div class="text-xs text-gray-500 uppercase">Société</div>
                                <div class="text-gray-900">{{ $devisSelectionne->societe }}</div>
                            </div>
                        @endif
                        <div>
                            <div class="text-xs text-gray-500 uppercase">Email</div>
                            <a href="mailto:{{ $devisSelectionne->email }}" class="text-brand-600 hover:underline text-sm">
                                {{ $devisSelectionne->email }}
                            </a>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 uppercase">Téléphone</div>
                            <a href="tel:{{ $devisSelectionne->telephone }}" class="text-gray-900 text-sm">
                                {{ $devisSelectionne->telephone }}
                            </a>
                        </div>
                        @if($devisSelectionne->adresse)
                            <div class="sm:col-span-2">
                                <div class="text-xs text-gray-500 uppercase">Adresse</div>
                                <div class="text-sm text-gray-900">{{ $devisSelectionne->adresse }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Message --}}
                @if($devisSelectionne->message)
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">Message du client</h3>
                        <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 whitespace-pre-line">
                            {{ $devisSelectionne->message }}
                        </div>
                    </div>
                @endif

                {{-- Produits demandés --}}
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">
                        Produits demandés ({{ $devisSelectionne->items->count() }})
                    </h3>
                    <div class="bg-gray-50 rounded-lg divide-y divide-gray-200 overflow-hidden">
                        @forelse($devisSelectionne->items as $item)
                            <div class="p-3 flex justify-between items-center gap-3">
                                <div class="min-w-0 flex-1">
                                    <div class="font-medium text-sm text-gray-900 truncate">
                                        {{ $item->produit->nom ?? 'Produit supprimé' }}
                                    </div>
                                    @if($item->produit && $item->produit->categorie)
                                        <div class="text-xs text-gray-500">
                                            {{ $item->produit->categorie->nom }}
                                        </div>
                                    @endif
                                    @if($item->remarque)
                                        <div class="text-xs text-gray-500 italic mt-1">
                                            « {{ $item->remarque }} »
                                        </div>
                                    @endif
                                </div>
                                <div class="text-sm font-semibold text-gray-900 whitespace-nowrap">
                                    × {{ $item->quantite }}
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center text-gray-500 text-sm">
                                Aucun article dans ce devis.
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Changer le statut --}}
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">Changer le statut</h3>
                    <div class="flex flex-wrap gap-2">
                        <button wire:click="changerStatut({{ $devisSelectionne->id }}, 'nouveau')"
                                class="px-4 py-2 rounded-lg text-sm font-semibold transition
                                       {{ $devisSelectionne->statut === 'nouveau' ? 'bg-blue-600 text-white shadow-md' : 'bg-blue-50 text-blue-700 hover:bg-blue-100' }}">
                            Nouveau
                        </button>
                        <button wire:click="changerStatut({{ $devisSelectionne->id }}, 'en_cours')"
                                class="px-4 py-2 rounded-lg text-sm font-semibold transition
                                       {{ $devisSelectionne->statut === 'en_cours' ? 'bg-yellow-600 text-white shadow-md' : 'bg-yellow-50 text-yellow-700 hover:bg-yellow-100' }}">
                            En cours
                        </button>
                        <button wire:click="changerStatut({{ $devisSelectionne->id }}, 'traite')"
                                class="px-4 py-2 rounded-lg text-sm font-semibold transition
                                       {{ $devisSelectionne->statut === 'traite' ? 'bg-green-600 text-white shadow-md' : 'bg-green-50 text-green-700 hover:bg-green-100' }}">
                            Traité
                        </button>
                        <button wire:click="changerStatut({{ $devisSelectionne->id }}, 'refuse')"
                                class="px-4 py-2 rounded-lg text-sm font-semibold transition
                                       {{ $devisSelectionne->statut === 'refuse' ? 'bg-red-600 text-white shadow-md' : 'bg-red-50 text-red-700 hover:bg-red-100' }}">
                            Refusé
                        </button>
                    </div>
                </div>
            </div>

            {{-- ============ FOOTER MODAL ============ --}}
            <div class="p-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3">

                {{-- Bouton suppression --}}
                <button wire:click="confirmerSuppression({{ $devisSelectionne->id }})"
                        class="text-red-600 hover:text-red-700 text-sm font-medium flex items-center justify-center sm:justify-start gap-1 order-3 sm:order-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
                    </svg>
                    Supprimer ce devis
                </button>

                {{-- Boutons d'action --}}
                <div class="flex flex-wrap gap-2 justify-center sm:justify-end order-1 sm:order-2">

                    {{-- ⬇⬇⬇ TÉLÉCHARGER PDF ⬇⬇⬇ --}}
                    <a href="{{ route('admin.devis.pdf', $devisSelectionne->id) }}"
                       class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition text-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Télécharger PDF
                    </a>

                    {{-- ⬇⬇⬇ APERÇU PDF ⬇⬇⬇ --}}
                    <a href="{{ route('admin.devis.pdf.voir', $devisSelectionne->id) }}"
                       target="_blank"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold transition text-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Aperçu
                    </a>

                    {{-- Répondre par email --}}
                    <a href="mailto:{{ $devisSelectionne->email }}?subject=Re: Devis {{ $devisSelectionne->reference }}"
                       class="bg-gradient-to-r from-brand-600 to-brand-700 text-white px-4 py-2 rounded-lg font-semibold hover:shadow-lg transition text-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Répondre
                    </a>

                    {{-- Fermer --}}
                    <button wire:click="fermerModal"
                            class="px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition font-medium text-sm">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif