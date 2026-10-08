<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Categorie;

new #[Layout('components.layouts.app')] #[Title('Accueil - Mada Fournitures')] class extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'categories' => Categorie::actif()->ordonne()->get(),
        ]);
    }
};
?>