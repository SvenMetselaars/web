// the card array
var $cards = [];

let firstCard = null;
let lockBoard = false;
let gameWon = false;
let tries = 0;
let tries_P2 = 0;
let player1turn = true;
let time = 0;
let setsFound = 0;
let setsFound_P2 = 0;

const triesId = document.getElementById("tries");
const triesId_P2 = document.getElementById("tries_P2");
const setsId = document.getElementById("sets");
const setsId_P2 = document.getElementById("sets_P2");
const container = document.querySelector(".cardsDiv");
// to get the dificulty and max time
const difficulty = getUrlParameter('dif');
const maxTime = getUrlParameter('S_max');
const amountplayers = getUrlParameter('player_a');
// to get the time in seconds
let timeDown = maxTime * 60; 
let timeDown_P2 = maxTime * 60; 

// to generate the cards
function generateMemoryCards(pairCount) {
    // the emojis used
    const emojis = ["🍎", "🍌", "🍒", "🍇", "🍉", "🥑", "🍕", "🍔", "🍟", "🍩", "🎂", "🍭", "🍫", "🍓", "🧁",
                    "🍊", "🍍", "🍑", "🍍", "🥝", "🥥", "🍆", "🌶️", "🥒", "🍅", "🌽", "🍞", "🧀", "🍗", "🍖", 
                    "🍤", "🍳", "🍲", "🍿", "🍦", "🍧", "🍨", "🍪", "🍫", "🍬", "🥧", "🍯", "🥞", "🍶", "🍺",];
    
    // to get the emojis that are gonna be used 0 = first pearcound is last
    let selectedEmojis = emojis.slice(0, pairCount); 
    // it dubbles the emojis and then puts it in one big array
    let emojiPairs = selectedEmojis.flatMap(emoji => [emoji, emoji]); 
    
    // shake the emojis to radom places
    // Start from the last element and move backwards through the array
    for (let i = emojiPairs.length - 1; i > 0; i--) {
        //Pick a random index j between 0 and i (+1 so it includes the last one)
        let j = Math.floor(Math.random() * (i + 1));
        // to make them switch places
        [emojiPairs[i], emojiPairs[j]] = [emojiPairs[j], emojiPairs[i]];
    }

    // to make the cards objects and put it in the array
    $cards = emojiPairs.map((emoji, index) => ({ id: index, value: emoji, matched: false }));
    gamestarted = true;
}

// to show the card and show what state it is in. nothing, flipped and matched
function renderCards() { 
    // to empty the container
    container.innerHTML = "";
    
    // go trough all the cards
    $cards.forEach(card => {
        // create dif
        const cardElement = document.createElement("div");
        // give that dif the class "js-card"
        cardElement.classList.add("js-card");
        // show the text "?"
        cardElement.textContent = "?";
        // and give it its id
        cardElement.dataset.id = card.id;
        
        // if the card is clicked event added
        cardElement.addEventListener("click", function() {

            // if board is locked (won) or the card is already mached / flipped then nothing happens and the next card gets rendered
            if (lockBoard || card.matched || cardElement.textContent !== "?") return;
            // to reveal emoji and give the class flipped
            cardElement.textContent = card.value;
            cardElement.classList.add("flipped");
        
            // if there is already a card flipped
            if (!firstCard) {
                // to know a card if flipped
                firstCard = { element: cardElement, data: card };
            } else {
                // Update tries based on whose turn it is
                if (player1turn) {
                    tries++;  // Increment Player 1's tries
                    triesId.innerHTML = tries;  // Update Player 1's tries display
                } else {
                    tries_P2++;  // Increment Player 2's tries
                    triesId_P2.innerHTML = tries_P2;  // Update Player 2's tries display
                }
                // if the emoji's are the same and the first card isnt tapped twice
                if (firstCard.data.value === card.value && firstCard.data.id !== card.id) {
                    // to save the info that it is matched
                    firstCard.data.matched = true;
                    card.matched = true;
                    // to show the player that it is matched (giving it the class matched)
                    firstCard.element.classList.add("matched");
                    cardElement.classList.add("matched");

                    // to set the firstcard variable to null
                    firstCard = null;
                    
                    // update the amount of sets found
                    if (player1turn) {
                        setsFound++;
                        setsId.innerHTML = setsFound;  // Update Player 1's sets display
                    } else {
                        setsFound_P2++;  // Increment Player 2's tries
                        setsId_P2.innerHTML = setsFound_P2;  // Update Player 2's tries display
                    }

                    // to check if the game is won
                    checkWin();
                    // if it wasnt a pair
                } else {
                    // to lockboard
                    lockBoard = true;
                    // after 500 miliseconds this gets run
                    setTimeout(() => {
                        // to show a "?" again
                        firstCard.element.textContent = "?";
                        cardElement.textContent = "?";
                        // to remove the class flipped so the styling changed
                        firstCard.element.classList.remove("flipped");
                        cardElement.classList.remove("flipped");
                        // to set the firstcard variable to null
                        firstCard = null;
                        // to set lockboard to false
                        lockBoard = false;
                    }, 500);
                }
                if(amountplayers === "2")
                {
                    // Toggle the player turn
                    player1turn = !player1turn;
                }
            }
        });

        // to put the card in the dif it should be in
        container.appendChild(cardElement);
    });
    
}

