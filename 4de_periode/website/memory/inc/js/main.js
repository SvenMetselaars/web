var $cards = [];
const container = document.querySelector(".js-card-container");
let firstCard = null;
let lockBoard = false;

function generateMemoryCards(pairCount) {
    let numbers = [];
    for (let i = 0; i < pairCount; i++) {
        let num = Math.floor(Math.random() * 1000);
        numbers.push(num, num);
    }
    
    for (let i = numbers.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        [numbers[i], numbers[j]] = [numbers[j], numbers[i]];
    }
    
    $cards = numbers.map((num, index) => ({ id: index, value: num, matched: false }));
}

function renderCards() {
    container.innerHTML = "";
    
    $cards.forEach(card => {
        const cardElement = document.createElement("div");
        cardElement.classList.add("js-card");
        cardElement.textContent = "?";
        cardElement.dataset.id = card.id;
        
		cardElement.addEventListener("click", function() {
			if (lockBoard || card.matched || cardElement.textContent !== "?") return;
		
			// Reveal number and add flipped state
			cardElement.textContent = card.value;
			cardElement.classList.add("flipped");
		
			if (!firstCard) {
				firstCard = { element: cardElement, data: card };
			} else {
				if (firstCard.data.value === card.value && firstCard.data.id !== card.id) {
					// Mark as matched (turns red)
					firstCard.data.matched = true;
					card.matched = true;
					firstCard.element.classList.add("matched");
					cardElement.classList.add("matched");
					firstCard = null;
					checkWin();
				} else {
					lockBoard = true;
					setTimeout(() => {
						// Hide again (turns back to blue)
						firstCard.element.textContent = "?";
						cardElement.textContent = "?";
						firstCard.element.classList.remove("flipped");
						cardElement.classList.remove("flipped");
						firstCard = null;
						lockBoard = false;
					}, 500);
				}
			}
		});
		
        
        container.appendChild(cardElement);
    });
}

function checkWin() {
    if ($cards.every(card => card.matched)) {
        setTimeout(() => {
            document.getElementById("winModal").style.display = "flex";
        }, 500);
    }
}

function restartGame() {
    location.reload();
}

function closeModal() {
    document.getElementById("winModal").style.display = "none";
}