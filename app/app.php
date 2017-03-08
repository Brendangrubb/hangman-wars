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

 $app->get("/map", function() use ($app) {
   $phase = new Phase();
   $phase->setPhrase(2);
   $phase->setScore();
   $phase->setValues();

   return $app['twig']->render("map.html.twig", array('phase' => $phase));
 });

 $app->get("/", function() use ($app) {
    $phase = new Phase();
    $phase->setPhrase(2);
    $phase->setScore();
    $phase->setValues();

    return $app['twig']->render("home.html.twig", array('phase' => $phase));
 });

 $app->post("/total_loss", function() use ($app) {
   $phase = new Phase();
   $phase->setPhrase(2);
   $phase->setScore();
   $phase->setValues();

   return $app['twig']->render("map.html.twig", array('phase' => $phase));
 });

 $app->post("/loss_condition", function() use ($app) {
   $phase = new Phase();
   $phase->setPhrase(2);
   $phase->setScore();
   $phase->setValues();

   return $app['twig']->render("map.html.twig", array('phase' => $phase));
 });

 $app->post("/win_condition", function() use ($app) {
   $player_score = $_POST['final_score'];
   $phase = new Phase();
   $phase->setPhrase(2);
   $phase->setScore();
   $phase->setValues();

   return $app['twig']->render("map.html.twig", array('phase' => $phase));
 });

 $app->get('/final-win', function() use ($app) { // PAGE TO DISPLAY WITH FINAL GAME WIN

   return $app['twig']->render("final-win.html.twig");
 });

 $app->post('/final-win-route', function() use ($app) { // PAGE TO ROUTE PLAY AGAIN BUTTON

   return $app->redirect("/");
 });

 return $app;
 ?>
