import './bootstrap';
import intersect from '@alpinejs/intersect';

// Livewire 3/4 charge Alpine automatiquement.
// On enregistre juste nos plugins sur l'instance Alpine de Livewire.
document.addEventListener('alpine:init', () => {
    window.Alpine.plugin(intersect);
});