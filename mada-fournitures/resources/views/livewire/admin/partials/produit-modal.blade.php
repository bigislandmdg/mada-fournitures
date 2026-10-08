@if($showModal)
    <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
         wire:click.self="fermerModal">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto"
             wire:click.stop>

            {{-- Header modal --}}
            <div class="p-6 border-b border-gray-100 flex justify-between items-center sticky top-0 bg-white z-10 rounded-t-2xl">
                <h2 class="text-lg font-bold text-gray-900">
                    {{ $editingId ? 'Modifier le produit' : 'Nouveau produit' }}
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
                           placeholder="Ex : Ordinateur portable HP"
                           class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                    @error('nom') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Catégorie + Unité --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Catégorie <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="categorie_id"
                                class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                            <option value="">— Choisir une catégorie —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                            @endforeach
                        </select>
                        @error('categorie_id') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Unité <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               wire:model="unite"
                               placeholder="pièce, kg, sac..."
                               class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                        @error('unite') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea wire:model="description"
                              rows="3"
                              placeholder="Description du produit..."
                              class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100"></textarea>
                </div>

                {{-- Prix + Stock --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Prix indicatif (Ar)
                        </label>
                        <input type="number"
                               wire:model="prix_indicatif"
                               min="0"
                               step="1"
                               placeholder="0"
                               class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                        @error('prix_indicatif') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Stock <span class="text-red-500">*</span>
                        </label>
                        <input type="number"
                               wire:model="stock"
                               min="0"
                               class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                        @error('stock') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>

                    @if($image_actuelle && !$image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $image_actuelle) }}"
                                 alt="Image actuelle"
                                 class="w-24 h-24 object-cover rounded-lg border border-gray-200">
                            <p class="text-xs text-gray-500 mt-1">Image actuelle</p>
                        </div>
                    @endif

                    @if($image)
                        <div class="mb-3">
                            <img src="{{ $image->temporaryUrl() }}"
                                 alt="Aperçu"
                                 class="w-24 h-24 object-cover rounded-lg border border-gray-200">
                            <p class="text-xs text-brand-600 mt-1">Nouvelle image (aperçu)</p>
                        </div>
                    @endif

                    <input type="file"
                           wire:model="image"
                           accept="image/*"
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-50 file:text-brand-700 file:font-semibold hover:file:bg-brand-100 cursor-pointer">
                    <p class="text-xs text-gray-500 mt-1">JPG, PNG, WebP — max 2 Mo</p>

                    <div wire:loading wire:target="image" class="text-xs text-brand-600 mt-1">
                        Téléchargement en cours...
                    </div>

                    @error('image') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Actif --}}
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox"
                           wire:model="actif"
                           class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm text-gray-700">Produit actif (visible sur le site)</span>
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