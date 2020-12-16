<?php 
	if(isset($_POST['view'])){
		include 'htmldoc_start.php';
	}
?>

<?php include 'connect.php'; ?>

<?php

	$title = "Partidas das Personagens";
	$keywordOne = "character";
	$keywordTwo = "match";

	//$filePath = "../page_player.php";
	//$fileName = "view_player";
	$tableName = $keywordOne."_".$keywordTwo;
	$columnOneName = $keywordOne."_id";
	$columnTwoName = $keywordTwo."_id";

	$tableOneName = $keywordOne;
	$columnTableOneName = $keywordOne."_name"; // replace this on other folder that fit the standard
	$tableTwoName = $keywordTwo;
	$columnTableTwoName = $keywordTwo."_name";
	//there is an extra parameter 'nick_name' to be changed by hand in line 24 and 29

	$rowColorState = 0;
	$rowColor = "pc_evenColor";

	$sql = "SELECT * FROM $tableName";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
		
	echo "<div class='pc_lists pc_margin'><h4 class='pc_center'>".$title."</h4><table class='pc_center pc_margin'>";
	echo "<tr class=".$rowColor."><th>ID</th><th>ID Nome</th><th>ID Nome</th></tr>";
	
	if($stmt != false){
		while($row = sqlsrv_fetch_array($stmt)){
					
			$sql = "SELECT * FROM $tableOneName WHERE $tableOneName.id=$row[$columnOneName]";
			$params = array(1, "some data");

			$argOne = sqlsrv_query( $conn, $sql, $params);
			$rowOne = sqlsrv_fetch_array($argOne);
		
			$sql = "SELECT * FROM $tableTwoName WHERE $tableTwoName.id=$row[$columnTwoName]";
			$params = array(1, "some data");

			$argTwo = sqlsrv_query( $conn, $sql, $params);
			$rowTwo = sqlsrv_fetch_array($argTwo);

			if($argOne === false || $argTwo === false){
				
			}

			if($rowColorState===0){
				$rowColor = "pc_oddColor";
				$rowColorState = 1;
			}else{
				$rowColor = "pc_evenColor";
				$rowColorState = 0;
			}

			echo "<tr class=".$rowColor.">
			<td>".$row['id']."</td>
			<td>".$row[$columnOneName]."=".$rowOne[$columnTableOneName]."</td>
			<td>".$row[$columnTwoName]."=".$rowTwo[$columnTableTwoName]."</td>
			</tr>";
		}
	}	
	echo "</table></div>";
	
?>
<?php 
	if(isset($_POST['view'])){
		include 'htmldoc_end.php';
	}
?>