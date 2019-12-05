document.addEventListener("DOMContentLoaded", function(){
	var inputChatBot = document.querySelector("#message");
	inputChatBot.addEventListener("keyup", function(){
		if (event.keyCode === 13) {
	        onMessage(this);
	    }
	})
})
function getData(){
	let url="http://localhost:8080/chatBot/";
    fetch(url).then(response => response.json())
    .then( (result) => {
        console.log('success:', result)
    })
    .catch(error => console.log('error:', error));
}
function onMessage(input){
	let url="http://localhost:8080/chatBot/?message="+input.value;
	var value = input.value;
    fetch(url).then(response => response.json())
    .then( (result) => {
    	if(result.error){
    		createDOMMessages(value, "Oops something went wrong, sorry ...");
    		console.log(result.error);
    	}
    	else{
    		createDOMMessages(value, result.responseBot);
        	if(result.section)
        		setTimeout(function(){changePage(document.querySelector("."+result.section))}, 1100)
    	}
    })
    .catch(error => console.log('error:', error));
    input.value = "";
}
function createDOMMessages(msgPerson, msgBot){
	let toClone = document.querySelector(".container");
	let containerPerson = toClone.cloneNode(true);
	let containerBot = toClone.cloneNode(true);
	let response = document.querySelector(".response");

	containerBot.querySelector("p").innerHTML  = msgBot;
	containerPerson.querySelector("p").innerHTML  = msgPerson;

	let today = new Date();
	if(today.getMinutes() < 10)
	{
		containerBot.querySelector("span").innerHTML  = today.getHours()+":0"+today.getMinutes();
		containerPerson.querySelector("span").innerHTML  = today.getHours()+":0"+today.getMinutes();
	}
	else
	{
		containerBot.querySelector("span").innerHTML  = today.getHours()+":"+today.getMinutes();
		containerPerson.querySelector("span").innerHTML  = today.getHours()+":"+today.getMinutes();
	}

	containerPerson.querySelector("span").classList.remove("time-right");
	containerPerson.querySelector("span").classList.add("time-left");

	containerPerson.querySelector("img").classList.add("right");
	
	containerPerson.classList.add("darker");

	response.appendChild(containerPerson);
	response.appendChild(containerBot);
	$(response).stop().animate({
	  scrollTop: $(response)[0].scrollHeight
	}, 400);
}