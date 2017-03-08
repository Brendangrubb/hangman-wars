<?php
 // Wednesday 9:21 PUSH
date_default_timezone_set('America/Los_Angeles');

 require_once __DIR__ . '/../vendor/autoload.php';
 require_once __DIR__ . '/../src/Phase.php';

 $app = new Silex\Application();

 $app['debug']=true;

 $server = 'mysql:host=localhost:8889;dbname=hangman_wars';
 $username = 'root';
 $password = 'root';
 $DB = new PDO($server, $username, $password);

 use Symfony\Component\HttpFoundation\Request;
 Request::enableHttpMethodParameterOverride();

 $app->register(new Silex\Provider\TwigServiceProvider(), [
     'twig.path' => __DIR__ . '/../views/'
 ]);

 $app->get("/", function() use ($app) {

    $phase = new Phase();
    $phase->setPhrase(2);
    $phase->setScore();
    $phase->setValues();
    return $app['twig']->render("home.html.twig", array('phase' => $phase));
 });

 $app->post("/loss_condition", function() use ($app) {
   $player_score = $_POST['player_score'];
   $computer_score = $_POST['computer_score'];
   echo($player_score);
   echo($computer_score);
   $game = new Gamer();
   $game = json_encode($game);

   return $app['twig']->render("home.html.twig", array('game' => $game));
 });

 return $app;
 ?>
