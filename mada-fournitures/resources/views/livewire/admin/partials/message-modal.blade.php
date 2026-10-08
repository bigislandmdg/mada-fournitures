@if($showModal && $messageSelectionne)
    <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
         wire:click.self="fermerModal">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto"
             wire:click.stop>

            {{-- Header modal --}}
            <div class="p-6 border-b border-gray-100 flex justify-between items-start sticky top-0 bg-white z-10 rounded-t-2xl">
                <div class="min-w-0 flex-1">
                    <div class="flex items-center gap-3 mb-1 flex-wrap">
                        <h2 class="text-lg font-bold text-gray-900 truncate">
                            {{ $messageSelectionne->sujet }}
                        </h2>
                        @if($messageSelectionne->lu)
                            <span class="text-xs px-2.5 py-1 rounded-full font-semibold bg-green-100 text-green-700">
                                Lu
                            </span>
                        @else
                            <span class="text-xs px-2.5 py-1 rounded-full font-semibold bg-orange-100 text-orange-700">
                                Non lu
                            </span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-500">
                        Reçu le {{ $messageSelectionne->created_at->format('d/m/Y à H:i') }}
                        ({{ $messageSelectionne->created_at->diffForHumans() }})
                    </p>
                </div>
                <button wire:click="fermerModal"
                        class="text-gray-400 hover:text-gray-700 p-1 rounded-lg hover:bg-gray-100 transition flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Contenu --}}
            <div class="p-6 space-y-6">

                {{-- Coordonnées --}}
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">Expéditeur</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                        <div>
                            <div class="text-xs text-gray-500 uppercase">Nom</div>
                            <div class="font-semibold text-gray-900">{{ $messageSelectionne->nom }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 uppercase">Email</div>
                            <a href="mailto:{{ $messageSelectionne->email }}"
                               class="text-brand-600 hover:underline text-sm break-all">
                                {{ $messageSelectionne->email }}
                            </a>
                        </div>
                        @if($messageSelectionne->telephone)
                            <div class="sm:col-span-2">
                                <div class="text-xs text-gray-500 uppercase">Téléphone</div>
                                <a href="tel:{{ $messageSelectionne->telephone }}"
                                   class="text-gray-900 text-sm">
                                    {{ $messageSelectionne->telephone }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Message --}}
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">Message</h3>
                    <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 whitespace-pre-line leading-relaxed">
                        {{ $messageSelectionne->message }}
                    </div>
                </div>

                {{-- Actions rapides --}}
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">Actions rapides</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="mailto:{{ $messageSelectionne->email }}?subject=Re: {{ $messageSelectionne->sujet }}"
                           class="bg-gradient-to-r from-brand-600 to-brand-700 text-white px-4 py-2 rounded-lg font-semibold hover:shadow-lg transition text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Répondre par email
                        </a>
                        @if($messageSelectionne->telephone)
                            <a href="tel:{{ $messageSelectionne->telephone }}"
                               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition text-sm flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Appeler
                            </a>
                        @endif
                        <button wire:click="toggleLu({{ $messageSelectionne->id }})"
                                class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold transition text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Marquer comme {{ $messageSelectionne->lu ? 'non lu' : 'lu' }}
                        </button>
                    </div>
                </div>
            </div>

            {{-- Footer modal --}}
            <div class="p-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl flex justify-between items-center">
                <button wire:click="confirmerSuppression({{ $messageSelectionne->id }})"
                        class="text-red-600 hover:text-red-700 text-sm font-medium flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
                    </svg>
                    Supprimer ce message
                </button>
                <button wire:click="fermerModal"
                        class="px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition font-medium text-sm">
                    Fermer
                </button>
            </div>
        </div>
    </div>
@endif