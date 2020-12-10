<?php 
	if(isset($_POST['viewCharacter'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$sql = "SELECT * FROM character";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	$stmtlen = sqlsrv_num_rows($stmt); 
	
	if($stmtlen === 0){
		header("Location: index.php?character=no_results");
		exit();
	}else{
		
		echo "<div class='pc_lists pc_margin pc_orange'><h4 class='pc_center'>Personagens</h4><table class='pc_center pc_margin'>";
		echo "<tr><th>ID</th><th>Nome</th><th>Criado</th><th>Estado</th></tr>";
		
		while($row = sqlsrv_fetch_array($stmt)){

			echo "<tr><td>".$row['id']."</td><td>".$row['character_name']."</td><td>".date('m-d-Y | H:i:s',($row['character_creation']->getTimestamp()))."</td><td>".$row['state']."</td></tr>";
		}
		
		echo "</table></div>";
	}
	
?>
<?php 
	if(isset($_POST['viewCharacter'])){
		include 'htmldoc_end.php';
	}
?>