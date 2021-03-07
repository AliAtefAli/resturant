<?php

namespace App\Mail;

use App\Exports\SubscriptionUserExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class TodaySubs extends Mailable
{
    use Queueable, SerializesModels;

//    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('ايميل من الديناصور النباتي')
            ->view('dashboard.mails.tomorrow_subs');
    }
}
