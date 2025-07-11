<?php

return [
    'database_connection' => [
        'driver'        => 'mysql',
        'host'          => env('CONN_RENTALS_IP', config('jtrentalsconfig.conn_rentals_ip')),
        'port'          => env('CONN_RENTALS_PT', config('jtrentalsconfig.conn_rentals_pt')),
        'database'      => env('CONN_RENTALS_DB', config('jtrentalsconfig.conn_rentals_db')),
        'username'      => env('CONN_RENTALS_UN', config('jtrentalsconfig.conn_rentals_un')),
        'password'      => env('CONN_RENTALS_PW', config('jtrentalsconfig.conn_rentals_pw')),
        'charset'       => 'utf8mb4',
        'collation'     => 'utf8mb4_unicode_ci',
        'prefix'        => ''
    ],
];