<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
     * Get the user that owns the producer.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, \App\Models\Artiste>
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function producers(): BelongsToMany
    // {
    //     return $this->belongsToMany(Product::class, 'model_has_roles')
    //         ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    //         ->where('roles.name', 'producer');
    // }

    // /**
    //  * Get the beats for the producer.
    //  * 
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Beat, \App\Models\Producer>
    //  */
    // public function beats(): HasMany
    // {
    //     return $this->hasMany(Beat::class);
    // }

}
