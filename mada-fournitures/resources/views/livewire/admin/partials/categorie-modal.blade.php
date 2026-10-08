@if($showModal)
    <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
         wire:click.self="fermerModal">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto"
             wire:click.stop>

            {{-- Header modal --}}
            <div class="p-6 border-b border-gray-100 flex justify-between items-center sticky top-0 bg-white z-10 rounded-t-2xl">
                <h2 class="text-lg font-bold text-gray-900">
                    {{ $editingId ? 'Modifier la catégorie' : 'Nouvelle catégorie' }}
                </h2>
                <button wire:click="fermerModal"
                        type="button"
                        class="text-gray-400 hover:text-gray-700 p-1 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Formulaire --}}
            <form wire:submit="enregistrer" class="p-6 space-y-4">

                {{-- Nom --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nom <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           wire:model="nom"
                           placeholder="Ex : Électronique et informatique"
                           class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                    @error('nom') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea wire:model="description"
                              rows="3"
                              placeholder="Description de la catégorie..."
                              class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100"></textarea>
                    @error('description') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Ordre --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Ordre d'affichage
                    </label>
                    <input type="number"
                           wire:model="ordre"
                           min="0"
                           placeholder="0"
                           class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                    <p class="text-xs text-gray-500 mt-1">Les catégories avec un ordre plus petit apparaissent en premier.</p>
                    @error('ordre') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Actif --}}
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox"
                           wire:model="actif"
                           class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm text-gray-700">Catégorie active (visible sur le site)</span>
                </label>

                {{-- Boutons --}}
                <div class="flex justify-end gap-2 pt-4 border-t border-gray-100">
                    <button type="button"
                            wire:click="fermerModal"
                            class="px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition font-medium">
                        Annuler
                    </button>
                    <button type="submit"
                            wire:loading.attr="disabled"
                            wire:target="enregistrer"
                            class="bg-gradient-to-r from-brand-600 to-brand-700 text-white px-6 py-2 rounded-lg font-semibold hover:shadow-lg transition-all disabled:opacity-60 flex items-center gap-2">
                        <span wire:loading.remove wire:target="enregistrer">
                            {{ $editingId ? 'Enregistrer' : 'Créer' }}
                        </span>
                        <span wire:loading wire:target="enregistrer" class="flex items-center gap-2">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                            Traitement...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif