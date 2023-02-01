<?php

namespace App\Listeners;

use App\Mail\ChangedDriverEmail;
use App\Models\Driver;
use Illuminate\Support\Facades\Mail;

class ChangeStatusOfModified
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
        $event->favor->transport->status = 'At parking';
        $event->favor->transport->save();

        $oldDriver = Driver::query()->where('transport_id', $event->favor->transport->id)->firstOrFail();

        $oldDriver->status = 'Inactive';
        $oldDriver->save();
        Mail::to($oldDriver->email)->send(new ChangedDriverEmail($oldDriver));
    }
}
