<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Devis extends Model
{
    use HasFactory;

    protected $table = 'devis';

    protected $fillable = [
        'reference',
        'nom_client',
        'societe',
        'email',
        'telephone',
        'adresse',
        'message',
        'statut',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(DevisItem::class);
    }

    public static function genererReference(): string
    {
        do {
            $reference = 'DEV-' . now()->format('Ymd') . '-' . strtoupper(bin2hex(random_bytes(2)));
        } while (self::where('reference', $reference)->exists());

        return $reference;
    }

    public function scopeStatut($query, string $statut)
    {
        return $query->where('statut', $statut);
    }
}