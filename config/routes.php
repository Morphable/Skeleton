<?php

use \App\Infrastructure\Controller\StaticPageController;

// predefine routes with static method as callback
return [
    'index' => [
        'method' => 'GET',
        'route' => '/',
        'callback' => [StaticPageController::class, 'serveHome']
    ],
    'home' => [
        'method' => 'GET',
        'route' => '/home',
        'callback' => [StaticPageController::class, 'serveHome']
    ]
];
