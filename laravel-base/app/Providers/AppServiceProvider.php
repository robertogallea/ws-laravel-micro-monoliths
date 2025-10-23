<?php

namespace App\Providers;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Aacotroneo\Saml2\Events\Saml2LogoutEvent;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(Saml2LoginEvent::class, function (Saml2LoginEvent $event) {
            $attributes = $event->getSaml2User()->getAttributes();

            $user = User::find($attributes['id'][0]);

            auth()->login($user);
        });

        Event::listen(Saml2LogoutEvent::class, function (Saml2LogoutEvent $event) {
            auth()->logout();
            Session::save();
        });
    }
}
