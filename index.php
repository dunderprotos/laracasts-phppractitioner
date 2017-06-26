<?php

require "vendor/autoload.php";
require "core/bootstrap.php";

use App\Core\{Router, Request};

Router::load("core/routes.php")
    ->direct(Request::path(), Request::method());