function reloadPage(value) {
    console.log("Redirecting to:", 'index.php?dif=' + value); // Check the value in the console
    window.location.href = 'index.php?dif=' + value;
}

// only run function every second when html element with id timeSpent is present
if(document.getElementById("timeSpent") !== null)
{
    var serverTimer = setInterval(function()
    {
        $.ajax
        (
            {
                // address
                url     :   'inc/timer.php',
                // request method
                type    :   'get',
                // on success
                success : function(data,status,xhr)
                {
                    data = JSON.parse(data);
    
                    console.log(data.timeLeft);
                    console.log(data.timeSpent);
                    console.log(data.timeLeftGuess);

                    // write some data to browsers console
                    // update html
                    $("#timeSpent").html(data.timeSpent);
                    $("#timeLeft").html(data.timeLeft);
                    $("#timeLeftGuess").html(data.timeLeftGuess);
    
                    // check data
                    // when time left is lower than zero
                    if(data.timeLeft < 0.1 || data.timeLeftGuess < 0.1)
                    {
                        // clear timer
                        clearInterval(serverTimer);
    
                        window.location.href = "index.php?result=lost";
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