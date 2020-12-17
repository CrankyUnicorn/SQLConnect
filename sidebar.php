<!--sidebar-->
<div class="pc_menubutton" onclick="toggleNav()"></div>
<div id="pc_sidebar" class="pc_sidebar">
  <img src="assets/images/logo_white.png" alt="Logo" width="170px" style="padding: 0 0 8px 18px; opacity:60%;"><br>
  
  <!--PLAYER-->
  <div onclick="showNavButton('player','true')">
    <div class="pc_marker pc_magenta"></div><a href="page_player.php">Jogadores</a>
  </div>
  
  <div class="pc_player_related" >
    <div class="pc_marker pc_red_magenta"></div><a href="page_player_character.php">Personagens de Jogadores</a>
  </div>

  <!--CHARACTER-->
  <div onclick="showNavButton('character','true')">
    <div class="pc_marker pc_red"></div><a href="page_character.php">Personagens</a>
  </div>

  <div class="pc_character_related" >
    <div class="pc_marker pc_red_magenta"></div><a href="page_player_character.php">Personagens de Jogadores</a>
  </div>

  <div class="pc_character_related" >
    <div class="pc_marker pc_orange_red"></div><a href="page_character_match.php">Partidas de Personagens</a>
  </div>

  <div class="pc_character_related" >
    <div class="pc_marker pc_yellow_red"></div><a href="page_character_vehicle.php">Veículos de Personagens</a>
  </div>

  <div class="pc_character_related" >
    <div class="pc_marker pc_teal_red"></div><a href="page_character_path.php">Caminhos das Personagens</a>
  </div>

  <!--MATCH-->
  <div onclick="showNavButton('match','true')">
    <div class="pc_marker pc_orange"></div><a href="page_match.php">Partidas</a>
  </div>

  <div class="pc_match_related" >
    <div class="pc_marker pc_orange_red"></div><a href="page_character_match.php">Partidas de Personagens</a>
  </div>

  <div class="pc_match_related" >
    <div class="pc_marker pc_yellow_orange"></div><a href="page_match_vehicle.php">Veículos de Partidas</a>
  </div>

  <div class="pc_match_related" >
    <div class="pc_marker pc_lightgreen_orange"></div><a href="page_match_map.php">Mapas das Partidas</a>
  </div>

  <!--VEHICLE-->
  <div onclick="showNavButton('vehicle','true')">
    <div class="pc_marker pc_yellow"></div><a href="page_vehicle.php">Veículos</a>
  </div>

  <div class="pc_vehicle_related" >
    <div class="pc_marker pc_yellow_red"></div><a href="page_character_vehicle.php">Veículos de Personagens</a>
  </div>

  <div class="pc_vehicle_related" >
    <div class="pc_marker pc_yellow_orange"></div><a href="page_match_vehicle.php">Veículos de Partidas</a>
  </div>

  <div class="pc_vehicle_related" >
    <div class="pc_marker pc_teal_yellow"></div><a href="page_vehicle_path.php">Caminhos dos Veículos</a>
  </div>

  <!--MAP-->
  <div onclick="showNavButton('map','true')">
    <div class="pc_marker pc_lightgreen"></div><a href="page_map.php">Mapa</a>
  </div>

  <div class="pc_map_related" >
    <div class="pc_marker pc_lightgreen_orange"></div><a href="page_match_map.php">Mapas das Partidas</a>
  </div>

  <div class="pc_map_related" >
    <div class="pc_marker pc_green_lightgreen"></div><a href="page_map_cell.php">Células dos Mapas</a>
  </div>

  <!--CELL-->
  <div onclick="showNavButton('cell','true')">
    <div class="pc_marker pc_green"></div><a href="page_cell.php">Células</a>
  </div>

  <div class="pc_cell_related" >
    <div class="pc_marker pc_green_lightgreen"></div><a href="page_map_cell.php">Células dos Mapas</a>
  </div>

  <!--PATH-->
  <div onclick="showNavButton('path','true')">
    <div class="pc_marker pc_teal"></div><a href="page_path.php">Caminhos</a>
  </div>

  <div class="pc_path_related" >
    <div class="pc_marker pc_teal_red"></div><a href="page_character_path.php">Caminhos das Personagens</a>
  </div>

  <div class="pc_path_related" >
    <div class="pc_marker pc_teal_yellow"></div><a href="page_vehicle_path.php">Caminhos dos Veículos</a>
  </div>

  <div class="pc_path_related" >
    <div class="pc_marker pc_lightblue_teal"></div><a href="page_path_point.php">Pontos dos Caminhos</a>
  </div>

  <!--POINT-->
  <div onclick="showNavButton('point','true')">
    <div class="pc_marker pc_lightblue"></div><a href="page_point.php">Pontos</a>
  </div>

  <div class="pc_point_related" >
    <div class="pc_marker pc_lightblue_teal"></div><a href="page_path_point.php">Pontos dos Caminhos</a>
  </div>
</div>