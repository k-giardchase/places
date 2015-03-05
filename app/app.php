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

    $app->get("/", function () use ($app) {

        return $app['twig']->render('places.twig', array('places' => Place::getAll()));

    });

    $app->post("/places", function () use ($app) {
        $city = new Place($_POST['city_name'], $_POST['date']);
        $city->save();
        return $app['twig']->render('create_city.twig', array('newplace' => $city));
    });

    $app->post("/delete_city", function() use ($app){
        Place::deleteAll();
        return $app['twig']->render('delete_city.php');
    });


return $app;

?>
