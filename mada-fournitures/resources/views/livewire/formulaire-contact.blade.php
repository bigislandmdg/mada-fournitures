<div>
    <section class="bg-gradient-to-br from-brand-700 to-brand-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-bold">Contactez-nous</h1>
            <p class="text-blue-100 mt-2">Une question ? Un projet ? Écrivez-nous.</p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

             {{-- Coordonnées --}}
<aside class="lg:col-span-1 space-y-4">
    {{-- Adresse --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div>
            <h3 class="font-bold text-gray-900">Adresse</h3>
            <p class="text-sm text-gray-600">Antananarivo, Madagascar</p>
        </div>
    </div>

    {{-- Téléphone --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
        </div>
        <div>
            <h3 class="font-bold text-gray-900">Téléphone</h3>
            <p class="text-sm text-gray-600">
                <a href="tel:+261340000000" class="hover:text-brand-600 transition">+261 34 00 000 00</a>
            </p>
        </div>
    </div>

    {{-- Email --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <div class="min-w-0">
            <h3 class="font-bold text-gray-900">Email</h3>
            <p class="text-sm text-gray-600 break-all">
                <a href="mailto:contact@madafournitures.mg" class="hover:text-brand-600 transition">contact@madafournitures.mg</a>
            </p>
        </div>
    </div>

    {{-- Horaires (NOUVEAU) --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6 flex items-start gap-4">
        <div class="w-12 h-12 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <h3 class="font-bold text-gray-900 mb-2">Horaires</h3>
            <div class="space-y-1 text-sm text-gray-600">
                <div class="flex justify-between gap-4">
                    <span>Lun - Ven</span>
                    <span class="font-medium text-gray-900">8h - 17h</span>
                </div>
                <div class="flex justify-between gap-4">
                    <span>Samedi</span>
                    <span class="font-medium text-gray-900">8h - 12h</span>
                </div>
                <div class="flex justify-between gap-4">
                    <span>Dimanche</span>
                    <span class="text-red-500 font-medium">Fermé</span>
                </div>
            </div>
        </div>
    </div>
</aside>

            {{-- Formulaire --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl border border-gray-100 p-8">
                    @if(session('contact_success'))
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ session('contact_success') }}
                        </div>
                    @endif

                    <form wire:submit="envoyer" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
                                <input type="text" wire:model="nom"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                                @error('nom') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" wire:model="email"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                                @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                                <input type="tel" wire:model="telephone"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sujet *</label>
                                <input type="text" wire:model="sujet"
                                       class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100">
                                @error('sujet') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message *</label>
                            <textarea wire:model="message" rows="6"
                                      class="w-full rounded-lg border-gray-200 focus:border-brand-500 focus:ring-brand-100"></textarea>
                            @error('message') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit"
                                wire:loading.attr="disabled"
                                class="w-full md:w-auto bg-gradient-to-r from-brand-600 to-brand-700 text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <span wire:loading.remove>Envoyer le message</span>
                            <span wire:loading>Envoi...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>