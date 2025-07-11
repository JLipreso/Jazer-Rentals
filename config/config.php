<?php

return [
    /** Project Configurations */
    'project_refid'                 => env('PROJECT_REFID', ''),


    /** Database Connection Configurations */
    'conn_rentals_ip'                 => env('CONN_RENTALS_IP', env('DB_HOST')),
    'conn_rentals_pt'                 => env('CONN_RENTALS_PT', env('DB_PORT')),
    'conn_rentals_db'                 => env('CONN_RENTALS_DB', env('DB_DATABASE')),
    'conn_rentals_un'                 => env('CONN_RENTALS_UN', env('DB_USERNAME')),
    'conn_rentals_pw'                 => env('CONN_RENTALS_PW', env('DB_PASSWORD')),

    /** Query parameters */
    'fetch_paginate_max'            => env('FETCH_PAGINATE_MAX', 25),
];