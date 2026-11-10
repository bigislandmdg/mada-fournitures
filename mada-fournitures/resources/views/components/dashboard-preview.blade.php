@props(['class' => ''])

<svg {{ $attributes->merge(['class' => $class]) }}
     viewBox="0 0 600 420"
     xmlns="http://www.w3.org/2000/svg"
     role="img"
     aria-label="Aperçu du tableau de bord Mada Fournitures"
     preserveAspectRatio="xMidYMid meet">
    {{-- Fond --}}
    <rect width="600" height="420" fill="#f8fafc"/>
    <rect x="0" y="0" width="600" height="48" fill="#1e40af"/>

    {{-- Barre supérieure (logo + salutation) --}}
    <rect x="16" y="14" width="20" height="20" rx="5" fill="#3b82f6"/>
    <text x="26" y="28" font-family="Segoe UI, Arial" font-size="9" fill="#ffffff" text-anchor="middle" font-weight="700">MF</text>
    <text x="46" y="27" font-family="Segoe UI, Arial" font-size="10" fill="#ffffff" font-weight="600">Tableau de bord</text>
    <circle cx="560" cy="24" r="10" fill="#bfdbfe"/>
    <text x="560" y="27" font-family="Segoe UI, Arial" font-size="9" fill="#1e3a8a" text-anchor="middle" font-weight="700">A</text>

    {{-- 4 cartes stats (toutes en bleu) --}}
    <g font-family="Segoe UI, Arial">
        {{-- Carte 1 : Produits --}}
        <rect x="20" y="68" width="130" height="70" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <rect x="32" y="80" width="24" height="24" rx="6" fill="#dbeafe"/>
        <circle cx="44" cy="92" r="5" fill="#2563eb"/>
        <text x="66" y="92" font-size="8" fill="#6b7280">Produits</text>
        <text x="32" y="124" font-size="18" fill="#111827" font-weight="700">128</text>

        {{-- Carte 2 : Catégories --}}
        <rect x="163" y="68" width="130" height="70" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <rect x="175" y="80" width="24" height="24" rx="6" fill="#dbeafe"/>
        <circle cx="187" cy="92" r="5" fill="#2563eb"/>
        <text x="209" y="92" font-size="8" fill="#6b7280">Catégories</text>
        <text x="175" y="124" font-size="18" fill="#111827" font-weight="700">12</text>

        {{-- Carte 3 : Devis --}}
        <rect x="306" y="68" width="130" height="70" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <rect x="318" y="80" width="24" height="24" rx="6" fill="#dbeafe"/>
        <circle cx="330" cy="92" r="5" fill="#2563eb"/>
        <text x="352" y="92" font-size="8" fill="#6b7280">Devis</text>
        <text x="318" y="124" font-size="18" fill="#111827" font-weight="700">47</text>

        {{-- Carte 4 : Messages --}}
        <rect x="449" y="68" width="130" height="70" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <rect x="461" y="80" width="24" height="24" rx="6" fill="#dbeafe"/>
        <circle cx="473" cy="92" r="5" fill="#2563eb"/>
        <text x="495" y="92" font-size="8" fill="#6b7280">Messages</text>
        <text x="461" y="124" font-size="18" fill="#111827" font-weight="700">23</text>
    </g>

    {{-- Graphique 1 : Activité mensuelle (barres bleues, nuances) --}}
    <g>
        <rect x="20" y="152" width="280" height="150" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <text x="34" y="172" font-family="Segoe UI, Arial" font-size="9" fill="#374151" font-weight="700">Activité mensuelle</text>
        <circle cx="230" cy="169" r="3" fill="#3b82f6"/>
        <text x="238" y="172" font-family="Segoe UI, Arial" font-size="7" fill="#6b7280">Devis</text>
        <circle cx="265" cy="169" r="3" fill="#93c5fd"/>
        <text x="273" y="172" font-family="Segoe UI, Arial" font-size="7" fill="#6b7280">Msg</text>

        @php
            $bars = [
                [30, 40, 30], [70, 60, 45], [110, 50, 55], [150, 75, 40],
                [190, 65, 70], [230, 85, 55], [270, 70, 60],
            ];
            $mois = ['J', 'F', 'M', 'A', 'M', 'J', 'J'];
        @endphp
        @foreach($bars as $i => $b)
            @php [$x, $hBlue, $hLight] = $b; @endphp
            <rect x="{{ $x }}" y="{{ 280 - $hBlue }}" width="10" height="{{ $hBlue }}" rx="2" fill="#2563eb"/>
            <rect x="{{ $x + 13 }}" y="{{ 280 - $hLight }}" width="10" height="{{ $hLight }}" rx="2" fill="#93c5fd"/>
            <text x="{{ $x + 11 }}" y="292" font-family="Segoe UI, Arial" font-size="6" fill="#9ca3af" text-anchor="middle">{{ $mois[$i] }}</text>
        @endforeach
        <line x1="20" y1="280" x2="300" y2="280" stroke="#e5e7eb" stroke-width="1"/>
    </g>

    {{-- Graphique 2 : Répartition des devis (nuances de bleu) --}}
    <g>
        <rect x="310" y="152" width="270" height="150" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <text x="324" y="172" font-family="Segoe UI, Arial" font-size="9" fill="#374151" font-weight="700">Répartition des devis</text>

        @php
            $rep = [
                ['Nouveau',  70, '#1d4ed8', '18'], // blue-700
                ['En cours', 50, '#3b82f6', '12'], // blue-500
                ['Traité',   85, '#60a5fa', '30'], // blue-400
                ['Refusé',   20, '#93c5fd', '5'],  // blue-300
            ];
        @endphp
        @foreach($rep as $i => $r)
            @php [$label, $w, $color, $count] = $r; @endphp
            @php $y = 190 + $i * 26; @endphp
            <text x="324" y="{{ $y }}" font-family="Segoe UI, Arial" font-size="8" fill="#374151">{{ $label }}</text>
            <text x="565" y="{{ $y }}" font-family="Segoe UI, Arial" font-size="7" fill="#6b7280" text-anchor="end">{{ $count }}</text>
            <rect x="324" y="{{ $y + 4 }}" width="240" height="6" rx="3" fill="#eff6ff"/>
            <rect x="324" y="{{ $y + 4 }}" width="{{ $w * 2.4 }}" height="6" rx="3" fill="{{ $color }}"/>
        @endforeach
    </g>

    {{-- Derniers devis / messages (badges bleus) --}}
    <g font-family="Segoe UI, Arial">
        <rect x="20" y="318" width="280" height="82" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <text x="34" y="336" font-size="9" fill="#374151" font-weight="700">Derniers devis</text>
        @php
            $devis = [
                ['Rakoto J.', 'DEV-001', '#dbeafe', '#1e40af', 'nouveau'],
                ['Rasoa M.',  'DEV-002', '#bfdbfe', '#1e40af', 'en cours'],
                ['Andry T.',  'DEV-003', '#eff6ff', '#1e40af', 'traité'],
            ];
        @endphp
        @foreach($devis as $i => $d)
            @php [$nom, $ref, $bg, $fg, $statut] = $d; @endphp
            @php $y = 350 + $i * 16; @endphp
            <text x="34" y="{{ $y }}" font-size="8" fill="#111827" font-weight="600">{{ $nom }}</text>
            <text x="34" y="{{ $y + 8 }}" font-size="6" fill="#9ca3af">{{ $ref }}</text>
            <rect x="230" y="{{ $y - 7 }}" width="56" height="12" rx="6" fill="{{ $bg }}"/>
            <text x="258" y="{{ $y + 2 }}" font-size="6" fill="{{ $fg }}" text-anchor="middle">{{ $statut }}</text>
        @endforeach

        <rect x="310" y="318" width="270" height="82" rx="10" fill="#ffffff" stroke="#e5e7eb"/>
        <text x="324" y="336" font-size="9" fill="#374151" font-weight="700">Derniers messages</text>
        @php
            $messages = [
                ['Hery R.',  'Demande de devis',   false],
                ['Soa N.',   'Disponibilité stock', true],
                ['Tiana L.', 'Livraison',          false],
            ];
        @endphp
        @foreach($messages as $i => $m)
            @php [$nom, $sujet, $lu] = $m; @endphp
            @php $y = 350 + $i * 16; @endphp
            <text x="324" y="{{ $y }}" font-size="8" fill="#111827" font-weight="600">{{ $nom }}</text>
            <text x="324" y="{{ $y + 8 }}" font-size="6" fill="#9ca3af">{{ $sujet }}</text>
            @if(!$lu)
                <circle cx="568" cy="{{ $y - 2 }}" r="3" fill="#3b82f6"/>
            @endif
        @endforeach
    </g>
</svg>
