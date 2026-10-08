<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use App\Models\Categorie;
use App\Models\Produit;
use Livewire\WithPagination;

new #[Layout('components.layouts.app')] #[Title('Nos fournitures - Mada Fournitures')] class extends Component
{
    use WithPagination;

    #[Url(as: 'cat', history: true)]
    public ?string $slug = null;

    #[Url(as: 'q', history: true)]
    public string $recherche = '';

    public ?int $categorieId = null;

    public function mount(?string $slug = null)
    {
        $this->slug = $slug;

        if ($slug) {
            $categorie = Categorie::where('slug', $slug)->firstOrFail();
            $this->categorieId = $categorie->id;
        }
    }

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    public function resetFiltres()
    {
        $this->recherche = '';
        $this->resetPage();
    }

    public function render()
    {
        $categorie = $this->slug
            ? Categorie::where('slug', $this->slug)->first()
            : null;

        $produits = Produit::query()
            ->with('categorie')
            ->when($this->categorieId, fn($q) => $q->where('categorie_id', $this->categorieId))
            ->when($this->recherche, fn($q) => $q->recherche($this->recherche))
            ->actif()
            ->orderBy('nom')
            ->paginate(12);

        return view('livewire.catalogue', [
            'categorie'  => $categorie,
            'produits'   => $produits,
            'categories' => Categorie::actif()->ordonne()->get(),
        ]);
    }
};
?>