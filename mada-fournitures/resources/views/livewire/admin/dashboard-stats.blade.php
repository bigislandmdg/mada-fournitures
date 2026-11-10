<div>
   {{-- ============ EN-TÊTE DE SALUTATION ============ --}}
<div class="mb-6 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3"
     x-data="{ refreshing: false }">
    <div class="min-w-0">
        <div class="flex items-center gap-2 flex-wrap">
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight truncate">
                Bonjour, {{ auth()->user()->name }}
            </h1>
            <span class="inline-flex items-center gap-1 text-[10px] font-semibold uppercase tracking-wider
                         px-2 py-0.5 rounded-full bg-blue-50 text-blue-700 ring-1 ring-blue-100">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                </svg>
                Admin
            </span>
        </div>
        <p class="text-sm text-gray-500 mt-1">
            Voici un aperçu de votre activité — {{ now()->translatedFormat('l j F Y') }}.
        </p>
    </div>

    {{-- Bouton Actualiser (outline bleu, texte bleu) --}}
    <div class="flex items-center gap-2 flex-shrink-0">
        <button type="button"
                @click="refreshing = true; window.location.reload()"
                :disabled="refreshing"
                class="inline-flex items-center gap-1.5 text-sm font-semibold
                       text-blue-600 bg-white border border-blue-200 hover:bg-blue-50 hover:border-blue-300
                       px-4 py-2 rounded-lg shadow-sm transition
                       focus:outline-none focus:ring-2 focus:ring-blue-500/40
                       active:scale-[0.98] disabled:opacity-70 disabled:cursor-wait">
            <svg class="w-4 h-4 transition-transform"
                 :class="refreshing ? 'animate-spin' : ''"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            <span x-text="refreshing ? 'Actualisation…' : 'Actualiser'">Actualiser</span>
        </button>
    </div>
