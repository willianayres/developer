let btnOne 	  = document.getElementById('btn');
let send	  = document.getElementById('sendmsg');
let close     = document.getElementById('plus');
let msg 	  = document.getElementById('msg');

btnOne.addEventListener("click", function() {
	btnOne.classList.toggle("move");
	msg.classList.toggle("resize");
	send.classList.toggle("send");
	close.classList.toggle("one-move");
});