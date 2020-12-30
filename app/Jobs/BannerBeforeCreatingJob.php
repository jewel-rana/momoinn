<?php

namespace App\Jobs;

use App\Models\Banner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BannerBeforeCreatingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $banner;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
