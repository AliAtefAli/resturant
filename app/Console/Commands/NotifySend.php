<?php

namespace App\Console\Commands;

use App\Mail\RateUs;
use App\Mail\SubsEnd;
use App\Models\SubscriptionUser;
use App\Models\User;
use App\Notifications\FinishedSubscriptions;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifySend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification when the subscription deadline comes';

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
        $finishedSubs = SubscriptionUser::where('end_date','<',Carbon::today())
            ->whereNotNull('stopped_at')->get();

        foreach($finishedSubs as $sub){
            $sub->update([
                'stopped_at' => null
            ]);
        }

        $subscriptions = SubscriptionUser::with('subscription')
            ->where('end_date', '<', Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        foreach ($subscriptions as $finished) {
            if ($finished->end_date < Carbon::today()) {

                $admins = User::where('type', 'admin')->get();
                foreach ($admins as $admin) {
                    $admin->notify(new FinishedSubscriptions('Finished Subscription'));

                }

                $data = [
                    'id' =>$finished->id,
                    'user_name' =>$finished->user->name,
                    'subscribe_name' => $finished->subscription->name,
                    'end_date' => Carbon::parse($finished->end_date)->toDateString()
                ];

                Mail::to($finished->user->mail)->
                send(new RateUs());
            }
        }



        Mail::to("vegandinosaur1@gmail.com")->
        send(new SubsEnd($data));

        $this->info('Notification has been send successfully');
    }
}
