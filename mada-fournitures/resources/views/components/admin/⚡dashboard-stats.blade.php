<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Devis;
use App\Models\Contact;

new #[Layout('components.layouts.admin')] #[Title('Tableau de bord')] class extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-stats', [
            'stats' => [
                'produits'         => Produit::count(),
                'categories'       => Categorie::count(),
                'devis_total'      => Devis::count(),
                'devis_nouveaux'   => Devis::where('statut', 'nouveau')->count(),
                'messages'         => Contact::count(),
                'messages_non_lus' => Contact::where('lu', false)->count(),
            ],
            'derniers_devis'    => Devis::latest()->take(5)->get(),
            'derniers_messages' => Contact::latest()->take(5)->get(),
        ]);
    }
};
?>