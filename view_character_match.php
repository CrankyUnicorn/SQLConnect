<?php 
	if(isset($_POST['viewCharacterMatch'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$sql = "SELECT * FROM character_match";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	$stmtlen = sqlsrv_num_rows($stmt); 
	
	if($stmtlen === 0){
		header("Location: index.php?character_match=no_results");
		exit();
	}else{
		
		echo "<div class='pc_lists pc_margin pc_yellow'><h4 class='pc_center'>Informações das Partidas dos Personagens</h4><table class='pc_center pc_margin'>";
		echo "<tr><th>ID Personagem</th><th>ID Partida</th></tr>";
		
		while($row = sqlsrv_fetch_array($stmt)){
			
			//name of the first argument			
			$sql = "SELECT character_name FROM character WHERE character.id='".$row['character_id']."';";
			$params = array(1, "some data");

			$stmt_argOne = sqlsrv_query( $conn, $sql, $params);
			$row_argOne = sqlsrv_fetch_array($stmt_argOne);
		
			//name of the second argument
			$sql = "SELECT match_name FROM match WHERE match.id='".$row['match_id']."';";
			$params = array(1, "some data");

			$stmt_argTwo = sqlsrv_query( $conn, $sql, $params);
			$row_argTwo = sqlsrv_fetch_array($stmt_argTwo);
		
			echo "<tr><td>".$row['character_id']."=".$row_argOne['character_name']."</td><td>".$row['match_id']."=".$row_argTwo['match_name']."</td></tr>";
				
		}
		
		echo "</table></div>";
	}
	
?>
<?php 
	if(isset($_POST['viewCharacterMatch'])){
		include 'htmldoc_end.php';
	}
?>