var isOperand = (c) => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789".includes(c);

var isOperator = (c) => "+-*/^".includes(c);

var rightReading = (c) => c == '^';

var priority = (c) => {
	switch(c){
		case '+':
		case '-':
			return 0;
			break;
		case '*':
		case '/':
			return 1;
			break;
		case '^':
			return 2;
			break;
	}
}

var checkPriority = (op1, op2) => {
	let op1p = priority(op1);
	let op2p = priority(op2);
	if(op1p == op2p)
		return !rightReading(op1);
	return op1p > op2p;
}

let expRead = "A + B * C";
let exp = expRead.split(' ');
var stack = [];
var expPos = "";
for(let i = 0; i < exp.length; i++){
	if(isOperator(exp[i])){
		while(stack.length != 0 && stack[0] != '(' && checkPriority(stack[0], exp[i])){
			expPos += stack.shift();
		}
		stack.unshift(exp[i]);
	}
	else if(isOperand(exp[i])){
		expPos += exp[i];
	}
	else if(exp[i] == '('){
		stack.unshift(exp[i]);
	}
	else if(exp[i] == ')'){
		while(stack.length != 0 && stack[0] != '('){
			expPos += stack.shift();
		}
		stack.shift();
	}
}

while(stack.length != 0) {
	expPos += stack.shift();
}

console.log(expPos);