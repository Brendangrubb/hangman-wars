<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/GameState.php';


    $server = 'mysql:host=localhost:8889;dbname=hangman_wars_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class GameStateTest extends PHPUnit_Framework_TestCase
    {
        function test_find()
        {
            // Arrange
            $new_game_state = new GameState();
            var_dump($new_game_state);
            $new_game_state->save();

            // Act
            $result = GameState::find($new_game_state->id);
            // Assert
            $this->assertEquals($new_game_state, $result);
        }


    }







?>
