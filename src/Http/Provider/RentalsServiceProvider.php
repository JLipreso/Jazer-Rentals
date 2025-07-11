<?php

namespace Jazer\Rentals\Http\Provider;

use Illuminate\Support\ServiceProvider;

class RentalsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/database.php', 'jtrentalsconfig'  
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../../config/config.php' => config_path('jtrentalsconfig.php')
        ], 'jtrentalsconfig-config');
        
        $this->loadRoutesFrom( __DIR__ . '/../../../routes/api.php');

        config(['database.connections.conn_rentals' => config('jtrentalsconfig.database_connection')]);
    }
}
