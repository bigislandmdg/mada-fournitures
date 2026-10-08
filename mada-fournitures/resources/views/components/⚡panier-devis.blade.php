<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Produit;
use App\Models\Devis;
use App\Models\DevisItem;

// ⬇⬇⬇ AJOUT 1 : Imports pour les emails (à ajouter en haut)
use Illuminate\Support\Facades\Mail;
use App\Mail\DevisRecuClient;
use App\Mail\DevisRecuAdmin;

new #[Layout('components.layouts.app')] #[Title('Demander un devis - Mada Fournitures')] class extends Component
{
    public array $items = [];

    public string $nom_client = '';
    public string $societe = '';
    public string $email = '';
    public string $telephone = '';
    public string $adresse = '';
    public string $message = '';

    protected $rules = [
        'nom_client' => 'required|min:3|max:100',
        'email'      => 'required|email',
        'telephone'  => 'required|min:8|max:20',
        'items'      => 'required|array|min:1',
    ];

    protected $messages = [
        'nom_client.required' => 'Veuillez saisir votre nom.',
        'email.required'      => 'Veuillez saisir votre email.',
        'email.email'         => 'Veuillez saisir un email valide.',
        'telephone.required'  => 'Veuillez saisir votre téléphone.',
        'items.required'      => 'Votre panier est vide. Ajoutez au moins un produit.',
    ];

    public function mount()
    {
        $this->items = session()->get('panier', []);
    }

    public function supprimer(int $produitId)
    {
        unset($this->items[$produitId]);
        session()->put('panier', $this->items);
    }

    public function changerQuantite(int $produitId, int $quantite)
    {
        if ($quantite <= 0) {
            $this->supprimer($produitId);
            return;
        }
        $this->items[$produitId] = $quantite;
        session()->put('panier', $this->items);
    }

    public function vider()
    {
        $this->items = [];
        session()->forget('panier');
    }

    public function envoyer()
    {
        $this->validate();

        $devis = Devis::create([
            'reference'  => Devis::genererReference(),
            'nom_client' => $this->nom_client,
            'societe'    => $this->societe,
            'email'      => $this->email,
            'telephone'  => $this->telephone,
            'adresse'    => $this->adresse,
            'message'    => $this->message,
            'statut'     => 'nouveau',
        ]);

        foreach ($this->items as $produitId => $quantite) {
            DevisItem::create([
                'devis_id'   => $devis->id,
                'produit_id' => $produitId,
                'quantite'   => $quantite,
            ]);
        }

        // ⬇⬇⬇ AJOUT 2 : Envoi des emails (JUSTE APRÈS la création des items)
        // ⬇⬇⬇ ET AVANT session()->forget('panier')
        try {
            Mail::to($devis->email)->send(new DevisRecuClient($devis));
            Mail::to(config('mail.admin_address'))->send(new DevisRecuAdmin($devis));
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email devis : ' . $e->getMessage());
        }
        // ⬆⬆⬆ FIN AJOUT 2

        session()->forget('panier');

        session()->flash('devis_reference', $devis->reference);

        return redirect()->route('devis')->with('success', true);
    }

    public function render()
    {
        $produits = Produit::with('categorie')
            ->whereIn('id', array_keys($this->items))
            ->get();

        $total = $produits->sum(fn($p) => ($p->prix_indicatif ?? 0) * ($this->items[$p->id] ?? 0));

        return view('livewire.panier-devis', [
            'produits' => $produits,
            'total'    => $total,
        ]);
    }
};
?>