</div>

    {{-- Cartes de statistiques --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @php
            $cards = [
                ['label' => 'Produits',   'value' => $stats['produits'],    'color' => 'blue',   'route' => 'admin.produits',   'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['label' => 'Catégories', 'value' => $stats['categories'],  'color' => 'emerald','route' => 'admin.categories', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z'],
                ['label' => 'Devis',      'value' => $stats['devis_total'], 'color' => 'indigo', 'route' => 'admin.devis',      'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['label' => 'Messages',   'value' => $stats['messages'],    'color' => 'amber',  'route' => 'admin.messages',   'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ];
            $colorClasses = [
                'blue'    => ['bg' => 'bg-blue-50',    'text' => 'text-blue-600',    'ring' => 'ring-blue-100'],
                'emerald' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'ring' => 'ring-emerald-100'],
                'indigo'  => ['bg' => 'bg-indigo-50',  'text' => 'text-indigo-600',  'ring' => 'ring-indigo-100'],
                'amber'   => ['bg' => 'bg-amber-50',   'text' => 'text-amber-600',   'ring' => 'ring-amber-100'],
            ];
        @endphp

        @foreach($cards as $card)
            @php $c = $colorClasses[$card['color']]; @endphp
            <a href="{{ route($card['route']) }}"
               class="group relative bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 p-5 transition-all duration-300 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 {{ $c['bg'] }} {{ $c['text'] }} rounded-lg flex items-center justify-center ring-1 {{ $c['ring'] }} group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $card['value'] }}</div>
                <div class="text-sm text-gray-500 mt-1">{{ $card['label'] }}</div>
            </a>
        @endforeach
    </div>

    {{-- Alertes --}}
    @if($stats['devis_nouveaux'] > 0 || $stats['messages_non_lus'] > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            @if($stats['devis_nouveaux'] > 0)
                <a href="{{ route('admin.devis') }}"
                   class="bg-blue-50 border border-blue-200 rounded-xl p-4 flex items-center gap-3 hover:bg-blue-100 hover:border-blue-300 transition shadow-sm">
                    <div class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm">
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
                   class="bg-amber-50 border border-amber-200 rounded-xl p-4 flex items-center gap-3 hover:bg-amber-100 hover:border-amber-300 transition shadow-sm">
                    <div class="w-10 h-10 bg-amber-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-amber-900">{{ $stats['messages_non_lus'] }} message(s) non lu(s)</div>
                        <div class="text-sm text-amber-700">à consulter</div>
                    </div>
                </a>
            @endif
        </div>
    @endif

    {{-- Derniers devis et messages --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-900">Derniers devis</h2>
                <a href="{{ route('admin.devis') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline">Tout voir</a>
            </div>
            @forelse($derniers_devis as $devis)
                <div class="p-4 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition">
                    <div class="flex justify-between items-start gap-3">
                        <div class="min-w-0">
                            <div class="font-semibold text-gray-900 truncate">{{ $devis->nom_client }}</div>
                            <div class="text-xs text-gray-500 truncate">{{ $devis->reference }} · {{ $devis->created_at->diffForHumans() }}</div>
                        </div>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full whitespace-nowrap
                                     {{ $devis->statut === 'nouveau' ? 'bg-blue-100 text-blue-700' : '' }}
                                     {{ $devis->statut === 'en_cours' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                     {{ $devis->statut === 'traite' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                     {{ $devis->statut === 'refuse' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ str_replace('_', ' ', $devis->statut) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500 text-sm">Aucun devis pour le moment.</div>
            @endforelse
        </div>

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-900">Derniers messages</h2>
                <a href="{{ route('admin.messages') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline">Tout voir</a>
            </div>
            @forelse($derniers_messages as $msg)
                <div class="p-4 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition {{ !$msg->lu ? 'bg-amber-50/40' : '' }}">
                    <div class="flex justify-between items-start gap-3">
                        <div class="min-w-0">
                            <div class="font-semibold text-gray-900 truncate">{{ $msg->nom }}</div>
                            <div class="text-xs text-gray-500 truncate">{{ $msg->sujet }}</div>
                            <div class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</div>
                        </div>
                        @if(!$msg->lu)
                            <span class="w-2 h-2 bg-amber-500 rounded-full flex-shrink-0 mt-2" title="Non lu"></span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500 text-sm">Aucun message pour le moment.</div>
            @endforelse
        </div>
    </div>

    {{-- ============ GRAPHIQUES (NOUVEAU) ============ --}}
    @php
        // ---------- Données mensuelles ----------
        $devisParMois     = $devisParMois     ?? [];
        $messagesParMois  = $messagesParMois  ?? [];
        $devisParMois     = is_array($devisParMois)    ? $devisParMois    : [];
        $messagesParMois  = is_array($messagesParMois) ? $messagesParMois : [];

        // ---------- Répartition des devis ----------
        // Priorité 1 : variable fournie par le contrôleur
        $repartitionDevis = $repartitionDevis ?? [];
        $repartitionDevis = is_array($repartitionDevis) ? $repartitionDevis : [];

        // Priorité 2 (fallback) : reconstruction depuis $stats si les clés existent
        if (empty($repartitionDevis)) {
            $repartitionDevis = array_filter([
                'nouveau'  => $stats['devis_nouveaux'] ?? null,
                'en_cours' => $stats['devis_en_cours'] ?? null,
                'traite'   => $stats['devis_traites']  ?? null,
                'refuse'   => $stats['devis_refuses']  ?? null,
            ], fn ($v) => $v !== null && $v !== '');
        }

        // Priorité 3 (dernier recours) : au moins le total, pour ne jamais afficher "Aucune répartition"
        if (empty($repartitionDevis) && (int) ($stats['devis_total'] ?? 0) > 0) {
            $repartitionDevis = ['total' => (int) $stats['devis_total']];
        }

        // ---------- Calculs ----------
        $maxDevis    = count($devisParMois)    ? max(array_values($devisParMois))    : 0;
        $maxMessages = count($messagesParMois) ? max(array_values($messagesParMois)) : 0;
        $maxGlobal   = max($maxDevis, $maxMessages, 1);

        $totalRepartition = array_sum($repartitionDevis) ?: 1;

        $statutColors = [
            'nouveau'  => ['bg' => 'bg-blue-500',    'label' => 'Nouveau'],
            'en_cours' => ['bg' => 'bg-yellow-500',  'label' => 'En cours'],
            'traite'   => ['bg' => 'bg-emerald-500', 'label' => 'Traité'],
            'refuse'   => ['bg' => 'bg-red-500',     'label' => 'Refusé'],
        ];
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

        {{-- Graphique 1 : Devis & Messages par mois (barres groupées) --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-900">Activité mensuelle</h2>
                <div class="flex items-center gap-3 text-xs text-gray-500">
                    <span class="inline-flex items-center gap-1">
                        <span class="w-2.5 h-2.5 rounded-sm bg-blue-500"></span> Devis
                    </span>
                    <span class="inline-flex items-center gap-1">
                        <span class="w-2.5 h-2.5 rounded-sm bg-amber-500"></span> Messages
                    </span>
                </div>
            </div>

            @if(count($devisParMois) || count($messagesParMois))
                <div class="p-5">
                    <div class="flex items-end justify-between gap-2 h-48">
                        @php
                            $mois = array_keys($devisParMois + $messagesParMois);
                        @endphp
                        @foreach($mois as $m)
                            @php
                                $d   = (int) ($devisParMois[$m]    ?? 0);
                                $msg = (int) ($messagesParMois[$m] ?? 0);
                                $hD  = $maxGlobal ? round(($d   / $maxGlobal) * 100) : 0;
                                $hM  = $maxGlobal ? round(($msg / $maxGlobal) * 100) : 0;
                            @endphp
                            <div class="flex-1 flex flex-col items-center gap-1 min-w-0">
                                <div class="w-full flex items-end justify-center gap-1 h-40">
                                    <div class="w-1/2 max-w-[14px] bg-blue-500 rounded-t transition-all duration-500 hover:bg-blue-600"
                                         style="height: {{ max($hD, 2) }}%"
                                         title="Devis {{ $m }} : {{ $d }}"></div>
                                    <div class="w-1/2 max-w-[14px] bg-amber-500 rounded-t transition-all duration-500 hover:bg-amber-600"
                                         style="height: {{ max($hM, 2) }}%"
                                         title="Messages {{ $m }} : {{ $msg }}"></div>
                                </div>
                                <span class="text-[10px] text-gray-500 truncate w-full text-center">{{ $m }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="p-8 text-center text-gray-500 text-sm">Aucune donnée mensuelle disponible.</div>
            @endif
        </div>

        {{-- Graphique 2 : Répartition des devis par statut (barres horizontales) --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-900">Répartition des devis</h2>
                <a href="{{ route('admin.devis') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline">Détails</a>
            </div>

            @if(count($repartitionDevis))
                <div class="p-5 space-y-4">
                    {{-- Cas normal : barres par statut connu --}}
                    @foreach($statutColors as $statut => $meta)
                        @if(array_key_exists($statut, $repartitionDevis))
                            @php
                                $count = (int) ($repartitionDevis[$statut] ?? 0);
                                $pct   = round(($count / $totalRepartition) * 100);
                            @endphp
                            <div>
                                <div class="flex justify-between items-center mb-1.5">
                                    <span class="text-sm font-medium text-gray-700">{{ $meta['label'] }}</span>
                                    <span class="text-xs text-gray-500">{{ $count }} · {{ $pct }}%</span>
                                </div>
                                <div class="w-full h-2.5 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="{{ $meta['bg'] }} h-full rounded-full transition-all duration-500"
                                         style="width: {{ $pct }}%"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- Cas fallback : uniquement le total (barre indigo pleine) --}}
                    @if(isset($repartitionDevis['total']) && !array_intersect(array_keys($repartitionDevis), array_keys($statutColors)))
                        <div>
                            <div class="flex justify-between items-center mb-1.5">
                                <span class="text-sm font-medium text-gray-700">Total devis</span>
                                <span class="text-xs text-gray-500">{{ (int) $repartitionDevis['total'] }} · 100%</span>
                            </div>
                            <div class="w-full h-2.5 bg-gray-100 rounded-full overflow-hidden">
                                <div class="bg-indigo-500 h-full rounded-full" style="width: 100%"></div>
                            </div>
                            <p class="text-xs text-gray-400 mt-2">
                                Répartition par statut non disponible — ajoutez <code class="text-gray-600">$repartitionDevis</code> dans le contrôleur.
                            </p>
                        </div>
                    @endif
                </div>
            @else
                <div class="p-8 text-center text-gray-500 text-sm">Aucune répartition disponible.</div>
            @endif
        </div>
    </div>
</div>