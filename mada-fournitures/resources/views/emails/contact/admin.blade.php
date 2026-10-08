@component('mail::message')
# 🔔 Nouveau message de contact

@component('mail::panel')
**Nom :** {{ $contact->nom }}  
**Email :** {{ $contact->email }}  
@if($contact->telephone)**Téléphone :** {{ $contact->telephone }}  @endif
**Sujet :** {{ $contact->sujet }}
@endcomponent

**Message :**

> {{ $contact->message }}

@component('mail::button', ['url' => $urlAdmin, 'color' => 'primary'])
Voir dans l'admin
@endcomponent

@endcomponent