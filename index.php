<?php
    require 'router/Router.php';

    session_start();

    $url = $_SERVER["REQUEST_URI"];

    $router = new Router();

    $router->route($url);
?>