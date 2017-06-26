<?php
/**
 * Created by PhpStorm.
 * User: Sangeeth
 * Date: 26-Jun-17
 * Time: 21:52
 */

namespace App\Core\Database;


class Connection
{
    public static function make($config)
    {
        return new \PDO(
            "{$config['dsn']}:host={$config['host']};dbname={$config['dbname']}",
            $config["username"],
            $config["password"],
            $config["options"]
        );
    }
}