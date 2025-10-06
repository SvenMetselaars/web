// only run function every second when html element with id timeSpent is present
if(document.getElementById("timeSpent") !== null)
{
    var serverTimer = setInterval(function()
    {
        $.ajax
        (
            {
                // address
                url     :   '../inc/timer.php',
                // request method
                type    :   'get',
                // on success
                success : function(data,status,xhr)
                {
                    data = JSON.parse(data);
    
                    console.log(data.timeLeft);
                    console.log(data.timeSpent);
                    // write some data to browsers console
                    // update html
                    $("#timeSpent").html(data.timeSpent);
                    $("#timeLeft").html(data.timeLeft);
    
                    // check data
                    // when time left is lower than zero
                    if(data.timeLeft <= 0.1)
                    {
                        // clear timer
                        clearInterval(serverTimer);
    
                        // set form fields attributes
                        $("#btnPlayForm").html("Game Over!");
                        $("#btnPlayForm").attr("disabled", "disabled");
                        $("#myGuess").attr("placeholder", "Game Over!!");
                        $("#myGuess").attr("disabled", "disabled");
                    }
                },
                // on error
                error   : function(jqXhr, textStatus, errorMessage)
                {
                    $('#errorMessage').html('<strong>Error: ' + jqXhr.statusText + " (status : " + jqXhr.status + ")</strong>");
                    console.log('jqXhr = ' + JSON.stringify(jqXhr));
                    console.log('textStatus = ' + textStatus);
                    console.log('errorMessage = ' + errorMessage);
                    console.log('jqXhr.statusText = ' + jqXhr.statusText);
                }
            }
        )
    }, 100);
}