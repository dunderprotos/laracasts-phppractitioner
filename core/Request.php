<?php
/**
 * Created by PhpStorm.
 * User: Sangeeth
 * Date: 26-Jun-17
 * Time: 21:08
 */

namespace App\Core;


class Request
{
    public static function method()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public static function path()
    {
        $path = trim(
            parse_url(
                $_SERVER["REQUEST_URI"],
                PHP_URL_PATH
            ),
            "/"
        );
        return $path;
    }
}