reveals = document.querySelectorAll(".reveal");
reveals.forEach(item => {
	item.onclick = function(){
		var theReveal = document.querySelector("#" + item.dataset.pointto);
		if(theReveal.style.display == "none")
		{
			item.style.transform = "rotate(-90deg)"
			theReveal.style.display = "";
			theReveal.classList.add("revealOpen");
			theReveal.children[2].style.display = "none";
			setTimeout(function() {
				theReveal.children[0].style.display = "";
				theReveal.children[0].classList.add("revealClose");
				setTimeout(function() {
					theReveal.children[0].style.display = "none";
					theReveal.style.backgroundColor = "#1c1e1f";
					theReveal.children[1].style.display = "";
					theReveal.children[2].style.display = "";
					theReveal.children[0].classList.remove("revealClose");
					theReveal.classList.remove("revealOpen");
				}, 500);
			}, 500);
		}
		else
		{
			item.style.transform = ""
			theReveal.style.display = "";
			theReveal.style.backgroundColor = "#991919";
			theReveal.classList.add("revealOpen");
			theReveal.children[1].style.display = "none";
			theReveal.children[2].style.display = "none";
			setTimeout(function() {
				theReveal.children[0].style.display = "";
				theReveal.children[0].classList.add("revealClose");
				setTimeout(function() {
					theReveal.children[0].style.display = "none";
					theReveal.children[0].classList.remove("revealClose");
					theReveal.classList.remove("revealOpen");
					theReveal.style.display = "none";
					theReveal.children[1].style.display = "none";
					theReveal.children[2].style.display = "";
				}, 500);
			}, 500);
		}
	}
})
function revealOneItem(theReveal){
	if(theReveal.style.display == "none")
	{
		theReveal.style.display = "";
		theReveal.children[0].style.display = "";
		theReveal.children[0].classList.add("coverCircle");
		setTimeout(function() {
			theReveal.children[1].style.display = "";
			theReveal.children[0].classList.remove("coverCircle");
			theReveal.children[0].classList.add("coverCirc");
		}, 1000);
		setTimeout(function() {
			theReveal.children[0].classList.add("coverCircleReverse");
			setTimeout(function() {
				theReveal.children[0].classList.remove("coverCircleReverse");
				theReveal.children[0].classList.remove("coverCirc");
			}, 1000);
		}, 1007);

	}
	else
	{
		theReveal.children[0].classList.add("coverCircle");
		setTimeout(function() {
			theReveal.children[1].style.display = "";
			theReveal.children[0].classList.remove("coverCircle");
			theReveal.children[0].classList.add("coverCirc");
			theReveal.children[1].style.display = "none";
		}, 1000);
		setTimeout(function() {
			theReveal.children[0].classList.add("coverCircleReverse");
			setTimeout(function() {
				theReveal.children[0].classList.remove("coverCircleReverse");
				theReveal.children[0].classList.remove("coverCirc");
				theReveal.style.display = "none";
				theReveal.children[1].style.display = "none";
			}, 1000);
		}, 1007);
	}
}


var skillsDesc = {
	"Front-end" : {
		"HTML":"Creating organise and functional website while still remaining easy to update.", 
		"CSS":"Building beautiful web pages with transition, animation while remaining responsive.", 
		"SCSS":"Designing interactif website with SCSS which it include less JS in order to optimise client performance.", 
		"JS":"Front-end developement with JS librairies like ThreeJS, Anuglar, View in order to create unrivaled websites."
	},
	"Back-end" : {
		"PHP":"Designing dynamic webpages using CSS, HTML and PHP.", 
		"JS":"Creating back-end appilcation with a JS run-tim environment like nodeJS in order to create restful API", 
		"JAVA":"Designing object-oriented applications with JAVA and VB.Net.", 
		"PYTHON":"Creating a database driven website with python frameworks like Django.", 
		"SQL/PLSQL":"Communicating with a database via SQL and PLSQL languages (ORACLE, PostgreSQL and MySQL). Administrating and managing Databases."
	},
	"Heavy-Application" : {
		"C#":"Designing purely procedural applications with C language.", 
		"JAVA":"Designing object-oriented applications with JAVA and VB.Net.", 
		"SQL/PLSQL":"Communicating with a database via SQL and PLSQL languages (ORACLE, PostgreSQL and MySQL). Administrating and managing Databases."
	},
	"Analytics" : {
		"PYTHON":"Analysing Data meaning with neuronal networks in python.", 
		"R":"Programming functions to organize and represent data.", 
		"FRONT":"Creating Data representation in JS with JSON file."
	},
	"Learning" : {
		"PYTHON":"Analysing Data meaning with neuronal networks in python."
	}
}
document.addEventListener("DOMContentLoaded", function(){
	var selectedLi = document.querySelectorAll(".selectedLi")
	selectedLi.forEach(li => {
		let desc = document.querySelector("#" + li.classList[0] + "Desc");
		desc.innerHTML = skillsDesc[li.classList[0]][li.id]
	})

	var ul = document.querySelectorAll(".skillsUl li");
	ul.forEach(li => {
		li.onclick = function(){
			let temp = li.children[0];
			var ulActual = document.querySelectorAll("." + temp.classList[0])
			ulActual.forEach(liActual => {
				liActual.classList.remove("selectedLi")
			})
			let desc = document.querySelector("#" + temp.classList[0] + "Desc");
			desc.innerHTML = skillsDesc[temp.classList[0]][temp.id]
			temp.classList.add("selectedLi")
		}
	})
})
