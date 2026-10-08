<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisPdfController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::livewire('/dashboard', 'admin.dashboard-stats')->name('dashboard');
        Route::livewire('/produits', 'admin.produit-table')->name('produits');
        Route::livewire('/categories', 'admin.categorie-table')->name('categories');
        Route::livewire('/devis', 'admin.devis-table')->name('devis');
        Route::livewire('/messages', 'admin.message-table')->name('messages');

        // ============ ROUTES PDF DEVIS ============
        Route::get('/devis/{id}/pdf', [DevisPdfController::class, 'telecharger'])
             ->name('devis.pdf');

        Route::get('/devis/{id}/pdf/voir', [DevisPdfController::class, 'voir'])
             ->name('devis.pdf.voir');
    });