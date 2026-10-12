<div>
    {{-- ==================== HERO ==================== --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-brand-700 via-brand-600 to-brand-900 bg-[length:300%_300%] animate-gradient text-white">
        {{-- Motif décoratif --}}
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>
        </div>

        {{-- Formes flottantes --}}
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/5 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl animate-float" style="animation-delay: 1.5s;"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 text-center">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 mb-8 animate-fade-in-down">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium">{{ __('ui.hero_badge') }}</span>
            </div>

            {{-- Titre --}}
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight tracking-tight animate-fade-in-up">
                {{ __('ui.hero_title_first') }}
                <br class="hidden md:block">
                <span class="bg-gradient-to-r from-yellow-300 via-white to-yellow-300 bg-clip-text text-transparent bg-[length:200%_auto] animate-gradient">
                    {{ __('ui.hero_title_second') }}
                </span>
            </h1>

            {{-- Sous-titre --}}
            <p class="text-lg md:text-xl mb-10 text-blue-100 max-w-3xl mx-auto leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                {{ __('ui.hero_description') }}
            </p>

            {{-- Boutons --}}
            <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('fournitures.index') }}"
                   class="group bg-white text-brand-700 px-8 py-4 rounded-xl font-bold shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                    {{ __('ui.discover_products') }}
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ route('devis') }}"
                   class="group bg-brand-900/50 backdrop-blur-sm border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold hover:bg-brand-900 hover:border-white transition-all duration-300 flex items-center justify-center gap-2">
                    {{ __('ui.request_quote') }}
                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-.293.707l-5.414 5.414A1 1 0 0112.586 21H7a2 2 0 01-2-2z"/>
                    </svg>
                </a>
            </div>

            {{-- Statistiques --}}
            <div class="grid grid-cols-3 gap-6 max-w-2xl mx-auto mt-16 animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-extrabold text-white">+500</div>
                    <div class="text-blue-200 text-sm mt-1">{{ __('ui.stat_products') }}</div>
                </div>
                <div class="text-center border-x border-white/20">
                    <div class="text-3xl md:text-4xl font-extrabold text-white">+200</div>
                    <div class="text-blue-200 text-sm mt-1">{{ __('ui.stat_clients') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-extrabold text-white">24h</div>
                    <div class="text-blue-200 text-sm mt-1">{{ __('ui.stat_quote_response') }}</div>
                </div>
            </div>
        </div>

        {{-- Vague de séparation --}}
        <svg class="absolute bottom-0 left-0 w-full text-gray-50" viewBox="0 0 1440 60" fill="currentColor">
            <path d="M0,32L80,37.3C160,43,320,53,480,53.3C640,53,800,43,960,37.3C1120,32,1280,32,1360,32L1440,32L1440,60L1360,60C1280,60,1120,60,960,60C800,60,640,60,480,60C320,60,160,60,80,60L0,60Z"/>
        </svg>
    </section>

    {{-- ==================== CATÉGORIES ==================== --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20"
             x-data="{ shown: false }"
             x-intersect.once="shown = true">
        <div class="text-center mb-14"
             :class="shown ? 'animate-fade-in-down' : 'opacity-0'">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wider">{{ __('ui.categories_eyebrow') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-3">{{ __('ui.categories_title') }}</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('ui.categories_description') }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $index => $categorie)
                <a href="{{ route('fournitures.categorie', $categorie->slug) }}"
                   class="group relative bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-500 p-6 border border-gray-100 overflow-hidden hover:-translate-y-2"
                   :class="shown ? 'animate-fade-in-up opacity-100' : 'opacity-0'"
                   style="animation-delay: {{ $index * 0.15 }}s;">

                    {{-- Fond décoratif au survol --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-600 to-brand-800 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative">
                        <div class="w-14 h-14 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-white group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>

                        <h3 class="font-bold text-lg text-gray-900 mb-2 group-hover:text-white transition-colors duration-300">
                            {{ $categorie->nom }}
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed group-hover:text-blue-100 transition-colors duration-300">
                            {{ $categorie->description }}
                        </p>

                        <div class="mt-4 flex items-center text-brand-600 group-hover:text-white font-semibold text-sm transition-colors">
                            <span>{{ __('ui.view_products') }}</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- ==================== POURQUOI NOUS ==================== --}}
    <section class="bg-gradient-to-b from-gray-50 to-white py-20"
             x-data="{ shown: false }"
             x-intersect.once="shown = true">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14"
                 :class="shown ? 'animate-fade-in-down' : 'opacity-0'">
                <span class="text-brand-600 font-semibold text-sm uppercase tracking-wider">{{ __('ui.advantages_eyebrow') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-3">{{ __('ui.why_choose_us') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __('ui.advantages_description') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $avantages = [
                        [
                            'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                            'titre' => __('ui.reliability'),
                            'texte' => __('ui.reliability_description'),
                        ],
                        [
                            'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1',
                            'titre' => __('ui.competitive_prices'),
                            'texte' => __('ui.competitive_prices_description'),
                        ],
                        [
                            'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                            'titre' => __('ui.public_markets'),
                            'texte' => __('ui.public_markets_description'),
                        ],
                    ];
                @endphp

                @foreach($avantages as $index => $avantage)
                    <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:-translate-y-2"
                         :class="shown ? 'animate-fade-in-up' : 'opacity-0'"
                         style="animation-delay: {{ $index * 0.15 }}s;">

                        <div class="relative w-16 h-16 mb-6">
                            <div class="absolute inset-0 bg-brand-600 rounded-2xl rotate-6 group-hover:rotate-12 transition-transform duration-300"></div>
                            <div class="relative bg-gradient-to-br from-brand-500 to-brand-700 text-white w-16 h-16 rounded-2xl flex items-center justify-center">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $avantage['icon'] }}"/>
                                </svg>
                            </div>
                        </div>

                        <h3 class="font-bold text-xl mb-3 text-gray-900">{{ $avantage['titre'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $avantage['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== CTA FINAL ==================== --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20"
             x-data="{ shown: false }"
             x-intersect.once="shown = true">
        <div class="relative overflow-hidden bg-gradient-to-br from-brand-700 via-brand-600 to-brand-900 rounded-3xl p-10 md:p-16 text-center text-white shadow-2xl"
             :class="shown ? 'animate-fade-in-up' : 'opacity-0'">

            {{-- Décor --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-400/10 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>

            <div class="relative">
                <span class="inline-block bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 text-sm font-medium mb-6">
                    {{ __('ui.free_quote_badge') }}
                </span>

                <h2 class="text-3xl md:text-5xl font-extrabold mb-5 leading-tight">
                    {{ __('ui.final_cta_title') }}
                </h2>
                <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                    {{ __('ui.final_cta_description') }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('devis') }}"
                       class="group bg-white text-brand-700 px-8 py-4 rounded-xl font-bold shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                        {{ __('ui.request_quote') }}
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}"
                       class="bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold hover:bg-white/20 transition-all duration-300">
                        {{ __('ui.contact_us') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
