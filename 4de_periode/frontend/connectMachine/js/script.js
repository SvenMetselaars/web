// Variables
var $cards = [];
let firstCard = null;
let lockBoard = false;
let gameWon = false;
let tries = 0;
let timeDown = 30;
let time = 0;
let timerWinScreen = 0;
let gamestarted = false;

const timerDownId = document.getElementById("gameTime");
const container = document.querySelector(".questions");
const triesId = document.getElementById("triesId");

const wrongSound = new Audio('sounds/failsound.mp3');
const rightSound = new Audio('sounds/right.wav');

// Generate memory cards
function generateMemoryCards(pairCount) {
    // the pairs that have to be connected
    const emojiData = [
        { emoji: "🍎", description: "Wears a stem like a fashion statement." },
        { emoji: "🍌", description: "Slips included." },
        { emoji: "🍒", description: "Pits of betrayal inside." },
        { emoji: "🍕", description: "box but circle but triangle?" },
        { emoji: "🍔", description: "burger." },
        { emoji: "🍓", description: "Tiny but full of flavor." },
        { emoji: "🍍", description: "Always spiky outside." },
        { emoji: "🍇", description: "You can be berry serious." },
        { emoji: "🥑", description: "You are what you eat." },
        { emoji: "🥕", description: "A root with a lot of charm." },
        { emoji: "🍋", description: "Sour little sunball." },
        { emoji: "🍑", description: "summer in fruit form." },
        { emoji: "🍈", description: "melon." },
        
        // Add more items if needed...
    ];

    // Shuffle emojiData to pick random elements
    for (let i = emojiData.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        [emojiData[i], emojiData[j]] = [emojiData[j], emojiData[i]];
    }

    // Select the first `pairCount`(5) elements after shuffle
    let selectedPairs = emojiData.slice(0, pairCount);

    // to pair the emoji to text by giving them the same id
    let cardPairs = selectedPairs.flatMap(({ emoji, description }, index) => [
        { type: 'emoji', value: emoji, pairId: index },
        { type: 'text', value: description, pairId: index }
    ]);

    // Shuffle the card pairs
    for (let i = cardPairs.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        [cardPairs[i], cardPairs[j]] = [cardPairs[j], cardPairs[i]];
    }

    // create the cards
    return cardPairs.map((card, index) => ({
        id: index,
        type: card.type,
        value: card.value,
        pairId: card.pairId,
        matched: false
    }));
}
// get place to store cards
const emojiContainer = document.querySelector(".emoji-cards");
const textContainer = document.querySelector(".text-cards");

function renderCards() {
    // empty the div for cards
    emojiContainer.innerHTML = "";
    textContainer.innerHTML = "";

    //this loops trough every cards
    $cards.forEach(card => {
        // create div give them class let them show the card value and store its id
        const cardElement = document.createElement("div");
        cardElement.classList.add("js-card");
        cardElement.textContent = card.value;
        cardElement.dataset.id = card.id;

        // give them the event that everytime someone clicks on it this happens
        cardElement.addEventListener("click", function () {
            // if the board is locked or the card is matched stop
            if (lockBoard || card.matched) return;

            gamestarted = true;
            // to add the class flipped (change style)
            cardElement.textContent = card.value;
            cardElement.classList.add("flipped");

            // if it is the first card pressed
            if (!firstCard) {
                // save data
                firstCard = { element: cardElement, data: card };
                // if not
            } else {
                // tries go up
                tries++;

                // if the cards are a match
                if (firstCard.data.pairId === card.pairId && firstCard.data.id !== card.id) {
                    // play sound
                    rightSound.play();
                    // store the info that they are matched
                    firstCard.data.matched = true;
                    card.matched = true;
                    // give class that they are matched (change style)
                    firstCard.element.classList.add("matched");
                    cardElement.classList.add("matched");
                    // clear firstcard
                    firstCard = null;
                    // chack if was final pair
                    checkWin();
                    // if not a match
                } else {
                    // lock the board
                    lockBoard = true;
                    // play sound
                    wrongSound.play();
                    // after half a sec this gets run
                    setTimeout(() => {
                        // remove class flipped
                        firstCard.element.classList.remove("flipped");
                        cardElement.classList.remove("flipped");
                        // clear first card
                        firstCard = null;
                        // time go up
                        time = time + 3;
                        // time go  down
                        timeDown = timeDown - 3;
                        // show the amount time left
                        timerDownId.innerHTML = "you have " + timeDown + " seconds left.";
                        // unlock board
                        lockBoard = false;
                    }, 500);
                }
            }
        });

        // Put in the right container so emoji in emoji container 
        if (card.type === "emoji") {
            emojiContainer.appendChild(cardElement);
        // and text in text container
        } else {
            textContainer.appendChild(cardElement);
        }
    });
}

