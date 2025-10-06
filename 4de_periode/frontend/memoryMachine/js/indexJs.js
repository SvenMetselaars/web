// send ajax request
$.ajax({
    // use GET method to GET information
    type: 'get',
    // the place to GET the information from
    url: 'inc/functions.php',
    // Expect JSON response
    dataType: 'json',  
    // if it worked
    success: function(data) {
        // clear the leaderboard container
        $("#LeaderBoardSpots").html("");

        // go through all the information gotten form inc/functions.php
        $.each(data, function (key, item) {


            $("#LeaderBoardSpots").append("<tr>");
                                               // the information //
            $("#LeaderBoardSpots").append("<td>" + item.player + "</td>");
            $("#LeaderBoardSpots").append("<td>" + item.tries + "</td>");
            $("#LeaderBoardSpots").append("<td>" + item.time + "</td>");
            $("#LeaderBoardSpots").append("<td>" + item.dif + "</td>");
            $("#LeaderBoardSpots").append("</tr>");

        });
    },
    // if not worked
    error: function(xhr, status, error) {
        // log the error
        console.error("AJAX Error:", status, error);
    }
});

// if the radiobutton is pressed
function changeScore(value) {
    // send ajax request
    $.ajax({
        // use GET method to GET information
        type: 'get',
        // the place to GET the information from
        url: 'inc/functions.php',
        // to send the selected dificulty value to inc/functions.php
        data: { difficulty: value }, 
        // Expect JSON response
        dataType: 'json',
        success: function(data) {
            // clear the leaderboard container
            $("#LeaderBoardSpots").html("");  
    
            // go trough all the information gotten from inc/functions.php
            $.each(data, function (key, item) {

                $("#LeaderBoardSpots").append("<tr>");
                                                   // the information //
                $("#LeaderBoardSpots").append("<td>" + item.player + "</td>");
                $("#LeaderBoardSpots").append("<td>" + item.tries + "</td>");
                $("#LeaderBoardSpots").append("<td>" + item.time + "</td>");
                $("#LeaderBoardSpots").append("<td>" + item.dif + "</td>");
                $("#LeaderBoardSpots").append("</tr>");
                
            });
        },
        // if it didnt work
        error: function(xhr, status, error) {
            // log the error
            console.error("AJAX Error:", status, error);
        }
    });
}