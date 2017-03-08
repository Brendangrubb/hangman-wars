<?php

class Phase
{
    // constant values
    public $phrase;
    public $score;
    public $roundIndex;
    public $currentWord;
    public $availableLetters;
    public $guessLetters;
    public $displayLetters;

    //variable values
    public $numberOfWords;
    public $roundOrder;
    public $phrasePositions;
    public $displayPhrase;

    function __construct()
    {
        // set empty initializaiton values: roundindex = 0, guessletters, available letters, and displayletters are empty arrays, currentword = "",
        $this->availableLetters = [];
        $this->displayLetters = [];
        $this->guessLetters = [];
        $this->roundIndex = 0;
        $this->currentWord = "";
        $this->roundOrder = [];
        $this->displayPhrase = [];
    }

    function getPhrase()
    {
        return $this->phrase;
    }


    function setScore($difficulty, $player_score)
    {
        // initialize score
        if ($difficulty == "easy") {
          $this->score = 60 + $player_score;
          $this->computer_score = 20;
        } elseif ($difficulty == "medium") {
          $this->score = 45 + $player_score;
          $this->computer_score = 20;
        } elseif ($difficulty == "hard"){
          $this->score = 30 + $player_score;
          $this->computer_score = 20;
        }
    }

    function setPhrase($author_id)
    {
        // retreive the correct phrase from database
        $query = $GLOBALS['DB']->query("SELECT * FROM phrases WHERE author_id = {$author_id}");
        $random = rand(0,4);
        $result_array = $query->fetchAll();
        $result = $result_array[$random];
        $this->phrase = $result['phrase'];
    }
    // need to remove duplicate words and fix phrase positions counting
    function setValues()
    {
        // split phrase into array of individual words (explode by " ", return array of strings)
        $split_phrase = explode(' ', $this->phrase);
        //Initialize phrase positions with number of dummy characters equal to phrase length
        $this->phrasePositions = array_fill(0, count($split_phrase), "_");
        //count number of unique words in phrase (numberOfWords = phrase.length)
        $unique_phrase = array_unique($split_phrase);
        $this->numberOfWords = count($unique_phrase);
        //push word.length number of underscores into displayPhrase array
        foreach ($split_phrase as $word)
        {
            $displayPhrase = array_fill(0, strlen($word), "_");
            array_push($this->displayPhrase, implode('', $displayPhrase));

        }
        //for each word in phrase:
        $word_number = 0;
        foreach ($unique_phrase as $word)
        {
            $word_number += 1;
            //create property of this.("word" . 1-index of loop) = str_split of the word.
            $this->{"word" . $word_number} = str_split($word);
            //push 1-index integer into roundOrder array
            array_push($this->roundOrder, $word_number);
            //add values to phrasePositions:
            //loop over phrase array
            foreach ($split_phrase as $index => $replace_word)
            {
                //  if word == word in array
                //  write word number into phrase positions at index of found word
                if ($replace_word == $word) {
                    array_splice($this->phrasePositions, $index, 1, $word_number);
                }
            }

        }
        //randomize order of roundOrder */
        shuffle($this->roundOrder);
    }

}
?>
