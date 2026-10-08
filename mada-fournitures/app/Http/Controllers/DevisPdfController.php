<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Barryvdh\DomPDF\Facade\Pdf;

class DevisPdfController extends Controller
{
    /**
     * Télécharger le devis en PDF.
     */
    public function telecharger(int $id)
    {
        $devis = Devis::with('items.produit.categorie')->findOrFail($id);

        $pdf = Pdf::loadView('pdf.devis', compact('devis'))
                  ->setPaper('A4', 'portrait');

        $nomFichier = 'devis-' . $devis->reference . '.pdf';

        return $pdf->download($nomFichier);
    }

    /**
     * Afficher le devis en PDF dans le navigateur.
     */
    public function voir(int $id)
    {
        $devis = Devis::with('items.produit.categorie')->findOrFail($id);

        $pdf = Pdf::loadView('pdf.devis', compact('devis'))
                  ->setPaper('A4', 'portrait');

        return $pdf->stream('devis-' . $devis->reference . '.pdf');
    }
}