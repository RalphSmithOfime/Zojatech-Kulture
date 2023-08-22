<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'beat_id'
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function beats(): HasMany
    {
        return $this->hasMany(Beat::class);
    }
}
