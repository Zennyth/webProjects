const linkItemsChangeColor = document.querySelectorAll(".linkMenu");
background = [
["home","personR","Svg/personW.png","homeContent"],
["skills","schoolR","Svg/schoolW.png","skillContent"],
["project","pollR","Svg/pollW.png","projectContent"],
["contact-me","chatR","Svg/chatW.png","contact-meContent"],
["help", "Svg/destinyGhost.png", "Svg/destinyGhost.png", "helpBotContent"],
]
var indexChangeColor = 0;
infoDiv = document.querySelector(".info");
homeDiv = document.querySelector(".homeContent");
homeDiv.style.display = "none";

fallbackInfoDiv = 0;
form = document.querySelectorAll(".formCatch");
form.forEach(item => {
	item.onclick = function(){
		form.forEach(item => {
			var bar = document.querySelector("#" + item.id + "Bar");
			if(bar.classList.contains("skillBarRed"))
			{
				bar.classList.add("barChange");
				setTimeout(function() {
					bar.classList.remove("skillBarRed");
					bar.classList.remove("barChange");
				}, 1500);
			}
		})
		document.querySelector("#" + item.id + "Bar").classList.add("skillBarRed");
	}
})


onloadEnvelop = 0;

linkItemsChangeColor.forEach(item => {
	item.onclick = function() { 
		changePage(item);
	};
});

var job = document.querySelector(".position");
job.addEventListener("mouseenter", function(){
	for(span of job.children)
	{
		var elm = span;
		var newone = elm.cloneNode(true);
		elm.parentNode.replaceChild(newone, elm);
	}
})

function addSpecialAnimationEphemer(div, className, delay)
{
	div.classList.add(className);
	setTimeout(function() {
		div.classList.remove(className);
	}, delay*1000);
}
function changePage(item){
	if(fallbackInfoDiv == 0)
	{
		var indexLo = 0;
		indexChangeColor = 0;
		infoDiv.style.overflowY = "auto";
		addSpecialAnimationEphemer(infoDiv, "infoChange", 0.7);
		addSpecialAnimationEphemer(infoDiv, "changeDirection", 0.7);
		setTimeout(function() {
			infoDiv.style.display = "none";
		}, 700);
		setTimeout(function(){
			infoDiv.style.display = "";
			addSpecialAnimationEphemer(infoDiv, "infoChange", 0.7);
		},720)


		linkItemsChangeColor.forEach(item2 => {
			if(!item2.classList.contains("help"))
			{
				item2.classList.remove(background[indexChangeColor][1]);
				item2.style.backgroundSize = "40%";
				if(item.classList.contains(background[indexChangeColor][0]))
					indexLo = indexChangeColor;
			}
			document.getElementsByClassName(background[indexChangeColor][3])[0].style.display = "none";
			indexChangeColor ++;
		});
		if(!item.classList.contains("help"))
		{
			item.classList.add(background[indexLo][1])
			item.style.backgroundSize = "60%";
		}
		else{
			infoDiv.style.overflowY = "hidden";
			indexLo = 4;
		}
		setTimeout(function() {
			document.getElementsByClassName(background[indexLo][3])[0].style.display = "";
			addSpecialAnimationEphemer(document.getElementsByClassName(background[indexLo][3])[0], "sectionChange", 1);
			if(indexLo == 1){
				animateNumber();
			}
			else if(indexLo == 3)
			{
				if(onloadEnvelop == 0)
					initateEnvelop();
				onloadEnvelop = 1;
				(new initateEnvelop()).openCircle();
			}
		}, 1612);
		document.getElementsByClassName('info')[0].scrollTop='0px';
		setTimeout(function() {
			fallbackInfoDiv = 0;
		}, 2410);
		fallbackInfoDiv = 1;
	}
}
