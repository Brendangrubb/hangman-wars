<?php

date_default_timezone_set('America/Los_Angeles');

 require_once __DIR__ . '/../vendor/autoload.php';
 require_once __DIR__ . '/../src/Gamer.php';

 $app = new Silex\Application();

 $app['debug']=true;

 // $server = 'mysql:host=localhost:8889;dbname=library';
 // $username = 'root';
 // $password = 'root';
 // $DB = new PDO($server, $username, $password);

 use Symfony\Component\HttpFoundation\Request;
 Request::enableHttpMethodParameterOverride();

 $app->register(new Silex\Provider\TwigServiceProvider(), [
     'twig.path' => __DIR__ . '/../views/'
 ]);

 $app->get("/", function() use ($app) {
      $game = new Gamer();
      $game = json_encode($game);
     return $app['twig']->render("home.html.twig", array('game' => $game));
 });

 return $app;
 ?>
