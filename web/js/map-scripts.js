$(document).ready(function() {

  $("#button_1").click(function(event) {
    event.preventDefault();
    $("#sub_1").toggle();
    $("#Dickens").toggleClass("no_whitespace");
    $("#sub_2").hide();

  });

  $("#button_2").click(function(event) {
    event.preventDefault();
    $("#sub_2").toggle();
    $("#sub_1").hide();
  });

  $("#button_3").click(function(event) {
    event.preventDefault();
    $("#sub_3").toggle();
    $("#Poe").toggleClass("no_whitespace");
    $("#sub_4").hide();
    $("#sub_5").hide();

  });

  $("#button_4").click(function(event) {
    event.preventDefault();
    $("#sub_4").toggle();
    $("#Woolf").toggleClass("no_whitespace");
    $("#sub_3").hide();
    $("#sub_5").hide();
  });

  $("#button_5").click(function(event) {
    event.preventDefault();
    $("#sub_5").toggle();
    $("#sub_3").hide();
    $("#sub_4").hide();
  });

  $("#button_6").click(function(event) {
    event.preventDefault();
    $("#sub_6").toggle();
    $("#Tolstoy").toggleClass("no_whitespace");
    $("#Twain").toggleClass("no_whitespace");
    $("#Wilde").toggleClass("no_whitespace");
    $("#sub_7").hide();
    $("#sub_8").hide();
    $("#sub_9").hide();
  });

  $("#button_7").click(function(event) {
    event.preventDefault();
    $("#sub_7").toggle();
    $("#Austen").toggleClass("no_whitespace");
    $("#Twain").toggleClass("no_whitespace");
    $("#Wilde").toggleClass("no_whitespace");
    $("#sub_6").hide();
    $("#sub_8").hide();
    $("#sub_9").hide();

  });

  $("#button_8").click(function(event) {
    event.preventDefault();
    $("#sub_8").toggle();
    $("#Austen").toggleClass("no_whitespace");
    $("#Tolstoy").toggleClass("no_whitespace");
    $("#Wilde").toggleClass("no_whitespace");
    $("#sub_6").hide();
    $("#sub_7").hide();
    $("#sub_9").hide();
  });

  $("#button_9").click(function(event) {
    event.preventDefault();
    $("#sub_9").toggle();
    $("#Tolstoy").toggleClass("no_whitespace");
    $("#Twain").toggleClass("no_whitespace");
    $("#Wilde").toggleClass("no_whitespace");
    $("#sub_6").hide();
    $("#sub_7").hide();
    $("#sub_8").hide();

  });

  $("#button_10").click(function(event) {
    event.preventDefault();
    $("#sub_10").toggle();
    $("#Hemingway").toggleClass("no_whitespace");
    $("#sub_11").hide();
    $("#sub_12").hide();
  });

  $("#button_11").click(function(event) {
    event.preventDefault();
    $("#sub_11").toggle();
    $("#Stevenson").toggleClass("no_whitespace");
    $("#sub_10").hide();
    $("#sub_12").hide();
  });

  $("#button_12").click(function(event) {
    event.preventDefault();
    $("#sub_12").toggle();
    $("#sub_10").hide();
    $("#sub_11").hide();
  });

  $("#button_13").click(function(event) {
    event.preventDefault();
    $("#sub_13").toggle();
    $("#StarWars").toggleClass("no_whitespace");
    $("#sub_14").hide();

  });

  $("#button_14").click(function(event) {
    event.preventDefault();
    $("#sub_14").toggle();
    $("#sub_13").hide();

  });


});
