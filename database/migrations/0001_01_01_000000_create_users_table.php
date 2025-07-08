<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Article;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Champs autorisés à l’édition en masse.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'siret',
        'sia',
        'raison_sociale',
        'adresse',
        'prenom',
        'telephone_fixe',
        'telephone_mobile',
        'adresse_siege',
        'doc_autorisation',
        'validite_autorisation',
        'doc_afci',
        'validite_afci',
        'doc_diplome',
        'validite_diplome',
        'doc_agrement',
        'validite_agrement',
        'doc_kbis',
        'validite_kbis',
    ];

    /**
     * Champs masqués dans les tableaux ou les JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion automatique des types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'validite_autorisation' => 'date',
        'validite_afci' => 'date',
        'validite_diplome' => 'date',
        'validite_agrement' => 'date',
        'validite_kbis' => 'date',
    ];

    /**
     * Articles ajoutés en favoris par l’utilisateur.
     */
    public function favoris()
    {
        return $this->belongsToMany(Article::class, 'favorites', 'user_id', 'article_id')->withTimestamps();
    }
}
