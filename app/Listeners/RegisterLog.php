<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterLog
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        \Log::info($event->info . $event->model);
    }
}
