<?php include 'htmldoc_start.php'; ?>

	<?php 
	//hope you just to need to change this
	$fileName = "player"; 
	$pathSufix = $fileName."/"; 
	$topic = "Jogador"; 
	?>

	<?php include $pathSufix.'view_'.$fileName.'.php'; ?>
	<?php include $pathSufix.'view_'.$fileName.'_info_category.php'; ?>
	<?php include $pathSufix.'view_'.$fileName.'_info.php'; ?>

</div>
<div class="pc_forms_holder">


	<div class="pc_forms pc_margin">
		<h4>Adicionar <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix);?>insert_<?php echo($fileName);?>.php" method="post">
			Alcunha: <input type="text" name="name" style="width:98%;"><br>
			Password: <input type="text" name="password" style="width:98%;"><br>
			E-mail: <input type="text" name="email" style="width:98%;"><br>
			<button type="submit" value="add" name="add" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Alterar Estado de <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>state_<?php echo($fileName);?>.php" method="post">
			ID da <?php echo($topic); ?>: <input type="text" name="id" style="width:98%;"><br>
			<button type="submit" value="state" name="state" style="width:100%;">Modificar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Categoria em <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>insert_<?php echo($fileName);?>_info_category.php" method="post">
			Nome da Categoria: <input type="text" name="info_category" style="width:98%;"><br>
			<button type="submit" value="addCategory" name="addCategory" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Adicionar Informação ao <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>insert_<?php echo($fileName);?>_info.php" method="post">
			ID do <?php echo($topic); ?>: <input type="text" name="id" style="width:98%;"><br>
			ID da Categoria: <input type="text" name="info_id" style="width:98%;"><br>
			Informação: <input type="text" name="info" style="width:98%;"><br>
			<button type="submit" value="addInfo" name="addInfo" style="width:100%;">Adicionar</button> 
		</form>
	</div>
  
  <?php include 'htmldoc_end.php'; ?>