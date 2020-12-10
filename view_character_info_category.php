<?php 
	if(isset($_POST['viewCharacterCategory'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$sql = "SELECT * FROM character_info_category";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	$stmtlen = sqlsrv_num_rows($stmt); 
	
	if($stmtlen === 0){
		header("Location: index.php?character_category=no_results");
		exit();
	}else{
		
		echo "<div class='pc_lists pc_margin pc_orange'><h4 class='pc_center'>Categoria de Informação das Personagens</h4><table class='pc_center pc_margin'>";
		echo "<tr><th>ID</th><th>Categoria</th></tr>";
		
		while($row = sqlsrv_fetch_array($stmt)){
				
			echo "<tr><td>".$row['id']."</td><td>".$row['info_category']."</td></tr>";
		}
		
		echo "</table></div>";
	}
	
?>
<?php 
	if(isset($_POST['viewCharacterCategory'])){
		include 'htmldoc_end.php';
	}
?>