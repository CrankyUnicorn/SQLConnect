<?php include 'htmldoc_start.php'; ?>

	<?php 
	//hope you just to need to change this
	$fileName = "character_match"; 
	$pathSufix = $fileName."/"; 
	$topic_one = "Personagem";
	$topic_two = "Partida";
	$topic = $topic_two." de ".$topic_one;
	$helperTableOne = "character";
	$helperTableTwo = "match";
	?>

<div class="pc_topbar pc_orange_red"></div>
<!--main content-->
<div id="pc_forms_holder" class="pc_forms_holder">

	<?php include $pathSufix.'view_'.$fileName.'.php'; ?>
	<?php include $helperTableOne.'/view_'.$helperTableOne.'.php'; ?>
	<?php include $helperTableTwo.'/view_'.$helperTableTwo.'.php'; ?>
	
</div>
<div class="pc_forms_holder">


	<div class="pc_forms pc_margin">
		<h4>Adicionar <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix);?>insert_<?php echo($fileName);?>.php" method="post">
			ID <?php echo($topic_one); ?>: <input type="text" name="id_one" style="width:98%;"><br>
			ID <?php echo($topic_two); ?>: <input type="text" name="id_two" style="width:98%;"><br>
			<button type="submit" value="add" name="add" style="width:100%;">Adicionar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Modificar Informação do <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>modify_<?php echo($fileName);?>.php" method="post">
		ID do  <?php echo($topic_one); ?> do <?php echo($topic_two); ?>: <input type="text" name="id" style="width:98%;"><br>
			ID <?php echo($topic_one); ?>: <input type="text" name="id_one" style="width:98%;"><br>
			ID <?php echo($topic_two); ?>: <input type="text" name="id_two" style="width:98%;"><br>
			<button type="submit" value="modifyInfo" name="modifyInfo" style="width:100%;">Apagar</button> 
		</form>
	</div>

	<div class="pc_forms pc_margin">
		<h4>Apagar Informação do <?php echo($topic); ?></h4>
		<form action="<?php echo($pathSufix); ?>delete_<?php echo($fileName);?>.php" method="post">
			ID do  <?php echo($topic_one); ?> do <?php echo($topic_two); ?>: <input type="text" name="id" style="width:98%;"><br>
			<button type="submit" value="removeInfo" name="removeInfo" style="width:100%;">Apagar</button> 
		</form>
	</div>
  
  <?php include 'htmldoc_end.php'; ?>