<?php

namespace App\Listeners;

use App\Events\Eveniment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EvenimentListener
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
     * @param  Eveniment  $event
     * @return void
     */
    public function handle(Eveniment $event)
    {
        //
		$message = $event->message;

		//return view('pagini.editare')->withPost($post);
		return $message;
    }
}
