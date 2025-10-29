<?php

namespace LaravelDay2025\SharedPackage;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Aacotroneo\Saml2\Events\Saml2LogoutEvent;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use LaravelDay2025\SharedPackage\View\Components\MainMenu;

class SharedServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'shared');
    }

    public function boot()
    {
        Blade::component('main-menu', MainMenu::class);

        Event::listen(Saml2LoginEvent::class, function (Saml2LoginEvent $event) {
            $attributes = $event->getSaml2User()->getAttributes();

            $user = User::find($attributes['id'][0]);

            if (!$user) {
                $user = User::create([
                    'id' => $attributes['id'][0],
                    'email' => $attributes['email'][0],
                    'name' => $attributes['name'][0],
                    'password' => bcrypt('password'),
                ]);
            } else {
                $user->update([
                    'email' => $attributes['email'][0],
                    'name' => $attributes['name'][0],
                    'password' => bcrypt('password'),
                ]);
            }

            auth()->login($user);
        });

        Event::listen(Saml2LogoutEvent::class, function (Saml2LogoutEvent $event) {
            auth()->logout();
            Session::save();
        });
    }
}