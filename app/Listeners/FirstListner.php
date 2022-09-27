<?php

namespace App\Listeners;

use App\Events\FirstEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class FirstListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(FirstEvent $event)
    {
        $filename = 'ttud-first-listener.txt';
        $content = sprintf(
            '%s: first-listener content: %s',
            date(config('constant.datetime_format.ymdhis')),
            $event->myNumber
        );
        Storage::disk('local')->put($filename, $content);
    }
}
