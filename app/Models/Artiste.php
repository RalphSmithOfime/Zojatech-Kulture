<?php

namespace App\Models;

use App\Models\Beat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, HasOne};

class Artiste extends User
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
      
    ];

    protected $fillable = [
      

    ];

    
    /**
     * Get the user that owns the artiste
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, \App\Models\Artiste>
     */


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function favourites(): BelongsToMany
    {
        return $this->belongsToMany(Beat::class, 'favourites')
        ->select('fileUrl', 'imageUrl', 'genre', 'name', 'price', 'id')
        ->withTimestamps();
    }

}