<?php

namespace App\Listeners;

use Mail;
use App\Events\TicketCreated;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use App\Mail\TicketCreated as NewTicketMail;

class SendNewTicketMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketCreated $event) {

      if (isset($event->ticket->email)) {
        // send the new ticket notification to user
        Mail::to($event->ticket->email)->send(new NewTicketMail($event->ticket));
      }
    }
}
