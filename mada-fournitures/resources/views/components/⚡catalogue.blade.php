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

    // Catégorie
    #[Url(as: 'cat', history: true)]
    public ?string $slug = null;

    public ?int $categorieId = null;

    // Recherche produit
    #[Url(as: 'q', history: true)]
    public string $recherche = '';

    // Filtres
    #[Url(as: 'prix_min', history: true)]
    public ?int $prixMin = null;

    #[Url(as: 'prix_max', history: true)]
    public ?int $prixMax = null;

    #[Url(as: 'stock', history: true)]
    public bool $enStock = false;

    #[Url(as: 'unite', history: true)]
    public string $unite = '';

    public function mount(?string $slug = null)
    {
        $this->slug = $slug;

        if ($slug) {
            $categorie = Categorie::where('slug', $slug)->firstOrFail();
            $this->categorieId = $categorie->id;
        }
    }

    // Reset pagination à chaque changement de filtre
    public function updatingRecherche() { $this->resetPage(); }
    public function updatingPrixMin() { $this->resetPage(); }
    public function updatingPrixMax() { $this->resetPage(); }
    public function updatingEnStock() { $this->resetPage(); }
    public function updatingUnite() { $this->resetPage(); }

    public function appliquerPrix()
    {
        $this->validate([
            'prixMin' => 'nullable|integer|min:0',
            'prixMax' => 'nullable|integer|min:0',
        ]);

        $this->resetPage();
    }

    public function resetFiltres()
    {
        $this->recherche = '';
        $this->prixMin = null;
        $this->prixMax = null;
        $this->enStock = false;
        $this->unite = '';
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
            ->when($this->prixMin !== null, fn($q) => $q->where('prix_indicatif', '>=', $this->prixMin))
            ->when($this->prixMax !== null, fn($q) => $q->where('prix_indicatif', '<=', $this->prixMax))
            ->when($this->enStock, fn($q) => $q->where('stock', '>', 0))
            ->when($this->unite, fn($q) => $q->where('unite', $this->unite))
            ->actif()
            ->orderBy('nom')
            ->paginate(12);

        return view('livewire.catalogue', [
            'categorie'         => $categorie,
            'produits'          => $produits,
            'categories'        => Categorie::actif()->ordonne()->withCount('produits')->get(),
            'unitesDisponibles' => Produit::actif()->distinct()->pluck('unite')->sort()->values(),
        ]);
    }
};
?>