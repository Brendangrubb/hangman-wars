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
        protected function teardown()
        {
            GameState::deleteAll();
        }

        function test_find()
        {
            // Arrange
            $new_game_state = new GameState();
            $new_game_state->save();

            // Act
            $result = GameState::find($new_game_state->id);

            // Assert
            $this->assertEquals($new_game_state, $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $new_game_state = new GameState();
            $new_game_state->save();

            // Act
            GameState::deleteAll();
            $result = GameState::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_getAll()
        {
            // Arrange
            $new_game_state = new GameState();
            $new_game_state->save();

            // Act
            $result = GameState::getAll();

            // Assert
            $this->assertEquals([$new_game_state], $result);
        }

        function test_update()
        {
            // Arrange
            $new_game_state = new GameState();
            $new_game_state->save();
            $new_game_state->updateProperty("realm_three", true);

            // Act
            $game_state = GameState::find($new_game_state->id);
            $result = $game_state->realm_three;

            // Assert
            $this->assertEquals(true, $result);
        }


    }







?>
