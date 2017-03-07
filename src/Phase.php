<?php

class Phase
{
    // constant values
    private $phrase;
    private $score;
    private $roundIndex;
    private $currentWord;
    private $availableLetters;
    private $guessLetters;
    private $displayLetters;

    //variable values
    private $numberOfWords;
    private $roundOrder;
    private $phrasePositions;
    private $displayPhrase;

    function __construct()
    {
        // set empty initializaiton values: roundindex = 0, guessletters, available letters, and displayletters are empty arrays, currentword = "",
        $this->availableLetters = [];
        $this->displayLetters = [];
        $this->guessLetters = [];
        $this->roundIndex = 0;
        $this->currentWord = "";
    }

    function getPhrase()
    {
        return $this->phrase;
    }


    function setScore()
    {
        // initialize score
        $this->score = 40;
    }

    function setPhrase($search_id)
    {
        // retreive the correct phrase from database
        $query = $GLOBALS['DB']->query("SELECT * FROM phrases WHERE id = {$search_id}");
        $result = $query->fetch();
        $this->phrase = $result['phrase'];
    }

    function setValues()
    {
        // split phrase into array of individual words (explode by " ", return array of strings)
        $split_phrase = explode(' ', $this->phrase);
        //count number of words in phrase (numberOfWords = phrase.length)
        $this->numberOfWords = count($split_phrase);
        //Initialize phrase positions with number of dummy characters equal to phrase length
        $this->phrasePositions = array_fill(0, count($split_phrase), "_");
        //for each word in phrase:
        foreach ($split_phrase as $key => $word)
        {
            //create property of this.("word" . 1-index of loop) = str_split of the word.
            $this->{"word" . ($key + 1)} = explode('', $word);
            //push 1-index integer into roundOrder array
            array_push($this->$roundOrder, ($key + 1));
            //push word.length number of underscores into displayPhrase array
            $displayPhrase = array_fill(0, strlen($word), "_");
            array_push($this->displayPhrase, implode('', $displayPhrase);
            //add values to phrasePositions:
            //loop over phrase array
            foreach ($split_phrase as $index => $replace_word)
            {
                //  if word == word in array
                //  write word number into phrase positions at index of found word
                if ($replace_word == $word) {
                    array_splice($this->phrasePositions, $index, 1, ($key + 1);
                }
            }

        }
        //randomize order of roundOrder */
        shuffle($this->roundOrder);
    }

}
?>
