var menuToggle = true;

function toggleNav() {
	if(menuToggle == false){
		menuToggle = true;
		document.getElementById("pc_sidebar").style.width = "15%";
		document.getElementById("pc_body").style.width = "85%";
	}else if(menuToggle == true){
		menuToggle = false;
		document.getElementById("pc_sidebar").style.width = "0%";
		document.getElementById("pc_body").style.width = "99%";
	}
}