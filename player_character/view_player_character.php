<?php 
	if(isset($_POST['viewPlayerCharacter'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$sql = "SELECT * FROM player_character";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	$stmtlen = sqlsrv_num_rows($stmt); 
	
	if($stmtlen === 0){
		header("Location: index.php?player_character=no_results");
		exit();
	}else{
		
		echo "<div class='pc_lists pc_margin pc_red'><h4 class='pc_center'>Informações das Personagens dos Jogadores</h4><table class='pc_center pc_margin'>";
		echo "<tr><th>ID Jogador</th><th>ID Personagens</th></tr>";
		
		while($row = sqlsrv_fetch_array($stmt)){
			
			//name of the first argument			
			$sql = "SELECT nick_name FROM player WHERE player.id='".$row['player_id']."';";
			$params = array(1, "some data");

			$stmt_argOne = sqlsrv_query( $conn, $sql, $params);
			$row_argOne = sqlsrv_fetch_array($stmt_argOne);
		
			//name of the second argument
			$sql = "SELECT character_name FROM character WHERE character.id='".$row['character_id']."';";
			$params = array(1, "some data");

			$stmt_argTwo = sqlsrv_query( $conn, $sql, $params);
			$row_argTwo = sqlsrv_fetch_array($stmt_argTwo);
		
			echo "<tr><td>".$row['player_id']."=".$row_argOne['nick_name']."</td><td>".$row['character_id']."=".$row_argTwo['character_name']."</td></tr>";
				
		}
		
		echo "</table></div>";
	}
	
?>
<?php 
	if(isset($_POST['viewPlayerCharacter'])){
		include 'htmldoc_end.php';
	}
?>