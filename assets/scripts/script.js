var menuToggle = true;
var playerRelated;
var characterRelated;
var matchRelated;
var vehicleRelated;
var mapRelated;
var cellRelated;
var pathRelated;
var pointRelated;

window.onload = function () {
	playerRelated = sessionStorage.getItem("pc_player_related");
	if (playerRelated == null) { playerRelated = "false"; }

	characterRelated = sessionStorage.getItem("pc_character_related");
	if (characterRelated == null) { characterRelated = "false"; }

	matchRelated = sessionStorage.getItem("pc_match_related");
	if (matchRelated == null) { matchRelated = "false"; }

	vehicleRelated = sessionStorage.getItem("pc_vehicle_related");
	if (vehicleRelated == null) { vehicleRelated = "false"; }

	mapRelated = sessionStorage.getItem("pc_map_related");
	if (mapRelated == null) { mapRelated = "false"; }

	cellRelated = sessionStorage.getItem("pc_cell_related");
	if (cellRelated == null) { cellRelated = "false"; }

	pathRelated = sessionStorage.getItem("pc_path_related");
	if (pathRelated == null) { pathRelated = "false"; }

	pointRelated = sessionStorage.getItem("pc_point_related");
	if (pointRelated == null) { pointRelated = "false"; }

	showNavButton("player", "false");
	showNavButton("character", "false");
	showNavButton("match", "false");
	showNavButton("vehicle", "false");
	showNavButton("map", "false");
	showNavButton("cell", "false");
	showNavButton("path", "false");
	showNavButton("point", "false");
}

function toggleNav() {
	if (menuToggle == false) {
		menuToggle = true;
		document.getElementById("pc_sidebar").style.width = "15%";
		document.getElementById("pc_body").style.width = "85%";
	} else if (menuToggle == true) {
		menuToggle = false;
		document.getElementById("pc_sidebar").style.width = "0%";
		document.getElementById("pc_body").style.width = "99%";
	}
}

function showNavButton(target, change) {
	var topic;
	var topicClass;

	switch (target) {
		case "player":
			topic = playerRelated;
			topicClass = "pc_player_related";
			break;

		case "character":
			topic = characterRelated;
			topicClass = "pc_character_related";
			break;

		case "match":
			topic = matchRelated;
			topicClass = "pc_match_related";
			break;

		case "vehicle":
			topic = vehicleRelated;
			topicClass = "pc_vehicle_related";
			break;

		case "map":
			topic = mapRelated;
			topicClass = "pc_map_related";
			break;

		case "cell":
			topic = cellRelated;
			topicClass = "pc_cell_related";
			break;

		case "path":
			topic = pathRelated;
			topicClass = "pc_path_related";
			break;

		case "point":
			topic = pointRelated;
			topicClass = "pc_point_related";
			break;

		default:
			break;
	}

	//on page load
	if (change == "false") {

		if (topic == "false") {

			var all = document.getElementsByClassName(topicClass);

			for (var i = 0, len = all.length | 0; i < len; i = i + 1 | 0) {
				all[i].style.display = "none";
			}
		} else if (topic == "true") {

			var all = document.getElementsByClassName(topicClass);

			for (var i = 0, len = all.length | 0; i < len; i = i + 1 | 0) {
				all[i].style.display = "block";
			}
		}

	} else {//on button click

		if (topic == "false") {
			
			sessionStorage.setItem("pc_player_related", "false");
			sessionStorage.setItem("pc_character_related", "false");
			sessionStorage.setItem("pc_match_related", "false");
			sessionStorage.setItem("pc_vehicle_related", "false");
			sessionStorage.setItem("pc_map_related", "false");
			sessionStorage.setItem("pc_cell_related", "false");
			sessionStorage.setItem("pc_path_related", "false");
			sessionStorage.setItem("pc_point_related", "false");
			
			sessionStorage.setItem(topicClass, "true");
			
		} else if (topic == "true") {
			sessionStorage.setItem(topicClass, "false");
			
		}
	}
}