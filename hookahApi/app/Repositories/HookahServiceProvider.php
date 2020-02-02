<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class HookahServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\ApiHookahInterface',
            'App\Repositories\HookahClubRepository'
        );
        $this->app->bind(
            'App\Repositories\ApiHookahInterface',
            'App\Repositories\HookahRepository'
        );
    }
}