// Check for win
function checkWin() {
    // get class it has to show
    const winScreenP = document.getElementById("winScreen_P");
    // if every card was matched
    if ($cards.every(card => card.matched)) {
        // game won info
        gameWon = true;
        gamestarted = false;
        // after half a sec this get run
        setTimeout(() => {
            // show winscreen
            document.getElementById("winScreen").style.display = "flex";
            winScreenP.innerHTML = `You Won in ${tries} tries!`;
        }, 500);
    }
}

// if the button is pressed
function sendData() {

    const username = document.getElementById("G_username").value;
    // Check if the input field is empty
    if (username.trim() === "") 
    {
        // to alert that it is empty
        alert("Username is required!");      
    }
    else if(gameWon === true)
    {
        // to send ajax info
        $.ajax({
            // use POST method to GIVE information
            type: 'POST',
            // the page it needs to send the info to
            url: 'inc/functions.php',
            // the data it is going to send to inc/functions.php
            data: { 
                username: username,
                tries: tries,
                time: time,
            },
            // if it worked it wil log in in the console
            success: function(data) {
                console.log("Succesfully stored in database");
                
            }
        });
        // to make them go to index.html
        window.location.href = `index.html`;
    }
    else{
        // to make them go to index.html
        window.location.href = `index.html`;
    }
}

// this is if the user presse no the info gets shown again after 10 sec
let enableTimer = false;

function hideWinScreen() {
    const username = document.getElementById("G_username").value;
    // Check if the input field is empty
    if (username.trim() === "") 
    {
        // if empty they get alert
        alert("Username is required!");      
    }
    else
    {
        // to make it disapear
        document.getElementById("winScreen").style.display = "none";
        // to start the timer
        enableTimer = true
    }
}

function showLeaderboard()
{
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
                $("#LeaderBoardSpots").append("</tr>");

            });
        },
        // if not worked
        error: function(xhr, status, error) {
            // log the error
            console.error("AJAX Error:", status, error);
        }
    });
}

// every second this gets run
setInterval(function() {

    if(enableTimer === false)
    {
    // if game is lost because of time
        if(timeDown <= 0)
        {           
            // to show winscreen again
            gamestarted = false;
            const WinScreen_P = document.getElementById("winScreen_P");
            document.getElementById("winScreen").style.display = "flex";
            WinScreen_P.innerHTML = "You Lost, go back to start screen?";
        } 
        // if game isnt won yet
        else if(gameWon != true && gamestarted === true)
        {
            time++;
            timeDown--;  // Decrease time for Player 1
        
            // Update timer displays
            timerDownId.innerHTML = "you have " + timeDown + " seconds left.";
        }
    }
    // if they pressed no when they won or lost
    else if(enableTimer == true)
    {
        timerWinScreen++;
        // after 10 seconds it gets shown again
        if(timerWinScreen >= 10)
        {
            document.getElementById("winScreen").style.display = "flex";
            timerWinScreen = 0;
            enableTimer = false;
        }
    }

}, 1000);

// Start the game
window.onload = function () {
    $cards = generateMemoryCards(5); // 5 pairs = 10 cards
    renderCards();
};