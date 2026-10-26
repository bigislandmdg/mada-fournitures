<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new #[Layout('components.layouts.app')] #[Title('Mentions légales - Mada Fournitures')] class extends Component
{
    public function render()
    {
        return view('livewire.mentions-legales');
    }
};
?>