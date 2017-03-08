<?php
    class GameState
    {
        public $current_score;
        public $realm_one;
        public $realm_two;
        public $realm_three;
        public $realm_four;
        public $realm_five;
        public $id;

        function __construct($current_score=0,$realm_one = TRUE,$realm_two = FALSE,$realm_three = FALSE, $realm_four = FALSE, $realm_five = FALSE, $id=null)
        {
            $this->current_score = $current_score;
            $this->realm_one = $realm_one;
            $this->realm_two = $realm_two;
            $this->realm_three = $realm_three;
            $this->realm_four = $realm_four;
            $this->realm_five = $realm_five;
            $this->id = $id;
        }

        function setCurrentScore($new_score)
        {
            $this->current_score = $new_score;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO game_state (current_score, realm_one, realm_two, realm_three, realm_four, realm_five) VALUES ('{$this->current_score}', '{$this->realm_one}', '{$this->realm_two}', '{$this->realm_three}', '{$this->realm_four}', '{$this->realm_five}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function updateProperty($property, $value)
        {
            $GLOBALS['DB']->exec("UPDATE game_state SET {$property} = '{$value}' WHERE id = {$this->id};");
            $this->{$property} = $value;
        }

        static function getAll()
        {
            $found = $GLOBALS['DB']->query("SELECT * FROM game_state;");
            $game_state = [];
            foreach ($found as $game)
            {
                $current_score = $game['current_score'];
                $realm_one = ($game['realm_one']==1);
                $realm_two = ($game['realm_two']==1);
                $realm_three = ($game['realm_three']==1);
                $realm_four = ($game['realm_four']==1);
                $realm_five = ($game['realm_five']==1);
                $id = $game['id'];
                $new_game_state = new GameState($current_score, $realm_one, $realm_two, $realm_three, $realm_four, $realm_five, $id);
                array_push($game_state, $new_game_state);
            }
            return $game_state;
        }

        static function find($search_id)
        {
            $found = $GLOBALS['DB']->query("SELECT * FROM game_state WHERE id = {$search_id};");
            $game_state = null;
            foreach ($found as $game)
            {
                $current_score = $game['current_score'];
                $realm_one = ($game['realm_one']==1);
                $realm_two = ($game['realm_two']==1);
                $realm_three = ($game['realm_three']==1);
                $realm_four = ($game['realm_four']==1);
                $realm_five = ($game['realm_five']==1);
                $id = $game['id'];
                $game_state = new GameState($current_score, $realm_one, $realm_two, $realm_three, $realm_four, $realm_five, $id);
            }
            return $game_state;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM game_state;");
        }


    }





?>
