<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new #[Layout('components.layouts.app')] #[Title('Marchés publics - Mada Fournitures')] class extends Component
{
    //
};
?>

<div>
    <section class="bg-gradient-to-br from-brand-700 to-brand-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-bold mb-4">Marchés publics</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                Un partenaire de confiance pour vos appels d'offres et commandes publiques.
            </p>
        </div>
    </section>

    <div class="max-w-5xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white rounded-2xl border border-gray-100 p-8">
                <h2 class="text-xl font-bold mb-4">Documents fournis</h2>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Facture conforme
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Devis proforma
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Bordereau de livraison
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Attestation de conformité
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-8">
                <h2 class="text-xl font-bold mb-4">Notre expertise</h2>
                <p class="text-gray-700 leading-relaxed">
                    Nous maîtrisons les procédures des marchés publics à Madagascar :
                    soumission, négociation, livraison, facturation et suivi administratif.
                </p>
            </div>
        </div>

        <div class="bg-gradient-to-br from-brand-600 to-brand-800 rounded-2xl p-8 md:p-12 text-center text-white">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Un appel d'offres en cours ?</h2>
            <p class="text-blue-100 mb-6">Contactez-nous pour obtenir une soumission détaillée.</p>
            <a href="{{ route('contact') }}"
               class="inline-block bg-white text-brand-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">
                Nous contacter
            </a>
        </div>
    </div>
</div>