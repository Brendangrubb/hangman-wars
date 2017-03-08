<?php
 // Wednesday 9:21 PUSH
date_default_timezone_set('America/Los_Angeles');

 require_once __DIR__ . '/../vendor/autoload.php';
 require_once __DIR__ . '/../src/Phase.php';
 require_once __DIR__ . '/../src/GameState.php';

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
   $start_game = new GameState();
   $start_game->save();

   return $app['twig']->render("start.html.twig", array('game_id' => $start_game->id));
 });

 $app->post("/map/{id}", function($id) use ($app) {
   $state = GameState::find($id);

   return $app['twig']->render("map.html.twig", array('state' => $state, 'state_id' => $state->id));
 });

 $app->post("/gameplay/{id}", function($id) use ($app) {
    $difficulty = $_POST['difficulty'];
    $author_id = $_POST['author_id'];
    $state = GameState::find($id);
    $phase = new Phase();
    // alter method to search by author id
    $phase->setPhrase($author_id);
    //alter set Score to balance game
    $phase->setScore($difficulty);
    $phase->setValues();

    return $app['twig']->render("home.html.twig", array('phase' => $phase, 'author_id' => $author_id, 'state_id' => $state->id));
 });

 $app->post("/loss_condition", function() use ($app) {
   $author_id = $_POST['author_id'];
   $state_id = $_POST['state_id'];
   $state = GameState::find($state_id);
   $state->updateProperty("current_score",0);

   return $app['twig']->render("map.html.twig", array('state' => $state, 'state_id' => $state->id));
 });

 $app->post("/win_condition", function() use ($app) {
   $player_score = $_POST['final_score'];
   $author_id = $_POST['author_id'];
   $state_id = $_POST['state_id'];
   $state = GameState::find($state_id);
   $state->updateProperty("current_score",$player_score);
  //  find next realm by author_id, return string of property name
  $realm = GameState::findNextRealm($author_id);
  $state->updateProperty("{$realm}", true);
  // check for final win
  if ($author_id >= 13)
  {
    return $app->redirect("/final-win");
  }
   return $app['twig']->render("map.html.twig", array('state' => $state, 'state_id' => $state->id));
 });

 return $app;
 ?>
