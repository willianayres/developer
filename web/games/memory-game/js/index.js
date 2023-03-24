document.addEventListener('DOMContentLoaded',()=>{

	const cardArray = [
		{name: 'assassin', img:'images/assassin.png'},
		{name: 'assassin', img:'images/assassin.png'},
		{name: 'knight', img:'images/knight.png'},
		{name: 'knight', img:'images/knight.png'},
		{name: 'ninja', img:'images/ninja.png'},
		{name: 'ninja', img:'images/ninja.png'},
		{name: 'paladin', img:'images/paladin.png'},
		{name: 'paladin', img:'images/paladin.png'},
		{name: 'rogue', img:'images/rogue.png'},
		{name: 'rogue', img:'images/rogue.png'},
		{name: 'wizard', img:'images/wizard.png'},
		{name: 'wizard', img:'images/wizard.png'}
	];

	cardArray.sort(() => 0.5 - Math.random())

	const grid          = document.querySelector('.grid');
	const resultDisplay = document.querySelector('#result');
	var cardsChosen     = [];
	var cardsChosenId   = [];
	const cardsWon      = [];
	// Create your board. //
	function createBoard(){
		for(let i=0; i<cardArray.length; i++){
			var card = document.createElement('img');
			card.setAttribute('src', 'images/whitebag.png');
			card.setAttribute('data-id', i);
			card.addEventListener('click', flipCard);
			grid.appendChild(card);
		}
	}
	// Check for matches. //
	function checkForMatch(){
		var cards         = document.querySelectorAll('img');
		const optionOneId = cardsChosenId[0];
		const optionTwoId = cardsChosenId[1];
		if(optionOneId == optionTwoId){
			cards[optionOneId].setAttribute('src', 'whitebag.png');
			cards[optionTwoId].setAttribute('src', 'whitebag.png');
			alert('You have clicked the same image!');
		}
		else if(cardsChosen[0] === cardsChosen[1]){
			alert('You found a match');
			cards[optionOneId].setAttribute('src', 'images/white.png');
			cards[optionTwoId].setAttribute('src', 'images/white.png');
			cards[optionOneId].removeEventListener('click', flipCard);
			cards[optionTwoId].removeEventListener('click', flipCard);
			cardsWon.push(cardsChosen);
		}else{
			cards[optionOneId].setAttribute('src', 'images/whitebag.png');
			cards[optionTwoId].setAttribute('src', 'images/whitebag.png');
			alert('Sorry, try again');
		}
		cardsChosen   = [];
		cardsChosenId = [];
		resultDisplay.textContent = cardsWon.length;
		if(cardsWon.length === cardArray.length / 2)
			resultDisplay.textContent = 'Congratulations! You found them all!';
	}
	// Flip your card. //
	function flipCard(){
		var cardId = this.getAttribute('data-id')
		cardsChosen.push(cardArray[cardId].name);
		cardsChosenId.push(cardId);
		this.setAttribute('src', cardArray[cardId].img);
		if (cardsChosen.length === 2)
			setTimeout(checkForMatch, 500)
	}
	createBoard();
});