<?php include 'htmldoc_start.php'; ?>

		<?php include 'view_character_match.php'; ?>
		<?php include 'view_match.php'; ?>
		<?php include 'view_match_info_category.php'; ?>
		<?php include 'view_match_info.php'; ?>

	</div>
	<div class="pc_forms_holder">

	<div class="pc_forms pc_margin">
		<h4>Adicionar Partida</h4>
		<form action="insert_match.php" method="post">
			Nome da Partida: <input type="text" name="match_name" style="width:98%;"><br>
			<button type="submit" value="addMatch" name="addMatch" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Alterar Estado da Partida</h4>
		<form action="state_match.php" method="post">
			ID da Partida: <input type="text" name="match_id" style="width:98%;"><br>
			<button type="submit" value="stateMatch" name="stateMatch" style="width:100%;">Modificar</button> 
		</form>
	</div>	

	<div class="pc_forms pc_margin">
		<h4>Adicionar Categoria em Partida</h4>
		<form action="insert_match_info_category.php" method="post">
			Nome da Categoria: <input type="text" name="info_category" style="width:98%;"><br>
			<button type="submit" value="addMatchCategory" name="addMatchCategory" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Informação ao Partida</h4>
		<form action="insert_match_info.php" method="post">
			ID do Partida: <input type="text" name="match_id" style="width:98%;"><br>
			ID da Categoria: <input type="text" name="match_info_id" style="width:98%;"><br>
			Informação: <input type="text" name="match_info" style="width:98%;"><br>
			<button type="submit" value="addMatchInfo" name="addMatchInfo" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Personagem a Partida</h4>
		<form action="insert_character_match.php" method="post">
			ID da Personagem: <input type="text" name="character_id" style="width:98%;"><br>
			ID do Match: <input type="text" name="match_id" style="width:98%;"><br>
			<button type="submit" value="addCharacterMatch" name="addCharacterMatch" style="width:100%;">Adicionar</button> 
		</form>
	</div>

  <?php include 'htmldoc_end.php'; ?>