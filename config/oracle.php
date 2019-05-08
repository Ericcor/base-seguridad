<?php

// para conectarse a un servicio en lugar del tns
//
// 'oracle' => [
//     'driver' => 'oracle',
//     'host' => 'oracle.host',
//     'port' => '1521',
//     'database' => 'xe',
//     'service_name' => 'sid_alias',
//     'username' => 'hr',
//     'password' => 'hr',
//     'charset' => '',
//     'prefix' => '',
// ]

return [
    'oracle' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS', ''),
        'host'          => env('DB_HOST', ''),
        'port'          => env('DB_PORT', '1521'),
        'database'      => env('DB_DATABASE', ''),
        'username'      => env('DB_USERNAME', ''),
        'password'      => env('DB_PASSWORD', ''),
        'charset'       => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
    ],

    'oraclepar' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS', ''),
        'host'          => env('DB_HOST3', ''),
        'port'          => env('DB_PORT3', '1521'),
        'database'      => env('DB_DATABASE3', ''),
        'username'      => env('DB_USERNAME3', ''),
        'password'      => env('DB_PASSWORD3', ''),
        'charset'       => env('DB_CHARSET3', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
    ],

    'oraclecon' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS', ''),
        'host'          => env('DB_HOST2', ''),
        'port'          => env('DB_PORT2', '1521'),
        'database'      => env('DB_DATABASE2', ''),
        'username'      => env('DB_USERNAME2', ''),
        'password'      => env('DB_PASSWORD2', ''),
        'charset'       => env('DB_CHARSET2', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
    ],
       'oracle_his' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS4', ''),
        'host'          => env('DB_HOST4', ''),
        'port'          => env('DB_PORT4', '1521'),
        'database'      => env('DB_DATABASE4', ''),
        'username'      => env('DB_USERNAME4', ''),
        'password'      => env('DB_PASSWORD4', ''),
        'charset'       => env('DB_CHARSET4', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX4', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX4', ''),
    ],

    'oraclecon_his' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS5', ''),
        'host'          => env('DB_HOST5', ''),
        'port'          => env('DB_PORT5', '1521'),
        'database'      => env('DB_DATABASE5', ''),
        'username'      => env('DB_USERNAME5', ''),
        'password'      => env('DB_PASSWORD5', ''),
        'charset'       => env('DB_CHARSET5', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX5', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX5', ''),
    ],

    'oraclepar_his' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS6', ''),
        'host'          => env('DB_HOST6', ''),
        'port'          => env('DB_PORT6', '1521'),
        'database'      => env('DB_DATABASE6', ''),
        'username'      => env('DB_USERNAME6', ''),
        'password'      => env('DB_PASSWORD6', ''),
        'charset'       => env('DB_CHARSET6', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX6', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX6', ''),
    ],
];
