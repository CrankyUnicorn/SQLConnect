<?php 
	if(isset($_POST['viewMatchInfo'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$sql = "SELECT * FROM match_info";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	$stmtlen = sqlsrv_num_rows($stmt); 
	
	if($stmtlen === 0){
		header("Location: index.php?match_info=no_results");
		exit();
	}else{
	
		
		echo "<div class='pc_lists pc_margin pc_lightgreen'><h4 class='pc_center'>Informações das Partidas</h4><table class='pc_center pc_margin'>";
		echo "<tr><th>ID Partida</th><th>ID Categoria</th><th>Valor</th></tr>";
		
	if($stmt != 0 && $stmt != null){
		while($row = sqlsrv_fetch_array($stmt)){
			
			//name of the first argument			
			$sql = "SELECT match_name FROM match WHERE match.id='".$row['match_id']."';";
			$params = array(1, "some data");

			$stmt_argOne = sqlsrv_query( $conn, $sql, $params);
			$row_argOne = sqlsrv_fetch_array($stmt_argOne);
		
			//name of the second argument
			$sql = "SELECT info_category FROM match_info_category WHERE match_info_category.id='".$row['match_info_id']."';";
			$params = array(1, "some data");

			$stmt_argTwo = sqlsrv_query( $conn, $sql, $params);
			$row_argTwo = sqlsrv_fetch_array($stmt_argTwo);
		
			echo "<tr><td>".$row['match_id']."=".$row_argOne['match_name']."</td><td>".$row['match_info_id']."=".$row_argTwo['info_category']."</td><td>".$row['info']."</td></tr>";
				
		}
	}
		
		echo "</table></div>";
	}
?>
<?php 
	if(isset($_POST['viewMatchInfo'])){
		include 'htmldoc_end.php';
	}
?>