// to check if the game is won
function checkWin() {
    // to get the place where the win screen should be in
    var WinScreen_P = document.getElementById("winScreen_P");
    // if all the cards are mached
    if ($cards.every(card => card.matched)) {
        gameWon = true;
        gamestarted = false;
        // after 500 miliseconds this gets run
        setTimeout(() => {
            // to make it apear
            document.getElementById("winScreen").style.display = "flex";
            // to show this text
            WinScreen_P.innerHTML = "You Won, go back to start screen?";
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
    else if (gameWon === true)
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
                difficulty: difficulty 
            },
            // if it worked it wil log in in the console
            success: function(data) {
                console.log("Succesfully stored in database");
                
            }
        });
        // to make them go to index.html
         window.location.href = `index.html`;
    }
    else {
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

// script.js (in game.html)

function getUrlParameter(name) {
    // too get the info from the url
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Function to determine the number of pairs based on difficulty
function amountOfTries() {
    let pairCount;
    switch(difficulty) {
        // if easy is selected
        case 'easy':
            pairCount = 9;
            break;
        // if medium is selected
        case 'medium':
            pairCount = 18;
            break;
        // if hard is selected
        case 'hard':
            pairCount = 27;
            break;
        // to make it easyer to playtest
        case 'hacker':
            pairCount = 1;
            break;
        default:
            pairCount = 18; // Default to medium if no valid difficulty is passed
    }
    return pairCount;
}

const timerDownId = document.getElementById("timerDown");
const timerDownId_P2 = document.getElementById("timerDown_P2");
const timerUpId = document.getElementById("timerUp");
const timerUpId_P2 = document.getElementById("timerUp_P2");
let cardsDiv = document.querySelector(".cardsDiv");
let gameStats = document.querySelector(".gameStats");
let gameStats_P2 = document.querySelector(".gameStats_P2");

// it check every milisecond if it is the same hight. if not it changes it
setInterval(function() {
    if (cardsDiv && gameStats) {
        gameStats.style.height = `${cardsDiv.offsetHeight - 40}px`;
        gameStats.style.top = `${cardsDiv.offsetTop}px`;
        gameStats_P2.style.top = `${cardsDiv.offsetTop}px`;
        gameStats_P2.style.height = `${cardsDiv.offsetHeight - 40}px`;
    }
    if(amountplayers === "2")
    {
        if (player1turn) {
            gameStats.style.backgroundColor = "rgba(0, 128, 0, 0.6)";
            gameStats_P2.style.backgroundColor = "#ffffff75";
        } else {
            gameStats_P2.style.backgroundColor = "rgba(0, 128, 0, 0.6)";
            gameStats.style.backgroundColor = "#ffffff75";
        }
    }
}, 1);

// every second this gets run
setInterval(function() {
    if(enableTimer === false)
    {
        // if game is lost because of time
        if(timeDown <= 0)
        {           
            // to show winscreen again
            const WinScreen_P = document.getElementById("winScreen_P");
            document.getElementById("winScreen").style.display = "flex";
            WinScreen_P.innerHTML = "You Lost, go back to start screen?";
            gamestarted = false;
        } 
        if(timeDown_P2 <= 0)
        {           
            // to show winscreen again
            const WinScreen_P = document.getElementById("winScreen_P");
            document.getElementById("winScreen").style.display = "flex";
            WinScreen_P.innerHTML = "player 2 Lost, go back to start screen?";
            gamestarted = false;
        } 
        // if game isnt won yet
        else if(gameWon != true && (gamestarted === true))
        {
            console.log(gamestarted);
            time++;
            // timer go up
            if (player1turn) {
                console.log("Player 1 turn, timeLeft: ", timeDown);
                timeDown--;  // Decrease time for Player 1
            } else {
                console.log("Player 2 turn, timeLeft: ", timeDown_P2);
                timeDown_P2--;  // Decrease time for Player 2
            }
        
            // Update timer displays
            timerDownId.innerHTML = timeDown;
            timerUpId.innerHTML = time;
            timerDownId_P2.innerHTML = timeDown_P2;
            timerUpId_P2.innerHTML = time;
        }
    }
    // if they pressed no when they won or lost
    if(enableTimer == true)
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

var BoardDif

// Log the number of pairs based on difficulty
console.log("Pair Count: ", amountOfTries());

// to create the cards
generateMemoryCards(amountOfTries());
// to show the cards
renderCards();

if(amountplayers === "1")
{
    // to not show the player 2 game stats
    document.querySelector(".gameStats_P2").style.display = "none";
    document.querySelector(".disapear").style.display = "none";
}
else if(amountplayers === "2")
{
    // to show the p2 game stats
    document.querySelector(".gameStats_P2").style.display = "flex";
    document.querySelector(".disapear").style.display = "block";
}
