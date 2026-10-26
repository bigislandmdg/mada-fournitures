{{-- ================= FOOTER ================= --}}
<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- ============ GRILLE PRINCIPALE ============ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            {{-- Colonne 1 : Logo + description + réseaux --}}
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 mb-4 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-brand-500 to-brand-700 rounded-xl rotate-6 group-hover:rotate-12 transition-transform duration-500 opacity-60 blur-sm"></div>
                        <div class="relative bg-gradient-to-br from-brand-600 to-brand-800 text-white font-bold rounded-xl w-10 h-10 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            MF
                        </div>
                    </div>
                    <div>
                        <div class="font-bold text-white text-lg leading-tight">Mada Fournitures</div>
                        <div class="text-[10px] text-gray-500 uppercase tracking-wider">Solutions professionnelles</div>
                    </div>
                </a>

                <p class="text-sm text-gray-400 leading-relaxed mb-6">
                    Des solutions fiables pour vos besoins professionnels et marchés publics à Madagascar.
                </p>

                {{-- Réseaux sociaux --}}
                <div class="flex items-center gap-3">
                    <a href="#" aria-label="Facebook"
                       class="w-9 h-9 bg-gray-800 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="LinkedIn"
                       class="w-9 h-9 bg-gray-800 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.063 2.063 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/261340000000" target="_blank" aria-label="WhatsApp"
                       class="w-9 h-9 bg-gray-800 hover:bg-green-600 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Colonne 2 : Navigation --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Navigation</h4>
                <ul class="space-y-2.5 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-gray-600 group-hover:bg-brand-500 rounded-full transition-colors"></span>
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('fournitures.index') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-gray-600 group-hover:bg-brand-500 rounded-full transition-colors"></span>
                            Nos fournitures
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('marches') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-gray-600 group-hover:bg-brand-500 rounded-full transition-colors"></span>
                            Marchés publics
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-propos') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-gray-600 group-hover:bg-brand-500 rounded-full transition-colors"></span>
                            À propos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-gray-600 group-hover:bg-brand-500 rounded-full transition-colors"></span>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Colonne 3 : Catégories --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Catégories</h4>
                <ul class="space-y-2.5 text-sm">
                    @php
                        $categories = \App\Models\Categorie::actif()->ordonne()->take(5)->get();
                    @endphp
                    @forelse($categories as $cat)
                        <li>
                            <a href="{{ route('fournitures.categorie', $cat->slug) }}"
                               class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group">
                                <span class="w-1 h-1 bg-gray-600 group-hover:bg-brand-500 rounded-full transition-colors"></span>
                                {{ $cat->nom }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-500 text-sm">Aucune catégorie</li>
                    @endforelse
                </ul>
            </div>

            {{-- Colonne 4 : Contact --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Contact</h4>
                <ul class="space-y-3 text-sm">

                    {{-- Adresse --}}
                    <li class="flex items-start gap-3 text-gray-400">
                        <svg class="w-4 h-4 text-brand-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Antananarivo, Madagascar</span>
                    </li>

                    {{-- Téléphone --}}
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-brand-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+261340000000" class="text-gray-400 hover:text-white transition-colors">
                            +261 34 00 000 00
                        </a>
                    </li>

                    {{-- Email --}}
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-brand-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:contact@madafournitures.mg" class="text-gray-400 hover:text-white transition-colors break-all">
                            contact@madafournitures.mg
                        </a>
                    </li>

                    {{-- Horaires --}}
                    <li class="flex items-start gap-3 text-gray-400 pt-2 border-t border-gray-800">
                        <svg class="w-4 h-4 text-brand-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <div class="text-xs text-gray-500 uppercase tracking-wider mb-1">Horaires</div>
                            <div>Lun - Ven : 8h - 17h</div>
                            <div>Sam : 8h - 12h</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        {{-- ============ BARRE INFÉRIEURE ============ --}}
        <div class="border-t border-gray-800 mt-10 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4">

            {{-- Copyright --}}
            <div class="text-sm text-gray-500 text-center sm:text-left">
                © {{ date('Y') }} <span class="text-gray-300 font-medium">Mada Fournitures</span>.
                Tous droits réservés.
            </div>

            {{-- Liens légaux --}}
            <div class="flex flex-wrap items-center justify-center gap-4 text-sm text-gray-500">
              <a href="{{ route('mentions-legales') }}" class="hover:text-white transition-colors">Mentions légales</a>
              <span class="text-gray-700 hidden sm:inline">·</span>
              <a href="{{ route('confidentialite') }}" class="hover:text-white transition-colors">Confidentialité</a>
            </div>
        </div>
    </div>
</footer>

{{-- ================= BOUTON WHATSAPP FLOTTANT ================= --}}
<a href="https://wa.me/261340000000" target="_blank" rel="noopener"
   x-data="{ hover: false }"
   @mouseenter="hover = true" @mouseleave="hover = false"
   class="fixed bottom-6 right-6 bg-gradient-to-br from-green-500 to-green-600 hover:from-green-600 hover:to-green-700
          text-white w-14 h-14 rounded-full shadow-lg hover:shadow-2xl
          flex items-center justify-center z-50 transition-all duration-300 hover:scale-110">

    {{-- Icône WhatsApp --}}
    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
    </svg>

    {{-- Pastille "en ligne" --}}
    <span class="absolute -top-1 -right-1 flex">
        <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-red-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
    </span>
</a>

{{-- ================= BOUTON RETOUR EN HAUT ================= --}}
<button x-data="{ show: false }"
        @scroll.window="show = window.scrollY > 400"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        aria-label="Retour en haut"
        class="fixed bottom-24 right-6 bg-gray-900 hover:bg-brand-600 text-white w-11 h-11 rounded-full shadow-lg
               flex items-center justify-center z-40 transition-colors">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>