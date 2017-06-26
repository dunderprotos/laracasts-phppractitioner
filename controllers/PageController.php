<?php
/**
 * Created by PhpStorm.
 * User: Sangeeth
 * Date: 26-Jun-17
 * Time: 21:16
 */

namespace App\Controllers;


class PageController
{
    public function home()
    {
        view("index");
    }

    public function about()
    {
        view("about");
    }

    public function contact()
    {
        view("contact");
    }
}