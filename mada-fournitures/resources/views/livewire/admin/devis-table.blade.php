<div>
    {{-- ============ HEADER ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-5">
        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
            <div class="relative w-full sm:w-80">
                <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text"
                       wire:model.live.debounce.400ms="recherche"
                       placeholder="Rechercher un devis..."
                       class="w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100 text-sm">
            </div>
            <select wire:model.live="filtreStatut"
                    class="rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100 text-sm py-2.5">
                <option value="">Tous les statuts</option>
                <option value="nouveau">Nouveau</option>
                <option value="en_cours">En cours</option>
                <option value="traite">Traité</option>
                <option value="refuse">Refusé</option>
            </select>
        </div>
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
                        <th class="px-4 py-3 font-semibold">Référence</th>
                        <th class="px-4 py-3 font-semibold">Client</th>
                        <th class="px-4 py-3 font-semibold">Contact</th>
                        <th class="px-4 py-3 font-semibold">Articles</th>
                        <th class="px-4 py-3 font-semibold">Date</th>
                        <th class="px-4 py-3 font-semibold">Statut</th>
                        <th class="px-4 py-3 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($devis as $d)
                        <tr class="hover:bg-gray-50 transition" wire:key="devis-{{ $d->id }}">
                            <td class="px-4 py-3">
                                <span class="font-mono text-xs bg-gray-100 px-2 py-1 rounded">{{ $d->reference }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-medium text-gray-900">{{ $d->nom_client }}</div>
                                @if($d->societe)
                                    <div class="text-xs text-gray-500">{{ $d->societe }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                <div class="text-xs">{{ $d->email }}</div>
                                <div class="text-xs">{{ $d->telephone }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-xs bg-brand-50 text-brand-700 px-2.5 py-1 rounded-full font-semibold">
                                    {{ $d->items_count }} article(s)
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600 text-xs">
                                {{ $d->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-3">
                                <select wire:change="changerStatut({{ $d->id }}, $event.target.value)"
                                        class="text-xs px-2 py-1 rounded-full font-semibold border-0 focus:ring-2 focus:ring-brand-100 cursor-pointer
                                               {{ $d->statut === 'nouveau' ? 'bg-blue-100 text-blue-700' : '' }}
                                               {{ $d->statut === 'en_cours' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                               {{ $d->statut === 'traite' ? 'bg-green-100 text-green-700' : '' }}
                                               {{ $d->statut === 'refuse' ? 'bg-red-100 text-red-700' : '' }}">
                                    <option value="nouveau"   @selected($d->statut === 'nouveau')>Nouveau</option>
                                    <option value="en_cours"  @selected($d->statut === 'en_cours')>En cours</option>
                                    <option value="traite"    @selected($d->statut === 'traite')>Traité</option>
                                    <option value="refuse"    @selected($d->statut === 'refuse')>Refusé</option>
                                </select>
                            </td>
                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                {{-- Voir détail --}}
                                <button wire:click="voir({{ $d->id }})"
                                        class="text-brand-600 hover:text-brand-800 p-1.5 rounded-lg hover:bg-brand-50 transition"
                                        title="Voir le détail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>

                                {{-- ⬇⬇⬇ TÉLÉCHARGER PDF ⬇⬇⬇ --}}
                                <a href="{{ route('admin.devis.pdf', $d->id) }}"
                                   class="text-red-600 hover:text-red-800 p-1.5 rounded-lg hover:bg-red-50 transition inline-flex ml-1"
                                   title="Télécharger PDF">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </a>

                                {{-- Supprimer --}}
                                <button wire:click="confirmerSuppression({{ $d->id }})"
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
                            <td colspan="7" class="px-4 py-12 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Aucun devis trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ============ PAGINATION ============ --}}
    <div class="mt-4">
        {{ $devis->links() }}
    </div>

    {{-- ============ MODAL DÉTAIL ============ --}}
    @include('livewire.admin.partials.devis-modal')

    {{-- ============ MODAL CONFIRMATION SUPPRESSION ============ --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 bg-black/50 z-[60] flex items-center justify-center p-4"
             wire:click.self="annulerSuppression">

            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md"
                 wire:click.stop>

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
                        Voulez-vous vraiment supprimer le devis
                        <strong class="font-mono text-gray-900">{{ $deleteTargetReference }}</strong>
                        de <strong class="text-gray-900">{{ $deleteTargetClient }}</strong> ?
                    </p>
                    <p class="text-xs text-red-600 mt-2">
                        Cette action est irréversible. Tous les articles liés seront également supprimés.
                    </p>
                </div>

                <div class="flex gap-2 p-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
                    <button wire:click="annulerSuppression"
                            class="flex-1 px-4 py-2.5 rounded-lg text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 transition font-medium">
                        Annuler
                    </button>
                    <button wire:click="supprimer"
                            wire:loading.attr="disabled"
                            wire:target="supprimer"
                            class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-lg font-semibold transition-all disabled:opacity-60 flex items-center justify-center gap-2">
                        <span wire:loading.remove wire:target="supprimer">Supprimer</span>
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