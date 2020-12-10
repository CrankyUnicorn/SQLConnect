<?php include 'htmldoc_start.php'; ?>

	<?php include 'view_player_character.php'; ?>
	<?php include 'view_character.php'; ?>
	<?php include 'view_character_info_category.php'; ?>
	<?php include 'view_character_info.php'; ?>

</div>
<div class="pc_forms_holder">

	<div class="pc_forms pc_margin">
		<h4>Adicionar Personagem</h4>
		<form action="insert_character.php" method="post">
			Nome da Personagem: <input type="text" name="character_name" style="width:98%;"><br>
			<button type="submit" value="addCharacter" name="addCharacter" style="width:100%;">Adicionar</button> 
		</form>
	</div>
	
	<div class="pc_forms pc_margin">
		<h4>Alterar Estado de Personagem</h4>
		<form action="state_character.php" method="post">
			ID da Personagem: <input type="text" name="character_id" style="width:98%;"><br>
			<button type="submit" value="stateCharacter" name="stateCharacter" style="width:100%;">Modificar</button> 
		</form>
	</div>	

	<div class="pc_forms pc_margin">
		<h4>Adicionar Categoria em Personagem</h4>
		<form action="insert_character_info_category.php" method="post">
			Nome da Categoria: <input type="text" name="info_category" style="width:98%;"><br>
			<button type="submit" value="addCharacterCategory" name="addCharacterCategory" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Informação ao Personagem</h4>
		<form action="insert_character_info.php" method="post">
			ID do Personagem: <input type="text" name="character_id" style="width:98%;"><br>
			ID da Categoria: <input type="text" name="character_info_id" style="width:98%;"><br>
			Informação: <input type="text" name="character_info" style="width:98%;"><br>
			<button type="submit" value="addCharacterInfo" name="addCharacterInfo" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Personagem a Jogador</h4>
		<form action="insert_player_character.php" method="post">
			ID da Jogador: <input type="text" name="player_id" style="width:98%;"><br>
			ID do Personagem: <input type="text" name="character_id" style="width:98%;"><br>
			<button type="submit" value="addPlayerCharacter" name="addPlayerCharacter" style="width:100%;">Adicionar</button> 
		</form>
	</div>

  <?php include 'htmldoc_end.php'; ?>
