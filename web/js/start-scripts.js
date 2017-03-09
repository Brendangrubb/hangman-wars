$(document).ready(function () {
    $('#hideshow').on('click', function(event) {
        $('#setup').toggle();
        $('#tutorial').toggle();
        $('.tutorial-button-div').toggle();
    });
});
