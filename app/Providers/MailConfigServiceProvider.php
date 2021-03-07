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

//        $smtp = SmsSmtp::where('type','smtp')->first();
//////        $config = array(
//////            'driver'     => 'smtp',
//////            'host'       => $smtp->host,
//////            'port'       => $smtp->port,
//////            'from'       => array('address' => $smtp->sender_email, 'name' => $smtp->sender_name),
//////            'encryption' => $smtp->encryption,
//////            'username'   => $smtp->username,
//////            'password'   => $smtp->password,
////////            'sendmail'   => '/usr/sbin/sendmail -bs',
//////            'pretend'    => false,
//////        );
////
//        Config::set('mail.MAIL_DRIVER','smtp');
//        Config::set('mail.MAIL_HOST',$smtp->host);
//        Config::set('mail.MAIL_PORT',$smtp->port);
//        Config::set('mail.MAIL_FROM_ADDRESS',$smtp->sender_email);
//        Config::set('mail.MAIL_FROM_NAME',$smtp->sender_name);
//        Config::set('mail.MAIL_ENCRYPTION',$smtp->encryption);
//        Config::set('mail.MAIL_USERNAME',$smtp->username);
//        Config::set('mail.MAIL_PASSWORD',$smtp->password);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
