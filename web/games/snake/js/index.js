document.addEventListener('DOMContentLoaded',()=>{

	const sqr = document.querySelectorAll('.grid div');
	const score = document.querySelector('#score');
	const start = document.querySelector('#start');
	// Get the size of the board. //
	const size = Math.sqrt(sqr.length);
	// Start the index in 0. //
	let currentIndex = 0;
	// Start the apple index in 0. //
	let apple = 0;
	// Start the snake array. //
	let snake = [2, 1, 0];
	// Set the direction to right. //
	let direction = 1;
	// Set the score as 0. //
	let points = 0;
	// Set the initial speed. //
	let speed = size/10 - 0.1;
	let intervalTime = 0;
	let interval = 0;
	// Function to start the game. //
	function startGame(){
		snake.forEach(index => sqr[index].classList.remove('snake'));
		sqr[apple].classList.remove('apple');
		clearInterval(interval);
		points = 0;
		randomApple();
		direction = 1;
		score.innerText = points;
		intervalTime = 1000;
		snake = [2, 1, 0];
		currentIndex = 0;
		snake.forEach(index => sqr[index].classList.add('snake'));
		interval = setInterval(moveOutcomes, intervalTime);
	}
	// --------------------------- //
	// All colisions of the snake. //
	function moveOutcomes(){
		// Snake bad colisions. //
		if(
			// Check if the snake hits the bottom wall. //
			(snake[0] + size >= (size * size) && direction === size ) ||
			// Check if the snake hits the right wall. //
			(snake[0] % size === size -1 && direction === 1) ||
			// Check if the snake hits the left wall. //
			(snake[0] % size === 0 && direction === -1) ||
			// Check if the snake hits the top wall. //
			(snake[0] - size < 0 && direction === -size) ||
			// Check if the snake hits itself. //
			sqr[snake[0] + direction].classList.contains('snake')
		)
			return clearInterval(interval);
		// Remove the last coordenate of the snake. //
		const tail = snake.pop();
		// Remove the snake class from the tail of the snake. //
		sqr[tail].classList.remove('snake');
		// Check for direction of the snake. //
		snake.unshift(snake[0] + direction);
		// If the snake gets the apple. //
		if(sqr[snake[0]].classList.contains('apple')){
			sqr[snake[0]].classList.remove('apple');
			sqr[tail].classList.add('snake');
			snake.push(tail);
			randomApple();
			points++;
			score.textContent = points;
			clearInterval(interval);
			if (points % (size/2) === 0)
				intervalTime *= speed;
			else
				intervalTime = intervalTime;
			interval = setInterval(moveOutcomes, intervalTime);
		}
		sqr[snake[0]].classList.add('snake');
	}
	// --------------------------- //
	// Generate a new apple. //
	function randomApple(){
		// Check if the apple was not spawn on the snake. //
		do{
			apple = Math.floor(Math.random() * sqr.length);
		}while(sqr[apple].classList.contains('snake'));
		// If it was not, put the apple on the board. //
		sqr[apple].classList.add('apple');
	}
	// --------------------- //
	// Function to read keys from the keyboard. //
	function control(key){
		sqr[currentIndex].classList.remove('snake');
		// If the RIGHT KEY was pressed, the snake start moving to right. //
		if(key.keyCode === 39)
			direction = 1 ;
		// If the UP KEY was pressed, the snake start moving to up. //
		else if (key.keyCode === 38)
			direction = -size;
		// If the LEFT KEY was pressed, the snake start moving to left. //
		else if (key.keyCode === 37)
			direction = -1.
		// If the DOWN KEY was pressed, the snake start moving to down. //
		else if (key.keyCode === 40)
			direction = +size;
	}
	// ---------------------------------------- //
	document.addEventListener('keyup', control);
	start.addEventListener('click', startGame);
});
