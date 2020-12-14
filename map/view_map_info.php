<?php 
	if(isset($_POST['viewInfo'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$title = "Mapa";
	//$filePath = "../page_player.php";
	//$fileName = "view_player_info";
	$tableOneName = "map_info";
	$columnOneName = "map_id"; 
	$columnTwoName = "map_info_id"; 
	$tableTwoName = "map";
	$columnTableTwoName = "map_name";
	$tableThreeName = "map_info_category";
	//there is an extra parameter 'nick_name' to be changed by hand in line 57

	$rowColorState = 0;
	$rowColor = "pc_evenColor";

	$sql = "SELECT * FROM $tableOneName";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	
		
		echo "<div class='pc_lists pc_margin'><h4 class='pc_center'>Informação dos ".$title."</h4><table class='pc_center pc_margin'>";
		echo "<tr class=".$rowColor."><th>ID</th><th>ID ".$title."es</th><th>ID Categoria</th><th>Valor</th></tr>";
		
	if($stmt != false){
		
		while($row = sqlsrv_fetch_array($stmt)){
			
			//name of the first argument			
			$sql = "SELECT * FROM $tableTwoName WHERE $tableTwoName.id='".$row[$columnOneName]."';";
			$params = array(1, "some data");

			$stmt_argOne = sqlsrv_query( $conn, $sql, $params);
			$row_argOne = sqlsrv_fetch_array($stmt_argOne);
		
			//name of the second argument
			$sql = "SELECT * FROM $tableThreeName WHERE $tableThreeName.id='".$row[$columnTwoName]."';";
			$params = array(1, "some data");

			$stmt_argTwo = sqlsrv_query( $conn, $sql, $params);
			$row_argTwo = sqlsrv_fetch_array($stmt_argTwo);
		
			if($rowColorState===0){
				$rowColor = "pc_oddColor";
				$rowColorState = 1;
			}else{
				$rowColor = "pc_evenColor";
				$rowColorState = 0;
			}

			echo "<tr class=".$rowColor."><td>".$row['id']."</td><td>".$row[$columnOneName]."=".$row_argOne[$columnTableTwoName]."</td><td>".$row[$columnTwoName]."=".$row_argTwo['info_category']."</td><td>".$row['info']."</td></tr>";
		}
	}
	echo "</table></div>";
	
?>
<?php 
	if(isset($_POST['viewInfo'])){
		include 'htmldoc_end.php';
	}
?>