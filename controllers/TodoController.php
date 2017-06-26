<?php
/**
 * Created by PhpStorm.
 * User: Sangeeth
 * Date: 26-Jun-17
 * Time: 22:10
 */

namespace App\Controllers;
use App\Core\App;

class TodoController
{
    public function add()
    {
        $description = $_POST["description"];

        App::get("query")->insert("todos", [
            "description" => $description,
            "completed" => "false",
        ]);

        redirect("/todo");
    }

    public function display()
    {
        $results = App::get("query")->getResults("todos");

        view("display-todos", compact("results"));
    }

    public function update()
    {
        $id = $_POST["id"];
        $completed = !boolval($_POST["completed"]);

        App::get("query")->set("todos", ["id" => $id], [
            "completed" => $completed
        ]);

        redirect("/todo");
    }
}