<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'slug', 'menu_class', 'menu_position', 'parent_id', 'user_id'];


    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
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
