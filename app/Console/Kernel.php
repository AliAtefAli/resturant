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
        Commands\NotifySend::class,
        Commands\TodaySubs::class,
        Commands\TomorrowSubs::class,
        Commands\SendMailTodaySubs::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('notify:send')->daily();
        $schedule->command('notify:send')->daily();
        $schedule->command('todaySubs:send')->daily();
        $schedule->command('sendSubs:tomorrow')->daily();
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
