<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailTodaySubs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendSubs:tomorrow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Excel sheet for all tomorrow subscription send by mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Mail::to("dinodelivero‪@‬gmail‪.‬com")->
        send(new \App\Mail\TodaySubs());

        $this->info('Mail has been send successfully');

    }
}
