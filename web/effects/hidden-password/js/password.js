const hidepassword = document.querySelector("input");
const showpassword = document.querySelector("span i");

// Function to check the click on the show password selector. //
showpassword.onclick = (()=>{

	if(hidepassword.type === "password")	{
		hidepassword.type = "text";
		showpassword.classList.add("hide-password");
	}
	else{
		hidepassword.type = "password";
		showpassword.classList.remove("hide-password");
	}
});