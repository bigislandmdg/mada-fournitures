<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'nom',
        'slug',
        'description',
        'image',
        'unite',
        'prix_indicatif',
        'stock',
        'actif',
    ];

    protected $casts = [
        'actif'          => 'boolean',
        'stock'          => 'integer',
        'prix_indicatif' => 'decimal:2',
    ];

    protected static function booted(): void
    {
        static::creating(function ($produit) {
            if (empty($produit->slug)) {
                $produit->slug = Str::slug($produit->nom);
            }
        });
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function devisItems(): HasMany
    {
        return $this->hasMany(DevisItem::class);
    }

    public function scopeActif($query)
    {
        return $query->where('actif', true);
    }

    public function scopeRecherche($query, string $motCle)
    {
        return $query->where(function ($q) use ($motCle) {
            $q->where('nom', 'like', "%{$motCle}%")
              ->orWhere('description', 'like', "%{$motCle}%");
        });
    }
}