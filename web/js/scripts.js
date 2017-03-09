// for phrase Fear is the path to the dark side

function Phase() {

    this.phrase;
    this.phrasePositions;
    this.numberOfWords;
    this.roundOrder; //randomize on server
    this.roundIndex;
    this.currentWord;
    this.word1;
    this.word2;
    this.word3;
    this.word4;
    this.word5;
    this.word6;
    this.word7;
    this.guessLetters;
    this.displayLetters; //initialize funciton pushes underscores for lenght of selected word
    this.displayPhrase;
    this.score;
    this.computer_score;
    this.availableLetters;

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
    this.currentWord = 'word' + this.roundOrder[this.roundIndex];
    // empty display, then fill with correct number of underscores
    this.displayLetters = [];
    for (i=0;i<this[this.currentWord].length;i++)
    {
      if (this[this.currentWord][i].match(/[a-z]/i)== null) {
        this.displayLetters.push(this[this.currentWord][i]);
      } else {
        this.displayLetters.push("_");
      }
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
  //display letters that have been guessed so Far
  $("#alreadyGuessed").text(this.guessLetters.join(" "));
  //display scores for player and computer-knight
  $(".scoring").text(this.score);
  $("#computer_score").text(this.computer_score);
}

Phase.prototype.checkLetter = function(letter)
{
    //add to guessed letters,

    // remove from available letters,
  if (this.availableLetters.indexOf(letter) >= 0) {
    var indexAlpha = this.availableLetters.indexOf(letter);
    this.availableLetters.splice(indexAlpha, 1, "_");
  }
  // decrement score or update display as appropriate
  var searchWord = this[this.currentWord].join("").toLowerCase();
  var isCorrectIndex = searchWord.indexOf(letter) >= 0;
  if (isCorrectIndex)
  {
      for (i=0; i<this[this.currentWord].length;i++)
      {
          if (letter === this[this.currentWord][i].toLowerCase()){
              this.displayLetters.splice(i,1,letter);
              if (this.guessLetters.indexOf(letter) < 0) {
                this.guessLetters.push(letter);
              }
          }
      }
  } else {
    if (this.guessLetters.indexOf(letter) < 0) {
      this.guessLetters.push(letter);
      this.score -= 1;
      $("#player-knights").append('<img src="../img/Knight-graphic-colors-anim.gif" alt="A picture of a knight" class="player-knight-death">');
      $("#player-knight3").remove();
      $("#player-knights").append('<img src="../img/Knight-graphic.png" alt="A picture of a knight" id="player-knight3" class="animated fadeInLeftBig">');
      if (this.score === 2) {
        $("#player-knights").append('<img src="../img/Knight-graphic-colors-anim.gif" alt="A picture of a knight" class="player-knight-death">');
        $("#player-knight3").remove();
        $("#player-knight2").remove();
        $("#player-knights").append('<img src="../img/Knight-graphic.png" alt="A picture of a knight" id="player-knight2" class="animated fadeInLeftBig">');
      } else if (this.score === 1) {
        $("#player-knights").empty();
        $("#player-knights").append('<img src="../img/Knight-graphic.png" alt="A picture of a knight" id="player-knight1" class="animated fadeInLeftBig">');
      }
    }
  }
}

Phase.prototype.checkPhase = function()
{
    //check if score === 0, trigger loss
    if (this.score <= 0) {
      $('#end_state').show();
      $('#total_loss').show();
      $("#play_state").hide();
    }
    // then if all of displayPhrase is filled in, trigger win
    if (this.displayPhrase.join("").indexOf("_") < 0) {
      this.displayPhrase = this.phrase;
      var player_strength = this.score;
      var computer_strength = Math.floor(this.computer_score * (Math.random()+.5));
      var battle_result = player_strength - computer_strength;
      if (battle_result < 0)
      {
        this.score = 0;
        this.computer_score = 0;
        $('#end_state').show();
        $("#battle_lose").show();
        $("#play_state").hide();


        //Lovely Animation
      } else {
        this.computer_score = 0;
        document.getElementById("final_score").value = battle_result;
        $('#end_state').show();
        $("#battle_win").show();
        $("#play_state").hide();
      }
    }
}

Phase.prototype.checkRound = function()
{
    // check if display array matches the current word, initialize if yes.
    if (this.displayLetters.join() === this[this.currentWord].join().toLowerCase() )
    {
        for(i = 0; i <= this.phrasePositions.length; i++) {
            if (this.phrasePositions[i] === this.roundOrder[this.roundIndex]) {
                this.displayPhrase.splice(i, 1, this[this.currentWord].join(""));
            }
        }
        this.roundIndex ++;
        if (this.roundIndex < this.numberOfWords) {
          this.initialize();
        }
    }
}



$(document).ready(function(){
// var phase = new Phase();
phase.initialize();
phase.display();

  $("#guess_letter_form").on("input", function() {
    $(".player-knight-death").remove();
    var guessedLetter = ($("input#guess_letter").val());
    phase.checkLetter(guessedLetter);
    phase.checkRound();
    phase.display();
    phase.checkPhase();
    $("input#guess_letter").val("");

  });

  $("#guess_letter_form").submit(function(event) {
    event.preventDefault();
  });

  // $("#guess_letter_form").submit(function(event) {
  //   event.preventDefault();
  //   var guessedLetter = ($("input#guess_letter").val());
  // });
    // $(".box").click(function(){
    //     var length = Object.keys(game).length;
    //     var rando = Math.floor((Math.random() * length) + 1);
    //     $(this).css("background-color", game["color" + rando]);
    //
    // });

});
