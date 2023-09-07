<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'reference',
        'user_id',
        'cart_id',
        'cart_items',
        'status'
    ];

    protected $casts = [
        'cart_items' => 'array', // Cast the JSON column to an array
    ];
}