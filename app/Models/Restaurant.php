<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'room_type_id', 'room_no', 'floor_no', 'sell_price', 'offer_price', 'user_id'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
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
