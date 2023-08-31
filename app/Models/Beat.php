<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beat extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'imageUrl',
        'fileUrl',
        'price',
        'genre',
        'duration',
        'size',
        'type',
        'genre_id',
        'user_id',
        'producer_id',
    ];

    /**
     * Get the genre associated with the beat.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Genre, \App\Models\Beat>
     */

    public function genres(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * Get the producer associated with the beat.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Producer, \App\Models\Beat>
     */
    
    public function producer(): BelongsTo
    {
        return $this->belongsTo(Producer::class);
    }

    public function favouritedBy()
    {
        return $this->belongsToMany(User::class, 'favourites', 'beat_id', 'user_id');
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
