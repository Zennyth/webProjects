function loaderInit(){
	var preLoader = document.querySelector("#preLoader");
	var sideBar = document.querySelector("#mySidebar");
	var resumeContent = document.querySelector(".resumeContent");
	var info = document.querySelector(".info");
	document.querySelector("*").style.overflow = "hidden";
	setTimeout(function(){
		preLoader.style.display = "none";
		sideBar.style.display = "";
		resumeContent.style.display = "";
		const strokeColor = "rgba(255, 0, 0, 0.5)";
		polygon.strokeColor = strokeColor;
		info.style.display = "";
		setTimeout(function(){
			infoDiv.classList.remove("infoChange");
			homeDiv.classList.add("sectionChange");
			homeDiv.style.display = "";
			setTimeout(function(){
				homeDiv.classList.remove("sectionChange");
				document.querySelector("*").style.overflowX = "unset";
				document.querySelector("*").style.overflowY = "unset";
			},1000)
		}, 500)
	},5500)

}