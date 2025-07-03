<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Article;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'siret',
        'sia',
        'responsable_nom',
        'responsable_prenom',
        'telephone_fixe',
        'telephone_mobile',
        'adresse_siege',
        'autorisation_commerce',
        'autorisation_commerce_date',
        'afci',
        'afci_date',
        'diplome',
        'diplome_date',
        'agrement',
        'agrement_date',
        'kbis',
        'kbis_date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'autorisation_commerce_date' => 'date',
        'afci_date' => 'date',
        'diplome_date' => 'date',
        'agrement_date' => 'date',
        'kbis_date' => 'date',
    ];

    public function favoris()
    {
        return $this->belongsToMany(Article::class, 'favorites', 'user_id', 'article_id')->withTimestamps();
    }
}
