<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'image', 'prix'];

    /**
     * Relation many-to-many avec les utilisateurs qui ont mis cet article en favoris.
     */
    public function favoris()
    {
        return $this->belongsToMany(User::class, 'favorites', 'article_id', 'user_id')->withTimestamps();
    }
}
