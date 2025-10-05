<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Encryption\Encrypter;
class Dishes extends Model
{
    use HasFactory;

    public $fillable = [
        'titre',
        'recette',
        'image_url',
        'user_id',
    ];

    protected $casts = [
        'recette' => 'encrypted'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this -> belongsToMany(dishes::class, 'user_likes_dishes', 'dishes_id', 'user_id');
    }
}
