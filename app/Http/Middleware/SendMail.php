<?php

namespace App\Http\Middleware;

use App\Models\SmsSmtp;
use Closure;
use Illuminate\Support\Facades\Config;

class SendMail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $smtp = SmsSmtp::where('type','smtp')->first();

        if ($smtp) {

            Config::set('mail.driver', 'smtp');
            Config::set('mail.host', "$smtp->host");
            Config::set('mail.port', $smtp->port);
            Config::set('mail.from.address', "$smtp->sender_email");
            Config::set('mail.from.name', "$smtp->sender_name");
            Config::set('mail.encryption', "$smtp->encryption");
            Config::set('mail.username', "$smtp->username");
            Config::set('mail.password', "$smtp->password");

        }
//        dd($next);
        return $next($request);
    }
}
