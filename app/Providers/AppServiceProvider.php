<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SmsSmtp;
use App\Models\SubscriptionUser;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
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
        Schema::defaultStringLength(191);
        // $notifications = auth()->user()->notifications->where('type', '!=', 'App\Notifications\NewOrderNotification')->get();
        View::share('setting', Setting::all()->pluck('value', 'key'));

    }
}
