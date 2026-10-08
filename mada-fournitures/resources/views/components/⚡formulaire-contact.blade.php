<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Contact;

// ⬇⬇⬇ AJOUT 1 : Imports pour les emails
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactRecuClient;
use App\Mail\ContactRecuAdmin;

new #[Layout('components.layouts.app')] #[Title('Contact - Mada Fournitures')] class extends Component
{
    public string $nom = '';
    public string $email = '';
    public string $telephone = '';
    public string $sujet = '';
    public string $message = '';

    protected $rules = [
        'nom'       => 'required|min:3|max:100',
        'email'     => 'required|email',
        'telephone' => 'nullable|min:8|max:20',
        'sujet'     => 'required|min:3|max:150',
        'message'   => 'required|min:10',
    ];

    protected $messages = [
        'nom.required'     => 'Veuillez saisir votre nom.',
        'nom.min'          => 'Le nom doit contenir au moins 3 caractères.',
        'email.required'   => 'Veuillez saisir votre email.',
        'email.email'      => 'Veuillez saisir un email valide.',
        'sujet.required'   => 'Veuillez saisir un sujet.',
        'sujet.min'        => 'Le sujet doit contenir au moins 3 caractères.',
        'message.required' => 'Veuillez saisir votre message.',
        'message.min'      => 'Le message doit contenir au moins 10 caractères.',
    ];

    public function envoyer()
    {
        $this->validate();

        $contact = Contact::create([
            'nom'       => $this->nom,
            'email'     => $this->email,
            'telephone' => $this->telephone,
            'sujet'     => $this->sujet,
            'message'   => $this->message,
        ]);

        // ⬇⬇⬇ AJOUT 2 : Envoi des emails (juste après Contact::create)
        try {
            Mail::to($contact->email)->send(new ContactRecuClient($contact));
            Mail::to(config('mail.admin_address'))->send(new ContactRecuAdmin($contact));
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email contact : ' . $e->getMessage());
        }
        // ⬆⬆⬆ FIN AJOUT 2

        $this->reset(['nom', 'email', 'telephone', 'sujet', 'message']);

        session()->flash('contact_success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }

    public function render()
    {
        return view('livewire.formulaire-contact');
    }
};
?>