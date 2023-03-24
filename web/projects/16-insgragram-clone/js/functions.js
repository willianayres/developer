var icone  = document.getElementById('sr');
var search = document.getElementById('search');
var x 	   = document.getElementById('x');

search.addEventListener('focus',function(){
	icone.style.left = "20px";
	x.style.display  = "inline-block";
});
search.addEventListener('blur',function(){
	icone.style.left = "65px";
	x.style.display  = "none";
});
var elements = document.getElementsByClassName('line__single');

function removerAbas(){
	var abasSelecao = document.getElementsByClassName('line__single');
	for(var i=0; i<abasSelecao.length; i++){
		abasSelecao[i].children[0].style.display = "none";
		abasSelecao[i].children[1].style.color   = "rgb(100,100,100)";
	}
}
var alternarAbas = function(){
	var aba 	= this.getAttribute('aba');
	var element = document.getElementById(aba);
	//Remover estilo.
	removerAbas();
	//Ocultar todas as abas.
	document.getElementById('publicacoes').style.display = "none";
	document.getElementById('igtv').style.display 		 = "none";
	document.getElementById('marcados').style.display 	 = "none";
	//Mostrar aba oculta.
	element.style.display = "block";
	//Adicionar classe para troca de aba.
	this.children[0].style.display = "block";
	this.children[1].style.color   = "black";
}
for(var i=0; i<elements.length; i++){
	elements[i].addEventListener('click',alternarAbas, false);
}