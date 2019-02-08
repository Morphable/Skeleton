<?php

namespace App\Infrastructure;

use \Morphable\SimpleContainer;

class Application
{
    private static $paths;

    private static $services;

    public static function initialize(string $root)
    {
        self::$paths = [];
        self::$paths['root'] = $root;
        self::$paths['config'] = $root . '/config';
        self::$paths['app'] = $root . '/App';
        self::$paths['public'] = $root . '/public';
        self::$paths['views'] = $root . '/views';
        self::$paths['cache'] = $root . '/cache';
    }

    public static function getPath(string $name = null)
    {
        if ($name != null) {
            return self::$paths[$name];
        }

        return self::$paths;
    }

    public static function addService($name, $obj)
    {
        if (self::$services == null) {
            self::$services = new SimpleContainer();
        }

        self::$services->add($name, $obj);
    }

    public static function getService($name)
    {
        if (self::$services == null) {
            self::$services = new SimpleContainer();
        }

        return self::$services->get($name);
    }
}
