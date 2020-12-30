<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::deleting(function($property) {
        });

        static::creating(function($property) {
        });

        static::updating(function($property) {
        });
    }
}
