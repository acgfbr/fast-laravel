<?php

use Swoole\Table;

return [
    /*
    |--------------------------------------------------------------------------
    | HTTP server configurations.
    |--------------------------------------------------------------------------
    |
    | @see https://www.swoole.co.uk/docs/modules/swoole-server/configuration
    |
    */
    'server'    => [
        'host'                => env('SWOOLE_HTTP_HOST', '0.0.0.0'),
        'port'                => env('SWOOLE_HTTP_PORT', '9100'),
        'public_path'         => base_path('public'),
        // Determine if to use swoole to respond request for static files
        'handle_static_files' => env('SWOOLE_HANDLE_STATIC', true),
        'hot_reload'          => env('SWOOLE_HOT_RELOAD', true),
        'options'             => [
            'pid_file'           => env('SWOOLE_HTTP_PID_FILE', base_path('storage/logs/swoole_http.pid')),
            'log_file'           => env('SWOOLE_HTTP_LOG_FILE', base_path('storage/logs/swoole_http.log')),
            'daemonize'          => env('SWOOLE_HTTP_DAEMONIZE', false),
            'sandbox_mode'       => env('SWOOLE_HTTP_SANDBOX_MODE', false),
            // Normally this value should be 1~4 times larger according to your cpu cores.
            'reactor_num'        => env('SWOOLE_HTTP_REACTOR_NUM', swoole_cpu_num()),
            'worker_num'         => env('SWOOLE_HTTP_WORKER_NUM', swoole_cpu_num() * 4),
            'task_worker_num'    => env('SWOOLE_HTTP_TASK_WORKER_NUM', swoole_cpu_num()),
            // The data to receive can't be larger than buffer_output_size.
            'package_max_length' => 20 * 1024 * 1024,
            // The data to send can't be larger than buffer_output_size.
            'buffer_output_size' => 10 * 1024 * 1024,
            // Max buffer size for socket connections
            'socket_buffer_size' => 128 * 1024 * 1024,
            // Worker will restart after processing this number of request
            'max_request'        => 3000,
            // Enable coroutine send
            'send_yield'         => true,
            // You must add --enable-openssl while compiling Swoole
            'ssl_cert_file'      => null,
            'ssl_key_file'       => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Enable to turn on websocket server.
    |--------------------------------------------------------------------------
    */
    'websocket' => [
        'enabled' => env('SWOOLE_HTTP_WEBSOCKET', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Console output will be transferred to response content if enabled.
    |--------------------------------------------------------------------------
    */
    'ob_output' => env('SWOOLE_OB_OUTPUT', true),

    /*
    |--------------------------------------------------------------------------
    | Instances here will be cleared on every request.
    |--------------------------------------------------------------------------
    */
    'instances' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Providers here will be registered on every request.
    |--------------------------------------------------------------------------
    */
    'providers' => [
        Illuminate\Pagination\PaginationServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Define your swoole tables here.
    |
    | @see https://wiki.swoole.com/wiki/page/p-table.html
    |--------------------------------------------------------------------------
    */
    'tables'    => [
        // 'table_name' => [
        //     'size' => 1024,
        //     'columns' => [
        //         ['name' => 'id', 'type' => Table::TYPE_INT, 'size' => 4],
        //         ['name' => 'name', 'type' => Table::TYPE_STRING, 'size' => 64],
        //         ['name' => 'num', 'type' => Table::TYPE_FLOAT, 'size' => 8],
        //         ['name' => 'column_name', 'type' => Table::TYPE_STRING, 'size' => 1024],
        //     ]
        // ],
    ]
];
