<?php

use \App\Infrastructure\Application;
use \Morphable\SimpleRouting;
use \Morphable\SimpleRouting\Builder;
use \Symfony\Component\Dotenv\Dotenv;

// require vendor
require __DIR__ . '/../vendor/autoload.php';

// intialize application
Application::initialize(__DIR__ . '/..');

(new Dotenv())->load(Application::getPath('root') . '/.env');

// get predefined services and add them to application
$services = require Application::getPath('config') . '/services.php';

foreach ($services as $name => $service) {
    Application::addService($name, $service);
}

// get predefined routes and add them to the router
$routes = require Application::getPath('config') . '/routes.php';

foreach($routes as $name => $route) {
    SimpleRouting::add($name, Builder::fromArray($route));
}

// execute router and catch errors
try {
    SimpleRouting::execute();
} catch (\Morphable\SimpleRouting\Exception\RouteNotFound  $e) {
    echo Application::getService('view')->serve('errors/404.php');
    die;
}
