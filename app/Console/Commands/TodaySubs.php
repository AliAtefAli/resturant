<?php

namespace App\Console\Commands;

use App\Models\SubscriptionUser;
use App\Models\User;
use App\Notifications\FinishedSubscriptions;
use App\Notifications\TodaySubscriptions;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TodaySubs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todaySubs:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notification for today subscriptions';

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
        $subscriptions = SubscriptionUser::with('subscription')
            ->where('start_date', Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        foreach ($subscriptions as $today) {
            if ($today->start_date == Carbon::today()) {

                $admins = User::where('type', 'admin')->get();
                foreach ($admins as $admin) {
                    $admin->notify(new TodaySubscriptions('Today Subscription'));
                }

            }
        }
    }
}
