// for phrase Fear is the path to the dark side

function Phase() {
    this.phrase = "Fear is the path to the dark side";
    this.phrasePositions = [1,2,3,4,5,3,6,7];
    this.numberOfWords = 7;
    this.roundOrder = [3,4,1,6,2,7,5]; //randomize on server
    this.roundIndex = 0;
    this.currentword = "";
    this.word1 = ["f","e","a","r"];
    this.word2 = ["i","s"];
    this.word3 = ["t", "h", "e"];
    this.word4 = ["p","a", "t", "h"];
    this.word5 = ["t","o"];
    this.word6 = ["d", "a", "r", "k"];
    this.word7 = ["s", "i", "d" ,"e"];
    this.guessLetters = [];
    this.displayLetters = []; //initialize funciton pushes underscores for lenght of selected word
    this.displayPhrase = ["____", "__", "___", "____", "__", "___", "____", "____"]; //server fills with underscores for all words
    this.score = 40;
    this.availableLetters = [];
}

/* functions and data needed:

Randomly select a word to work on, initialize round values

checkLetter(): After a letter is guessed, add it to display, remove from available letters, score, check if round is won

checkRoundCheck if phase is won/lost, on win add to displayPhrase.

update Display: display letters, available letters

run animation

event listeners for user input


Logic Flow:
user input of one letter
add to guessLetters array
Run checkLetter()
run checkPhaseWin()
    (if phase win)
    congrats display page
    (if phase loss)
    loss display page
run checkRoundWin()
    if (no round win)
        prompt for input
    (round win, no phase win)
        select new word, add to phrase, initialize displays

*/

Phase.prototype.initialize = function()
{
    this.currentword = 'word' + this.roundOrder[this.roundIndex];
    // empty display, then fill with correct number of underscores
    this.displayLetters = [];
    for (i=0;i<this[this.currentword].length;i++)
    {
        this.displayLetters.push("_");
    }
    // set available letters to full alphabet
    this.availableLetters = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
    this.guessLetters = [];
}

Phase.prototype.display = function()
{
  //display full phrase
  $("#displayPhrase").text(this.displayPhrase.join(" "));
    // display current word, all previously guessed words
  $("#displayLetters").text(this.displayLetters.join(" "));
  //display available alphabet
  $("#availableLetters").text(this.availableLetters.join(" "));
}

Phase.prototype.checkLetter = function(letter)
{
    //add to guessed letters,
    this.guessLetters.push(letter);
    // remove from available letters,
    var indexAlpha = this.availableLetters.indexOf(letter);
    this.availableLetters.splice(indexAlpha, 1, "_");
    // decrement score or update display as appropriate
    var isCorrect = (this[this.currentword].indexOf(letter) >= 0);
    if (isCorrect)
    {
        for (i=0; i<this[this.currentword].length;i++)
        {
            if (letter === this[this.currentword][i]){
                this.displayLetters.splice(i,1,letter);
            }
        }
    } else {
        this.score -= 1;
    }
}

Phase.prototype.checkPhase = function()
{
    //check if score === 0, trigger loss
    if (this.score <= 0) {
        alert("loss!"); //replace with navigation to loss page
    }
    // then if all of displayPhrase is filled in, trigger win
    if (this.roundIndex > this.roundOrder.length) {
        alert("Winzzz!"); //replace with navigation to win page
    }
}

Phase.prototype.checkRound = function()
{
    // check if display array matches the current word, initialize if yes.
    if (this.displayLetters.join() === this[this.currentword].join() )
    {
        for(i = 0; i < this.numberOfWords; i++) {
            if (this.phrasePositions[i] === this.roundOrder[this.roundIndex]) {
                this.displayPhrase.splice(i, 1, this[this.currentword].join(""));
            }
        }
        this.roundIndex ++;
        this.initialize();
    }
}



$(document).ready(function(){
var phase = new Phase();
phase.initialize();
phase.display();

  $("#guess_letter_form").submit(function(event) {
    event.preventDefault();
    var guessedLetter = ($("input#guess_letter").val());
    // alert(guessedLetter);
    phase.checkLetter(guessedLetter);
    phase.checkPhase();
    phase.checkRound();
    phase.display();
  });
    // $(".box").click(function(){
    //     var length = Object.keys(game).length;
    //     var rando = Math.floor((Math.random() * length) + 1);
    //     $(this).css("background-color", game["color" + rando]);
    //
    // });

});
