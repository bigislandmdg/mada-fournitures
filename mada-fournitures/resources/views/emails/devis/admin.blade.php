@component('mail::message')
# 🔔 Nouveau devis reçu

Un nouveau devis vient d'être soumis sur le site.

@component('mail::panel')
**Référence :** {{ $devis->reference }}  
**Client :** {{ $devis->nom_client }}  
@if($devis->societe)**Société :** {{ $devis->societe }}  @endif
**Email :** {{ $devis->email }}  
**Téléphone :** {{ $devis->telephone }}  
@if($devis->adresse)**Adresse :** {{ $devis->adresse }}  @endif
@endcomponent

**Produits demandés :**

@foreach($devis->items as $item)
- {{ $item->produit->nom }} × {{ $item->quantite }}
@endforeach

@if($devis->message)
**Message du client :**

> {{ $devis->message }}
@endif

@component('mail::button', ['url' => $urlAdmin, 'color' => 'primary'])
Voir le devis dans l'admin
@endcomponent

@endcomponent