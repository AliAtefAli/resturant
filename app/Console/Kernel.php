<?php

namespace App\Console;

use App\Models\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\FinishedSubs::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products')
            ->where('end_date', '<', Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        foreach ($subscriptions as $finished) {
            if ($finished->end_date < Carbon::today()) {
                $schedule->command('word:day')
                    ->daily();
            }
        }

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
