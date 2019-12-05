KonamiCode();
function KonamiCode()
{
	var k = [38, 38],
	n = 0;
	document.addEventListener("keydown", function(e){
		if (e.keyCode === k[n++]) {
	        if (n === k.length) {
	        	makeGhostAppear();
	            n = 0;
	            return false;
	        }
	    }
	    else {
	        n = 0;
	    }
	})
}
function makeGhostAppear()
{
	revealOneItem(document.querySelector("#divSpectre"))
	var ghostIcon = document.querySelector(".help");
	var ghost = document.querySelector(".spectre");
	if(ghostIcon.style.display == ""){
		if(document.querySelector(".helpBotContent").style.display == "")
			setTimeout(function(){
				changePage(document.querySelector(".home"));
			},500)	
		ghostIcon.style.display = "none";
	}
	else
		ghostIcon.style.display = "";

}