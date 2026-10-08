<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

new #[Layout('components.layouts.admin')] #[Title('Produits')] class extends Component
{
    use WithPagination, WithFileUploads;

    public string $recherche = '';

    // ============ MODAL CRÉATION/ÉDITION ============
    public bool $showModal = false;
    public ?int $editingId = null;

    public string $nom = '';
    public ?int $categorie_id = null;
    public string $description = '';
    public string $unite = 'pièce';
    public ?float $prix_indicatif = null;
    public int $stock = 0;
    public bool $actif = true;
    public $image = null;
    public ?string $image_actuelle = null;

    // ============ MODAL SUPPRESSION ============
    public bool $showDeleteModal = false;
    public ?int $deleteTargetId = null;
    public string $deleteTargetName = '';

    protected $rules = [
        'nom'            => 'required|min:2|max:150',
        'categorie_id'   => 'required|exists:categories,id',
        'unite'          => 'required|max:30',
        'prix_indicatif' => 'nullable|numeric|min:0',
        'stock'          => 'required|integer|min:0',
        'image'          => 'nullable|image|max:2048',
    ];

    protected $messages = [
        'nom.required'          => 'Le nom est obligatoire.',
        'nom.min'               => 'Le nom doit contenir au moins 2 caractères.',
        'categorie_id.required' => 'Veuillez choisir une catégorie.',
        'categorie_id.exists'   => 'La catégorie sélectionnée n\'existe pas.',
        'unite.required'        => 'L\'unité est obligatoire.',
        'image.image'           => 'Le fichier doit être une image.',
        'image.max'             => 'L\'image ne doit pas dépasser 2 Mo.',
    ];

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    // ============ CRÉATION / ÉDITION ============

    public function ouvrirModal(?int $id = null)
    {
        $this->resetValidation();
        $this->reset([
            'nom', 'categorie_id', 'description', 'unite',
            'prix_indicatif', 'stock', 'actif', 'image', 'image_actuelle'
        ]);
        $this->unite = 'pièce';
        $this->actif = true;
        $this->editingId = $id;

        if ($id) {
            $produit = Produit::findOrFail($id);
            $this->nom = $produit->nom;
            $this->categorie_id = $produit->categorie_id;
            $this->description = $produit->description ?? '';
            $this->unite = $produit->unite;
            $this->prix_indicatif = $produit->prix_indicatif;
            $this->stock = $produit->stock;
            $this->actif = $produit->actif;
            $this->image_actuelle = $produit->image;
        }

        $this->showModal = true;
    }

    public function fermerModal()
    {
        $this->showModal = false;
        $this->reset([
            'nom', 'categorie_id', 'description', 'unite',
            'prix_indicatif', 'stock', 'actif', 'image',
            'image_actuelle', 'editingId'
        ]);
        $this->resetValidation();
    }

    public function enregistrer()
    {
        $this->validate();

        $data = [
            'nom'            => $this->nom,
            'categorie_id'   => $this->categorie_id,
            'description'    => $this->description,
            'unite'          => $this->unite,
            'prix_indicatif' => $this->prix_indicatif,
            'stock'          => $this->stock,
            'actif'          => $this->actif,
        ];

        if ($this->image) {
            if ($this->editingId && $this->image_actuelle) {
                Storage::disk('public')->delete($this->image_actuelle);
            }
            $data['image'] = $this->image->store('produits', 'public');
        }

        if ($this->editingId) {
            $produit = Produit::findOrFail($this->editingId);
            if ($this->nom !== $produit->nom) {
                $data['slug'] = Str::slug($this->nom) . '-' . uniqid();
            }
            $produit->update($data);
            session()->flash('success', 'Produit modifié avec succès.');
        } else {
            $data['slug'] = Str::slug($this->nom) . '-' . uniqid();
            Produit::create($data);
            session()->flash('success', 'Produit créé avec succès.');
        }

        $this->fermerModal();
        $this->resetPage();
    }

    // ============ SUPPRESSION (avec modal) ============

    public function confirmerSuppression(int $id)
    {
        $produit = Produit::findOrFail($id);
        $this->deleteTargetId = $id;
        $this->deleteTargetName = $produit->nom;
        $this->showDeleteModal = true;
    }

    public function annulerSuppression()
    {
        $this->showDeleteModal = false;
        $this->deleteTargetId = null;
        $this->deleteTargetName = '';
    }

    public function supprimer()
    {
        if (!$this->deleteTargetId) {
            return;
        }

        $produit = Produit::findOrFail($this->deleteTargetId);

        // Supprimer l'image associée
        if ($produit->image) {
            Storage::disk('public')->delete($produit->image);
        }

        $produit->delete();

        session()->flash('success', 'Produit supprimé avec succès.');

        $this->annulerSuppression();
        $this->resetPage();
    }

    // ============ ACTIONS RAPIDES ============

    public function toggleActif(int $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->update(['actif' => !$produit->actif]);
    }

    // ============ RENDER ============

    public function render()
    {
        $produits = Produit::with('categorie')
            ->when($this->recherche, function ($q) {
                $q->where(function ($query) {
                    $query->where('nom', 'like', "%{$this->recherche}%")
                          ->orWhere('description', 'like', "%{$this->recherche}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.produit-table', [
            'produits'   => $produits,
            'categories' => Categorie::ordonne()->get(),
        ]);
    }
};
?>