function generatePassword(size=8, nums=8, low=0, top=0, sbs=0){
	let abc = "abcdefghijklmnopqrstuvwxyz";
	let ABC = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	let num = "0123456789";
	let syb = "!@#$%&*-_+=`´(){}[]^~|,.;/?";
	let password = '';
	if(size < 8)
		password += Array(size).fill(abc+ABC+syb+num).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
	else{
		let p1 = Array(nums).fill(num).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
		let p2 = Array(low).fill(abc).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
		let p3 = Array(top).fill(ABC).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
		let p4 = Array(sbs).fill(syb).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
		password = p1+p2+p3+p4;
		console.log(password);
	}
	return password.shuffle();
}	
String.prototype.shuffle = function (){
    var a = this.split(""),
        n = a.length;
    for (var i=n-1; i>0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
    return a.join("");
}
function getPassword(){
	document.getElementById("password").innerHTML = '';
	let arr = [Number(getOptionValue("size")), Number(getOptionValue("numbers")), Number(getOptionValue("lower")), Number(getOptionValue("topper")), Number(getOptionValue("symbols"))];
	var x = generatePassword(arr[0], arr[1], arr[2], arr[3], arr[4]);
	document.getElementById("password").innerHTML = x;
}
function generateOptions(id, size, ini=0){
	sel = document.getElementById(id);
	sel.innerHTML = '';
	for(let i = ini; i<=size; i++){
		op = document.createElement("option");
		op.textContent = i;
		sel.appendChild(op);
	}
}
function getOptionValue(id){
	sel = document.getElementById(id);
	return sel.options[sel.selectedIndex].value;
}
document.addEventListener("DOMContentLoaded", function(event) {
	generateOptions("size", 24);
	generateOptions("numbers",0);
	generateOptions("lower",0);
	generateOptions("topper",0);
	generateOptions("symbols",0);
});