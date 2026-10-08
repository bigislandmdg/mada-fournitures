<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Produit;

new #[Layout('components.layouts.app')] class extends Component
{
    public Produit $produit;

    public int $quantite = 1;

    public function mount(string $slug)
    {
        $this->produit = Produit::with('categorie')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function ajouterAuDevis()
    {
        $panier = session()->get('panier', []);

        $id = $this->produit->id;
        $panier[$id] = ($panier[$id] ?? 0) + $this->quantite;

        session()->put('panier', $panier);

        $this->dispatch('panier-mis-a-jour', count: array_sum($panier));
        session()->flash('success', 'Produit ajouté à votre demande de devis.');
    }

    public function render()
    {
        return view('livewire.fiche-produit', [
            'similaires' => Produit::where('categorie_id', $this->produit->categorie_id)
                ->where('id', '!=', $this->produit->id)
                ->actif()
                ->take(4)
                ->get(),
        ]);
    }
};
?>