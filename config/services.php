<?php

use \App\Infrastructure\Application;
use \Morphable\SimpleCache;
use \Morphable\SimpleView;
use \Morphable\SimpleDebugger;
use \Morphable\SimpleDatabase;

// define services, name => instance
return [
    'cache' => new SimpleCache(Application::getPath('cache')),
    'view' => new SimpleView(Application::getPath('views')),
    'debug' => new SimpleDebugger()
];
