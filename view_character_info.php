<?php 
	if(isset($_POST['viewCharacterInfo'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$sql = "SELECT * FROM character_info";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	
		echo "<div class='pc_lists pc_margin pc_orange'><h4 class='pc_center'>Informações das Personagens</h4><table class='pc_center pc_margin'>";
		echo "<tr><th>ID Personagem</th><th>ID Categoria</th><th>Valor</th></tr>";
	
	if($stmt != 0 || $stmt != null){	
		while($row = sqlsrv_fetch_array($stmt)){
			
			//name of the first argument			
			$sql = "SELECT character_name FROM character WHERE character.id='".$row['character_id']."';";
			$params = array(1, "some data");

			$stmt_argOne = sqlsrv_query( $conn, $sql, $params);
			$row_argOne = sqlsrv_fetch_array($stmt_argOne);
		
			//name of the second argument
			$sql = "SELECT info_category FROM character_info_category WHERE character_info_category.id='".$row['character_info_id']."';";
			$params = array(1, "some data");

			$stmt_argTwo = sqlsrv_query( $conn, $sql, $params);
			$row_argTwo = sqlsrv_fetch_array($stmt_argTwo);
		
			echo "<tr><td>".$row['character_id']."=".$row_argOne['character_name']."</td><td>".$row['character_info_id']."=".$row_argTwo['info_category']."</td><td>".$row['info']."</td></tr>";
				
		}
	}
		
		echo "</table></div>";
	
?>
<?php 
	if(isset($_POST['viewCharacterInfo'])){
		include 'htmldoc_end.php';
	}
?>