<?php

namespace App\Core;

class App {
    protected static $bindings = [];

    public static function set($key, $val)
    {
        static::$bindings[$key] = $val;
    }

    public static function get($key)
    {
        if(array_key_exists($key, static::$bindings)) {
            return static::$bindings[$key];
        } else {
            throw new \Exception("Given key[{$key}] not bound to anything.");
        }
    }
}