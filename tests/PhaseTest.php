<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Phase.php';


    $server = 'mysql:host=localhost:8889;dbname=hangman_wars_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class PhaseTest extends PHPUnit_Framework_TestCase
    {
        function test_getPhrase()
        {
            // Arrange
            $phrase_id = 1;
            $test_phase = new Phase();
            $test_phase->setPhrase($phrase_id);

            // Act
            $result = $test_phase->getPhrase();
            // Assert
            $this->assertEquals("Fear is the path to the dark side", $result);
        }

        function test_setValues()
        {
            // Arrange
            $phrase_id = 1;
            $test_phase = new Phase();
            $test_phase->setPhrase($phrase_id);

            // Act
            $test_phase->setValues();
            var_dump($test_phase);

            // Assert
            $this->assertEquals($phrase_id, $phrase_id);
        }

    }







?>
