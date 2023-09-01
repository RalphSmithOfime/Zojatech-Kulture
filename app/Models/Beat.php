<?php

namespace App\Models;

use App\Models\Artiste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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


     // Hide the pivot table
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['pivot'];

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

    public function favourites(): BelongsToMany
    {
        return $this->belongsToMany(Artiste::class, 'favourites', 'beat_id', 'artiste_id')
        ->withTimestamps();
    }
    
}