<?php include 'htmldoc_start.php'; ?>

	<?php 
	//hope you just to need to change this
	$fileName = "point"; 
	$pathSufix = $fileName."/"; 
	$topic = "Ponto"; 
	?>

<div class="pc_topbar pc_lightblue"></div>
<!--main content-->
<div id="pc_forms_holder" class="pc_forms_holder">

	<?php include $pathSufix.'view_'.$fileName.'.php'; ?>
	
</div>
<div class="pc_forms_holder">


	<div class="pc_forms pc_margin">
		<h4>Adicionar <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix);?>insert_<?php echo($fileName);?>.php" method="post">
			Nome: <input type="text" name="name" style="width:98%;"><br>
			ID da Célula: <input type="text" name="cell" style="width:98%;"><br>
			Posição em X: <input type="text" name="posx" style="width:98%;"><br>
			Posição em Y: <input type="text" name="posy" style="width:98%;"><br>
			<button type="submit" value="add" name="add" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Alterar Estado de <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>state_<?php echo($fileName);?>.php" method="post">
			ID do <?php echo($topic); ?>: <input type="text" name="id" style="width:98%;"><br>
			<button type="submit" value="state" name="state" style="width:100%;">Modificar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Modificar Informação do <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>modify_<?php echo($fileName);?>.php" method="post">
			ID do Ponto: <input type="text" name="id" style="width:98%;"><br>
			Nome: <input type="text" name="name" style="width:98%;"><br>
			ID da Célula: <input type="text" name="cell" style="width:98%;"><br>
			Posição em X: <input type="text" name="posx" style="width:98%;"><br>
			Posição em Y: <input type="text" name="posy" style="width:98%;"><br>
			<button type="submit" value="modifyInfo" name="modifyInfo" style="width:100%;">Apagar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Apagar Informação do <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>delete_<?php echo($fileName);?>.php" method="post">
			ID do  <?php echo($topic); ?>: <input type="text" name="id" style="width:98%;"><br>
			<button type="submit" value="removeInfo" name="removeInfo" style="width:100%;">Apagar</button> 
		</form>
	</div>
  
  <?php include 'htmldoc_end.php'; ?>