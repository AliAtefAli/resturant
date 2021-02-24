<?php

namespace App\Console\Commands;

use App\Models\SubscriptionUser;
use App\Models\User;
use App\Notifications\FinishedSubscriptions;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FinishedSubs extends Command
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
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products')
            ->where('end_date', '<', Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        foreach ($subscriptions as $finished) {
            if ($finished->end_date < Carbon::today()) {

                $admins = User::where('type', 'admin')->get();
                foreach ($admins as $admin) {
                    $admin->notify(new FinishedSubscriptions('Finished Subscription'));
                }

            }
        }

        return true;
    }
}
