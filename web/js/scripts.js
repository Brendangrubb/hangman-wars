// for phrase Fear is the path to the dark side

function Game() {
    this.phrase= [1,2,3,4,5,3,6,7];
    this.word1 = ["f","e","a","r"];
    this.word2 = ["i","s"];
    this.word3 = ["t", "h", "e"];
    this.word4 = ["p","a", "t", "h"];
    this.word5 = ["t","o"];
    this.word6 = ["d", "a", "r", "k"];
    this.word7 = ["s", "i", "d" ,"e"];
    this.guessLetters = [];
    this.displayLetters = [];
    this.score = 40;
    this.availableLetters = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
    }

Game.prototype.lettersDisplay = function(word) {
    for (var i = 0; i <= this.word1.length; i++) {
        if (this.word1[i] === )
    }
    }
}

Game.prototype.randomColor= function () {
    var length = Object.keys(this).length;
    var rando = Math.floor((Math.random * length) + 1)
    return this["color" + rando];
};

Game.prototype.addYell = function(number) {
    var addnumber = 1+ number;
    alert("Adding one equals" + addnumber);
};


$(document).ready(function(){

    $(".box").click(function(){
        var length = Object.keys(game).length;
        var rando = Math.floor((Math.random() * length) + 1);
        $(this).css("background-color", game["color" + rando]);

    });

});
