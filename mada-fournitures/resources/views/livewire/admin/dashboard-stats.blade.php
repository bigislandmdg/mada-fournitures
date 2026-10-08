<div>
    {{-- Cartes de statistiques --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @php
            $cards = [
                ['label' => 'Produits',   'value' => $stats['produits'],    'color' => 'brand',  'route' => 'admin.produits',   'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['label' => 'Catégories', 'value' => $stats['categories'],  'color' => 'green',  'route' => 'admin.categories', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z'],
                ['label' => 'Devis',      'value' => $stats['devis_total'], 'color' => 'purple', 'route' => 'admin.devis',      'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['label' => 'Messages',   'value' => $stats['messages'],    'color' => 'orange', 'route' => 'admin.messages',   'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ];
            $colorClasses = [
                'brand'  => ['bg' => 'bg-brand-50',  'text' => 'text-brand-600'],
                'green'  => ['bg' => 'bg-green-50',  'text' => 'text-green-600'],
                'purple' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600'],
                'orange' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-600'],
            ];
        @endphp

        @foreach($cards as $card)
            @php $c = $colorClasses[$card['color']]; @endphp
            <a href="{{ route($card['route']) }}"
               class="group bg-white rounded-xl shadow-sm hover:shadow-lg border border-gray-100 p-5 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 {{ $c['bg'] }} {{ $c['text'] }} rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-gray-900">{{ $card['value'] }}</div>
                <div class="text-sm text-gray-500 mt-1">{{ $card['label'] }}</div>
            </a>
        @endforeach
    </div>

    {{-- Alertes --}}
    @if($stats['devis_nouveaux'] > 0 || $stats['messages_non_lus'] > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            @if($stats['devis_nouveaux'] > 0)
                <a href="{{ route('admin.devis') }}"
                   class="bg-blue-50 border border-blue-200 rounded-xl p-4 flex items-center gap-3 hover:bg-blue-100 transition">
                    <div class="w-10 h-10 bg-blue-500 text-white rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-blue-900">{{ $stats['devis_nouveaux'] }} nouveau(x) devis</div>
                        <div class="text-sm text-blue-700">à traiter</div>
                    </div>
                </a>
            @endif

            @if($stats['messages_non_lus'] > 0)
                <a href="{{ route('admin.messages') }}"
                   class="bg-orange-50 border border-orange-200 rounded-xl p-4 flex items-center gap-3 hover:bg-orange-100 transition">
                    <div class="w-10 h-10 bg-orange-500 text-white rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-orange-900">{{ $stats['messages_non_lus'] }} message(s) non lu(s)</div>
                        <div class="text-sm text-orange-700">à consulter</div>
                    </div>
                </a>
            @endif
        </div>
    @endif

    {{-- Derniers devis et messages --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-900">Derniers devis</h2>
                <a href="{{ route('admin.devis') }}" class="text-sm text-brand-600 hover:underline">Tout voir</a>
            </div>
            @forelse($derniers_devis as $devis)
                <div class="p-4 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="font-semibold text-gray-900">{{ $devis->nom_client }}</div>
                            <div class="text-xs text-gray-500">{{ $devis->reference }} · {{ $devis->created_at->diffForHumans() }}</div>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full
                                     {{ $devis->statut === 'nouveau' ? 'bg-blue-100 text-blue-700' : '' }}
                                     {{ $devis->statut === 'en_cours' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                     {{ $devis->statut === 'traite' ? 'bg-green-100 text-green-700' : '' }}
                                     {{ $devis->statut === 'refuse' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ str_replace('_', ' ', $devis->statut) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500 text-sm">Aucun devis pour le moment.</div>
            @endforelse
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-900">Derniers messages</h2>
                <a href="{{ route('admin.messages') }}" class="text-sm text-brand-600 hover:underline">Tout voir</a>
            </div>
            @forelse($derniers_messages as $msg)
                <div class="p-4 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition {{ !$msg->lu ? 'bg-orange-50/30' : '' }}">
                    <div class="flex justify-between items-start">
                        <div class="min-w-0">
                            <div class="font-semibold text-gray-900 truncate">{{ $msg->nom }}</div>
                            <div class="text-xs text-gray-500 truncate">{{ $msg->sujet }}</div>
                            <div class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</div>
                        </div>
                        @if(!$msg->lu)
                            <span class="w-2 h-2 bg-orange-500 rounded-full flex-shrink-0 mt-2"></span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500 text-sm">Aucun message pour le moment.</div>
            @endforelse
        </div>
    </div>
</div>