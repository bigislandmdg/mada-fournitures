@component('mail::message')
# Merci de nous avoir contactés

Bonjour **{{ $contact->nom }}**,

Nous avons bien reçu votre message et nous vous répondrons dans les plus brefs délais.

@component('mail::panel')
**Sujet :** {{ $contact->sujet }}

{{ $contact->message }}
@endcomponent

Cordialement,  
**L'équipe Mada Fournitures**
@endcomponent