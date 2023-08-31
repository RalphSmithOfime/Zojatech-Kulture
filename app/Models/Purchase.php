<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['user_id', 'beat_id'];
    
    public function user()
        {
            return $this->belongsTo(User::class);
        }

    public function beat()
        {
            return $this->belongsTo(Beat::class);
        }
}
