<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });
        Inertia::share('auth', function () {
            $auth = null;
            $pages = [];
            if (Auth::user()) {
                $pages = [
                    [
                        'url' => '/',
                        'icon' => 'fa fa-home',
                        'index' => '1'
                    ],
                    [
                        'url' => '/seeds',
                        'icon' => 'fas fa-seedling',
                        'index' => '2'
                    ]
                ];
                $auth = [
                    'id' => Auth::user()->id,
                    'name' => Auth::user()->name,
                    'last_name' => Auth::user()->lastname,
                    'email' => Auth::user()->email
                ];
            }
            return [
                'app' => [
                    'name' => 'Botanical'
                ],
                'login_user' => $auth,
                'pages' => $pages,
                'flash' => [
                    'success' => Session::get('success'),

                ],
                'errors' => Session::get('errors') ? Session::get('errors')->getBag('default')->getMessages() : (object)[]
            ];
        }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
