<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/place.php";

    session_start();
    if (empty($_SESSION['list_of_cities'])) {
        $_SESSION['list_of_cities'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));


return app;

?>
