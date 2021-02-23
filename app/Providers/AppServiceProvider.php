<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

//         Carbon::setWeekStartsAt(Carbon::SUNDAY);
//         Carbon::setWeekEndsAt(Carbon::SATURDAY);

//        Carbon::setWeekendDays([
//            Carbon::FRIDAY,
//            Carbon::SATURDAY,
//        ]);

        Schema::defaultStringLength(191);
        // $notifications = auth()->user()->notifications->where('type', '!=', 'App\Notifications\NewOrderNotification')->get();
        View::share('setting', Setting::all()->pluck('value', 'key'));

        View::share('all_subscriptions', SubscriptionUser::
            where('created_at' , Carbon::today())
            ->where('updated_at' ,'>=' ,Carbon::today())
            ->where('updated_at' ,'<' ,Carbon::tomorrow())
            ->get());

        View::share('active_subscriptions', SubscriptionUser::
             where('end_date','>', Carbon::today())
            ->where('updated_at' ,'>=' ,Carbon::today())
            ->where('updated_at' ,'<' ,Carbon::tomorrow())
            ->whereNull('stopped_at')
            ->get());

        View::share('stopped_subscriptions', SubscriptionUser::
        where('updated_at' ,'>=' ,Carbon::today())
            ->where('updated_at' ,'<' ,Carbon::tomorrow())
            ->whereNotNull('stopped_at')
            ->get());

        View::share('finished_subscriptions', SubscriptionUser::
        where('end_date' ,'<' ,Carbon::today())
            ->where('updated_at' ,'>=' ,Carbon::today())
            ->where('updated_at' ,'<' ,Carbon::tomorrow())
            ->whereNull('stopped_at')
            ->get());
        // View::share('notifications', $notifications);
    }
}
