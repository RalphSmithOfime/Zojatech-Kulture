<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Artiste;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'confirm_password',
        'user_type',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'confirm_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'confirm_password' => 'hashed'
    ];

    /**
     * Get the producer associated with the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<\App\Models\Producer>
     */
    public function producers(): HasOne
    {
        return $this->hasOne(Producer::class);
    }

    public function artistes(): HasOne
    {
        return $this->hasOne(Artiste::class);
    }

    public function guardName(): mixed
    {
        return 'api';
    }
    
    // public function profile_picture(): Attribute
    // {
    //     return Attribute::make(get: fn () => $this->getFirstMedia('profile_picture') ?: null);
    // }

}