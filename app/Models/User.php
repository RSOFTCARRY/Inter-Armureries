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
     * Les attributs assignables en masse (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'name',
    'email',
    'password',
    'siret',
    'sia',
    'raison_sociale',            
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
     * Les attributs cachés lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les casts pour la transformation automatique des attributs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

        // Dates des documents
        'validite_autorisation' => 'date',
        'validite_afci' => 'date',
        'validite_diplome' => 'date',
        'validite_agrement' => 'date',
        'validite_kbis' => 'date',
    ];

    /**
     * Relation favoris entre l'utilisateur et les articles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoris()
    {
        return $this->belongsToMany(Article::class, 'favorites', 'user_id', 'article_id')
                    ->withTimestamps();
    }
}
