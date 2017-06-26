<?php

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};

App::set("config", require "config.php");

App::set(
    "query",
    new QueryBuilder(
        Connection::make(App::get("config")["database"])
    )
);

function view($name, $vars = []) {
    extract($vars);
    require "views/{$name}.view.php";
}

function redirect($url) {
    header("Location: {$url}");
}