
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes publiques - Mada Fournitures
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::livewire('/', 'home')->name('home');

// Catalogue de fournitures
Route::livewire('/fournitures', 'catalogue')->name('fournitures.index');
Route::livewire('/fournitures/{slug}', 'catalogue')->name('fournitures.categorie');

// Fiche produit
Route::livewire('/produit/{slug}', 'fiche-produit')->name('produit.show');

// Pages statiques
Route::livewire('/marches-publics', 'marches-publics')->name('marches');
Route::livewire('/a-propos', 'a-propos')->name('a-propos');

// Contact
Route::livewire('/contact', 'formulaire-contact')->name('contact');

// Panier de devis
Route::livewire('/devis', 'panier-devis')->name('devis');

// Pages légales
Route::livewire('/mentions-legales', 'mentions-legales')->name('mentions-legales');
Route::livewire('/confidentialite', 'confidentialite')->name('confidentialite');

/*
|--------------------------------------------------------------------------
| Changement de langue - Français / Malagasy
|--------------------------------------------------------------------------
*/

Route::post('/langue', function (Request $request) {
    $validated = $request->validate([
        'locale' => ['required', 'in:fr,mg'],
    ]);

    $request->session()->put('locale', $validated['locale']);

    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Route dashboard (redirection selon le rôle)
|--------------------------------------------------------------------------
| Breeze redirige l'utilisateur vers route('dashboard') après connexion.
| Cette route redirige l'admin vers /admin/dashboard et les autres vers /.
*/

Route::middleware('auth')->get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Routes d'authentification (fournies par Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Routes admin
|--------------------------------------------------------------------------
*/

require __DIR__.'/admin.php';
