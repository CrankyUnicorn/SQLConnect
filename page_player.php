<?php include 'htmldoc_start.php'; ?>

	<?php include 'view_player.php'; ?>
	<?php include 'view_player_info_category.php'; ?>
	<?php include 'view_player_info.php'; ?>

</div>
<div class="pc_forms_holder">


	<div class="pc_forms pc_margin">
		<h4>Adicionar Jogador</h4>
		<form action="insert_player.php" method="post">
			Alcunha: <input type="text" name="nick_name" style="width:98%;"><br>
			Password: <input type="text" name="password" style="width:98%;"><br>
			E-mail: <input type="text" name="email" style="width:98%;"><br>
			<button type="submit" value="addPlayer" name="addPlayer" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Alterar Estado de Jogador</h4>
		<form action="state_player.php" method="post">
			ID da Jogador: <input type="text" name="player_id" style="width:98%;"><br>
			<button type="submit" value="statePlayer" name="statePlayer" style="width:100%;">Modificar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Categoria em Jogador</h4>
		<form action="insert_player_info_category.php" method="post">
			Nome da Categoria: <input type="text" name="info_category" style="width:98%;"><br>
			<button type="submit" value="addPlayerCategory" name="addPlayerCategory" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Informação ao Jogador</h4>
		<form action="insert_player_info.php" method="post">
			ID do Jogador: <input type="text" name="player_id" style="width:98%;"><br>
			ID da Categoria: <input type="text" name="player_info_id" style="width:98%;"><br>
			Informação: <input type="text" name="player_info" style="width:98%;"><br>
			<button type="submit" value="addPlayerInfo" name="addPlayerInfo" style="width:100%;">Adicionar</button> 
		</form>
	</div>
  
  <?php include 'htmldoc_end.php'; ?>