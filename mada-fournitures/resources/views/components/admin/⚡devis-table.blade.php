<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Devis;

new #[Layout('components.layouts.admin')] #[Title('Devis')] class extends Component
{
    use WithPagination;

    public string $recherche = '';
    public string $filtreStatut = '';

    // ============ MODAL DÉTAIL ============
    public bool $showModal = false;
    public ?Devis $devisSelectionne = null;

    // ============ MODAL SUPPRESSION ============
    public bool $showDeleteModal = false;
    public ?int $deleteTargetId = null;
    public string $deleteTargetReference = '';
    public string $deleteTargetClient = '';

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    public function updatingFiltreStatut()
    {
        $this->resetPage();
    }

    // ============ VOIR DÉTAIL ============

    public function voir(int $id)
    {
        $this->devisSelectionne = Devis::with('items.produit.categorie')->findOrFail($id);
        $this->showModal = true;
    }

    public function fermerModal()
    {
        $this->showModal = false;
        $this->devisSelectionne = null;
    }

    // ============ CHANGER STATUT ============

    public function changerStatut(int $id, string $statut)
    {
        $devis = Devis::findOrFail($id);
        $devis->update(['statut' => $statut]);

        session()->flash('success', "Statut du devis {$devis->reference} mis à jour.");

        if ($this->devisSelectionne && $this->devisSelectionne->id === $id) {
            $this->devisSelectionne->refresh();
        }
    }

    // ============ SUPPRESSION (avec modal) ============

    public function confirmerSuppression(int $id)
    {
        $devis = Devis::findOrFail($id);
        $this->deleteTargetId = $id;
        $this->deleteTargetReference = $devis->reference;
        $this->deleteTargetClient = $devis->nom_client;
        $this->showDeleteModal = true;
    }

    public function annulerSuppression()
    {
        $this->showDeleteModal = false;
        $this->deleteTargetId = null;
        $this->deleteTargetReference = '';
        $this->deleteTargetClient = '';
    }

    public function supprimer()
    {
        if (!$this->deleteTargetId) {
            return;
        }

        $devis = Devis::findOrFail($this->deleteTargetId);
        $reference = $devis->reference;

        // Supprimer les items liés (cascade en base)
        $devis->items()->delete();
        $devis->delete();

        session()->flash('success', "Devis {$reference} supprimé avec succès.");

        $this->annulerSuppression();
        $this->fermerModal();
        $this->resetPage();
    }

    // ============ RENDER ============

    public function render()
    {
        $devis = Devis::query()
            ->when($this->recherche, fn($q) => $q->where(function ($q) {
                $q->where('reference', 'like', "%{$this->recherche}%")
                  ->orWhere('nom_client', 'like', "%{$this->recherche}%")
                  ->orWhere('email', 'like', "%{$this->recherche}%")
                  ->orWhere('societe', 'like', "%{$this->recherche}%");
            }))
            ->when($this->filtreStatut, fn($q) => $q->where('statut', $this->filtreStatut))
            ->withCount('items')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.devis-table', [
            'devis' => $devis,
        ]);
    }
};
?>