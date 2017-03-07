<?php

class Phase
{
    // constant values
    private $phrase;
    private $score;
    private $roundIndex;
    private $currentword;
    private $availableLetters;
    private $guessLetters;
    private $displayLetters;

    //variable values
    private $numberOfWords;
    private $roundOrder;
    private $phrasePositions;
    private $displayPhrase;


    /*
      Class Behaviors:
      database holds quote phrases as strings

      retreive the correct phrase from database

      set empty initializaiton values: roundindex = 0, guessletters, available letters, and displayletters are empty arrays, currentword = "",

      initialize score

      split phrase into array of individual words (explode by " ", return array of strings)
      count number of words in phrase (numberOfWords = phrase.length)

      for each word in phrase:
      create property of this.("word" . 1-index of loop) = str_split of the word.
      push 1-index integer into roundOrder array
      push word.length number of underscores into displayPhrase array
      Initialize phrase positions with number of dummy characters equal to phrase length
      add values to phrasePositions:
        loop over phrase array
            if word == word in array
                write word number into phrase positions at index of found word



      randomize order of roundOrder
    */

    function __construct()
    {
        $this->availableLetters = [];
        $this->displayLetters = [];
        $this->guessLetters = [];
        $this->roundIndex = 0;
        $this->currentword = "";
    }

    function getPhrase()
    {
        return $this->phrase;
    }


    function setScore()
    {
        $this->score = 40;
    }

    function setPhrase($search_id)
    {
        $query = $GLOBALS['DB']->query("SELECT * FROM phrases WHERE id = {$search_id}");
        $result = $query->fetch();
        $this->phrase = $result['phrase'];
    }

    function setValues()
    {

    }

}
?>
