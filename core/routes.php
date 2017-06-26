<?php

$router->get("", "PageController@home");
$router->get("about", "PageController@about");
$router->get("contact", "PageController@contact");
$router->get("todo", "TodoController@display");
$router->post("todo/add", "TodoController@add");
$router->post("todo/update", "TodoController@update");