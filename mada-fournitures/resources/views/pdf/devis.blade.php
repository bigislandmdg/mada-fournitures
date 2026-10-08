<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis {{ $devis->reference }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #333;
            padding: 30px;
            line-height: 1.5;
        }
        .header {
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2563eb;
            font-size: 26px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .header .subtitle {
            color: #666;
            font-size: 11px;
            line-height: 1.6;
        }
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }
        .info-col {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding-right: 15px;
        }
        .info-col h3 {
            font-size: 11px;
            color: #2563eb;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }
        .info-col p {
            font-size: 11px;
            line-height: 1.7;
        }
        .info-col strong { color: #111; }
        .ref {
            background: #f3f4f6;
            padding: 15px 20px;
            margin-bottom: 30px;
            border-left: 4px solid #2563eb;
        }
        .ref strong {
            color: #2563eb;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        thead {
            display: table-header-group;
        }
        th {
            background: #2563eb;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 11px;
            font-weight: bold;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 11px;
            vertical-align: top;
        }
        tr:nth-child(even) td {
            background: #fafafa;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .total {
            text-align: right;
            margin-top: 20px;
            padding: 15px 20px;
            background: #f3f4f6;
            border-radius: 4px;
        }
        .total strong {
            font-size: 18px;
            color: #2563eb;
        }
        .message-client {
            margin-top: 30px;
            padding: 15px;
            background: #f9fafb;
            border-left: 3px solid #9ca3af;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 10px;
            color: #666;
            text-align: center;
            line-height: 1.6;
        }
        .legal {
            margin-top: 15px;
            padding: 10px;
            background: #fffbeb;
            border-left: 3px solid #f59e0b;
            font-size: 9px;
            color: #92400e;
        }
    </style>
</head>
<body>

    {{-- ============ EN-TÊTE ============ --}}
    <div class="header">
        <h1>Mada Fournitures</h1>
        <div class="subtitle">
            Des solutions fiables pour vos besoins professionnels et marchés publics<br>
            Antananarivo, Madagascar &middot; +261 34 00 000 00 &middot; contact@madafournitures.mg
        </div>
    </div>

    {{-- ============ RÉFÉRENCE ============ --}}
    <div class="ref">
        <strong>DEVIS N° {{ $devis->reference }}</strong><br>
        <span style="color: #555;">
            Date : {{ $devis->created_at->format('d/m/Y à H:i') }} &middot;
            Statut : {{ ucfirst(str_replace('_', ' ', $devis->statut)) }}
        </span>
    </div>

    {{-- ============ INFOS CLIENT / ÉMETTEUR ============ --}}
    <div class="info-grid">
        <div class="info-col">
            <h3>Client</h3>
            <p>
                <strong>{{ $devis->nom_client }}</strong><br>
                @if($devis->societe){{ $devis->societe }}<br>@endif
                {{ $devis->email }}<br>
                {{ $devis->telephone }}<br>
                @if($devis->adresse){{ $devis->adresse }}@endif
            </p>
        </div>
        <div class="info-col">
            <h3>Émetteur</h3>
            <p>
                <strong>Mada Fournitures</strong><br>
                Antananarivo, Madagascar<br>
                NIF : XXX XXX XXX<br>
                STAT : XXX XXX XXX<br>
                contact@madafournitures.mg
            </p>
        </div>
    </div>

    {{-- ============ TABLEAU PRODUITS ============ --}}
    <table>
        <thead>
            <tr>
                <th style="width: 45%">Produit</th>
                <th style="width: 20%">Catégorie</th>
                <th style="width: 15%" class="text-center">Quantité</th>
                <th style="width: 20%" class="text-right">Prix unitaire</th>
            </tr>
        </thead>
        <tbody>
            @foreach($devis->items as $item)
                <tr>
                    <td>
                        <strong>{{ $item->produit->nom ?? 'Produit supprimé' }}</strong>
                        @if($item->produit && $item->produit->description)
                            <br>
                            <span style="color:#666; font-size: 10px;">
                                {{ \Illuminate\Support\Str::limit($item->produit->description, 100) }}
                            </span>
                        @endif
                        @if($item->remarque)
                            <br>
                            <span style="color:#666; font-size: 10px; font-style: italic;">
                                « {{ $item->remarque }} »
                            </span>
                        @endif
                    </td>
                    <td>{{ $item->produit->categorie->nom ?? '—' }}</td>
                    <td class="text-center">{{ $item->quantite }}</td>
                    <td class="text-right">
                        @if($item->produit && $item->produit->prix_indicatif)
                            {{ number_format($item->produit->prix_indicatif, 0, ',', ' ') }} Ar
                        @else
                            —
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ============ TOTAL ============ --}}
    @php
        $total = $devis->items->sum(function($item) {
            return ($item->produit->prix_indicatif ?? 0) * $item->quantite;
        });
    @endphp

    @if($total > 0)
        <div class="total">
            <div style="font-size: 10px; color: #666; margin-bottom: 5px;">
                Estimation indicative TTC
            </div>
            <strong>{{ number_format($total, 0, ',', ' ') }} Ar</strong>
            <div style="font-size: 9px; color: #666; margin-top: 5px;">
                Ce montant est une estimation. Le devis définitif vous sera transmis après validation.
            </div>
        </div>
    @endif

    {{-- ============ MESSAGE CLIENT ============ --}}
    @if($devis->message)
        <div class="message-client">
            <strong style="font-size: 11px;">Message du client :</strong>
            <p style="font-size: 11px; margin-top: 5px;">{{ $devis->message }}</p>
        </div>
    @endif

    {{-- ============ MENTIONS LÉGALES ============ --}}
    <div class="legal">
        <strong>Conditions :</strong>
        Ce devis est valable 30 jours à compter de sa date d'émission.
        Les prix indiqués sont donnés à titre indicatif et peuvent varier selon les quantités
        et la disponibilité des produits. La commande sera confirmée après validation de votre part.
    </div>

    {{-- ============ PIED DE PAGE ============ --}}
    <div class="footer">
        Mada Fournitures — Tous droits réservés {{ date('Y') }}<br>
        Document généré automatiquement le {{ now()->format('d/m/Y à H:i') }}
    </div>

</body>
</html>