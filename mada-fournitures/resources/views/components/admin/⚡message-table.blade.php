<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Contact;

new #[Layout('components.layouts.admin')] #[Title('Messages')] class extends Component
{
    use WithPagination;

    public string $recherche = '';
    public string $filtre = '';

    // ============ MODAL DÉTAIL ============
    public bool $showModal = false;
    public ?Contact $messageSelectionne = null;

    // ============ MODAL SUPPRESSION ============
    public bool $showDeleteModal = false;
    public ?int $deleteTargetId = null;
    public string $deleteTargetNom = '';
    public string $deleteTargetSujet = '';

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    public function updatingFiltre()
    {
        $this->resetPage();
    }

    // ============ VOIR DÉTAIL ============

    public function voir(int $id)
    {
        $this->messageSelectionne = Contact::findOrFail($id);

        // Marquer comme lu automatiquement
        if (!$this->messageSelectionne->lu) {
            $this->messageSelectionne->update(['lu' => true]);
        }

        $this->showModal = true;
    }

    public function fermerModal()
    {
        $this->showModal = false;
        $this->messageSelectionne = null;
    }

    // ============ ACTIONS RAPIDES ============

    public function toggleLu(int $id)
    {
        $msg = Contact::findOrFail($id);
        $msg->update(['lu' => !$msg->lu]);
    }

    // ============ SUPPRESSION (avec modal) ============

    public function confirmerSuppression(int $id)
    {
        $msg = Contact::findOrFail($id);
        $this->deleteTargetId = $id;
        $this->deleteTargetNom = $msg->nom;
        $this->deleteTargetSujet = $msg->sujet;
        $this->showDeleteModal = true;
    }

    public function annulerSuppression()
    {
        $this->showDeleteModal = false;
        $this->deleteTargetId = null;
        $this->deleteTargetNom = '';
        $this->deleteTargetSujet = '';
    }

    public function supprimer()
    {
        if (!$this->deleteTargetId) {
            return;
        }

        $msg = Contact::findOrFail($this->deleteTargetId);
        $nom = $msg->nom;

        $msg->delete();

        session()->flash('success', "Message de {$nom} supprimé avec succès.");

        $this->annulerSuppression();
        $this->fermerModal();
        $this->resetPage();
    }

    // ============ RENDER ============

    public function render()
    {
        $messages = Contact::query()
            ->when($this->recherche, fn($q) => $q->where(function ($q) {
                $q->where('nom', 'like', "%{$this->recherche}%")
                  ->orWhere('email', 'like', "%{$this->recherche}%")
                  ->orWhere('sujet', 'like', "%{$this->recherche}%");
            }))
            ->when($this->filtre === 'non_lus', fn($q) => $q->where('lu', false))
            ->when($this->filtre === 'lus', fn($q) => $q->where('lu', true))
            ->latest()
            ->paginate(10);

        // Compteurs pour les onglets
        $stats = [
            'total'   => Contact::count(),
            'non_lus' => Contact::where('lu', false)->count(),
            'lus'     => Contact::where('lu', true)->count(),
        ];

        return view('livewire.admin.message-table', [
            'messages' => $messages,
            'stats'    => $stats,
        ]);
    }
};
?>