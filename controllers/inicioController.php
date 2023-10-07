<?php

class inicioController
{
    public function index()
    {
        require_once "models/Home.php";
        $home = new Home();
        $index = $home->index();
        require_once "views/home.php";
    }
}