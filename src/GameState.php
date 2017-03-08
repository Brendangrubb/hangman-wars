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

        function __construct()
        {
            $this->current_score = 0;
            $this->realm_one = TRUE;
            $this->realm_two = FALSE;
            $this->realm_three = FALSE;
            $this->realm_four = FALSE;
            $this->realm_five = FALSE;
            $this->id = null;
        }

        function setCurrentScore($new_score)
        {
            $this->current_score = $new_score;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO game_state (current_score, realm_one, realm_two, realm_three, realm_four, realm_five) VALUES ({$this->current_score}, {$this->realm_one}, {$this->realm_two}, {$this->realm_three}, {$this->realm_four}, {$this->realm_five});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function find($search_id)
        {
            $found_game_state = $GLOBALS['DB']->query("SELECT * FROM game_state WHERE id = {$search_id};");
            $found_game_state->setFetchMode(PDO::FETCH_CLASS, 'GameState');
            $game_state = $found_game_state->fetch();
            return $game_state;
        }


    }





?>
