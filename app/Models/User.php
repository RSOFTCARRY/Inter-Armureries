<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Article;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Champs autorisés à la création/modification
    protected $fillable = [
        'name',
        'email',
        'password',
        'siret',
        'sia',
    ];

    // Champs à cacher dans les tableaux/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts pour les attributs du modèle
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relation many-to-many avec les articles favoris.
     * La table pivot s'appelle 'favorites' ici (à vérifier dans ta BDD).
     */
    public function favoris()
    {
        // Si ta table pivot contient aussi des timestamps, ajoute ->withTimestamps()
        return $this->belongsToMany(Article::class, 'favorites', 'user_id', 'article_id')->withTimestamps();
    }
}
