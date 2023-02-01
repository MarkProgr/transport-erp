<?php

namespace App\Listeners;

use App\Mail\DriverEmail;
use App\Models\Driver;
use Illuminate\Support\Facades\Mail;

class ChangeStatus
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
    public function handle($event)
    {
        $event->favor->transport->status = 'Active';
        $event->favor->transport->save();

        $driver = Driver::query()->where('transport_id', $event->favor->transport->id)->firstOrFail();

        $driver->status = 'Active';
        $driver->save();
        Mail::to($driver->email)->send(new DriverEmail($driver));
    }
}
