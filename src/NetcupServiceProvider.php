<?php

namespace Tda\LaravelNetcup;

use Illuminate\Support\ServiceProvider;

class NetcupServiceProvider extends ServiceProvider
{
    public function registeringPackage()
    {
        $this->app->alias(Netcup::class, 'laravel-netcup');

    }
}
