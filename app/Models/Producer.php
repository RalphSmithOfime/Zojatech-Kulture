<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Producer extends User
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
     * Get the user that owns the producer.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, \App\Models\Producer>
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the beats for the producer.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Beat>
     */
    public function beats(): HasMany
    {
        return $this->hasMany(Beat::class);
    }

    public function likedBeats()
    {
        return $this->hasMany(Beat::class)
            ->whereHas('favourites'); 
    }

}
