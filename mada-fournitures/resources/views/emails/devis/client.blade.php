@component('mail::message')
# Merci pour votre demande de devis

Bonjour **{{ $devis->nom_client }}**,

Nous avons bien reçu votre demande de devis **{{ $devis->reference }}** du {{ $devis->created_at->format('d/m/Y à H:i') }}.

Notre équipe vous répondra dans les plus brefs délais (sous 24h ouvrées).

@component('mail::panel')
**Récapitulatif de votre demande**

@foreach($devis->items as $item)
- {{ $item->produit->nom }} — Quantité : {{ $item->quantite }}
@endforeach
@endcomponent

Si vous avez des questions, n'hésitez pas à nous contacter :

📞 +261 34 00 000 00  
📧 contact@madafournitures.mg

Merci de votre confiance,  
**L'équipe Mada Fournitures**
@endcomponent