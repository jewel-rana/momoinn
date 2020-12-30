<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'code', 'amount', 'type', 'offer_start', 'offer_end', 'user_id'];

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
