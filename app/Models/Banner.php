<?php

namespace App\Models;

use App\Jobs\BannerBeforeCreatingJob;
use App\Jobs\BannerBeforeDeletingJob;
use App\Jobs\BannerBeforeUpdatingJob;
use App\Observers\BannerObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'attachment', 'thumbnail', 'user_id'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($banner) {
            BannerBeforeDeletingJob::dispatch($banner);
        });

        static::creating(function($banner) {
            dd($banner);
            BannerBeforeCreatingJob::dispatch($banner);
        });

        static::updating(function($banner) {
            dd($banner);
            BannerBeforeUpdatingJob::dispatch($banner);
        });
    }
}
