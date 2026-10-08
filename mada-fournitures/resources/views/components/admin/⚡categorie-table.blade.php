<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Categorie;
use Illuminate\Support\Str;

new #[Layout('components.layouts.admin')] #[Title('Catégories')] class extends Component
{
    use WithPagination;

    public string $recherche = '';

    // ============ MODAL CRÉATION/ÉDITION ============
    public bool $showModal = false;
    public ?int $editingId = null;

    public string $nom = '';
    public string $description = '';
    public int $ordre = 0;
    public bool $actif = true;

    // ============ MODAL SUPPRESSION ============
    public bool $showDeleteModal = false;
    public ?int $deleteTargetId = null;
    public string $deleteTargetName = '';

    protected $rules = [
        'nom'   => 'required|min:2|max:100',
        'ordre' => 'nullable|integer|min:0',
    ];

    protected $messages = [
        'nom.required'  => 'Le nom est obligatoire.',
        'nom.min'       => 'Le nom doit contenir au moins 2 caractères.',
        'nom.max'       => 'Le nom ne doit pas dépasser 100 caractères.',
        'ordre.integer' => 'L\'ordre doit être un nombre entier.',
        'ordre.min'     => 'L\'ordre doit être positif.',
    ];

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    // ============ CRÉATION / ÉDITION ============

    public function ouvrirModal(?int $id = null)
    {
        $this->resetValidation();
        $this->reset(['nom', 'description', 'ordre', 'actif']);
        $this->actif = true;
        $this->editingId = $id;

        if ($id) {
            $cat = Categorie::findOrFail($id);
            $this->nom = $cat->nom;
            $this->description = $cat->description ?? '';
            $this->ordre = $cat->ordre;
            $this->actif = $cat->actif;
        }

        $this->showModal = true;
    }

    public function fermerModal()
    {
        $this->showModal = false;
        $this->reset(['nom', 'description', 'ordre', 'actif', 'editingId']);
        $this->resetValidation();
    }

    public function enregistrer()
    {
        $this->validate();

        $data = [
            'nom'         => $this->nom,
            'description' => $this->description,
            'ordre'       => $this->ordre,
            'actif'       => $this->actif,
        ];

        if ($this->editingId) {
            $cat = Categorie::findOrFail($this->editingId);
            if ($this->nom !== $cat->nom) {
                $data['slug'] = Str::slug($this->nom) . '-' . uniqid();
            }
            $cat->update($data);
            session()->flash('success', 'Catégorie modifiée avec succès.');
        } else {
            $data['slug'] = Str::slug($this->nom) . '-' . uniqid();
            Categorie::create($data);
            session()->flash('success', 'Catégorie créée avec succès.');
        }

        $this->fermerModal();
        $this->resetPage();
    }

    // ============ SUPPRESSION (avec modal) ============

    public function confirmerSuppression(int $id)
    {
        $cat = Categorie::findOrFail($id);

        // Vérifier si la catégorie contient des produits
        if ($cat->produits()->count() > 0) {
            session()->flash('error', 'Impossible : cette catégorie contient ' . $cat->produits()->count() . ' produit(s).');
            return;
        }

        $this->deleteTargetId = $id;
        $this->deleteTargetName = $cat->nom;
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

        $cat = Categorie::findOrFail($this->deleteTargetId);

        // Double vérification
        if ($cat->produits()->count() > 0) {
            session()->flash('error', 'Impossible : cette catégorie contient des produits.');
            $this->annulerSuppression();
            return;
        }

        $cat->delete();

        session()->flash('success', 'Catégorie supprimée avec succès.');

        $this->annulerSuppression();
        $this->resetPage();
    }

    // ============ ACTIONS RAPIDES ============

    public function toggleActif(int $id)
    {
        $c = Categorie::findOrFail($id);
        $c->update(['actif' => !$c->actif]);
    }

    // ============ RENDER ============

    public function render()
    {
        $categories = Categorie::withCount('produits')
            ->when($this->recherche, fn($q) => $q->where('nom', 'like', "%{$this->recherche}%"))
            ->ordonne()
            ->paginate(10);

        return view('livewire.admin.categorie-table', [
            'categories' => $categories,
        ]);
    }
};
?>