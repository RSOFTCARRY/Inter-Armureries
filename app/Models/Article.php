<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'image', 'prix'];

    /**
     * Relation avec les utilisateurs qui ont mis l'article en favori.
     */
    public function favoris()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
