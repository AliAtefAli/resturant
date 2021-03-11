<?php

namespace App\Providers;

use App\Models\SmsSmtp;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $smtp = SmsSmtp::where('type','smtp')->first();

        Config::set('mail.driver','smtp');
        Config::set('mail.host',$smtp->host);
        Config::set('mail.port',$smtp->port);
        Config::set('mail.from.address',$smtp->sender_email);
        Config::set('mail.from.name',$smtp->sender_name);
        Config::set('mail.encryption',$smtp->encryption);
        Config::set('mail.username',$smtp->username);
        Config::set('mail.password',$smtp->password);
    }
}
