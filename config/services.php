<?php

use \App\Infrastructure\Application;
use \Morphable\SimpleCache;
use \Morphable\SimpleView;
use \Morphable\SimpleDebugger;
use \Morphable\SimpleDatabase;

// define services, name => instance
return [
    'env' => getenv(),
    'cache' => new SimpleCache(Application::getPath('cache')),
    'view' => new SimpleView(Application::getPath('views')),
    'debug' => new SimpleDebugger(),
    'database' => new SimpleDatabase(
        "sqlite:" . str_replace(':data', Application::getPath('data'), getenv('DB_DNS')),
        getenv('DB_USER'),
        getenv('DB_PASS'),
        null,
        function ($e) {
            die($e->getMessage());
        }
    )
];
