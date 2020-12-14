<?php 
	if(isset($_POST['view'])){
		include 'htmldoc_start.php';
	}
?>

<?php include 'connect.php'; ?>

<?php

	$title = "Caminho";
	//$filePath = "../page_player.php";
	//$fileName = "view_player";
	$tableOneName = "path";
	$columnOneName = "path_name";
	//there is an extra parameter 'nick_name' to be changed by hand in line 24 and 29

	$rowColorState = 0;
	$rowColor = "pc_evenColor";

	$sql = "SELECT * FROM $tableOneName";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
		
	echo "<div class='pc_lists pc_margin'><h4 class='pc_center'>".$title."</h4><table class='pc_center pc_margin'>";
	echo "<tr class=".$rowColor."><th>ID</th><th>Nome</th><th>Estado</th></tr>";
	
	if($stmt != false){
		while($row = sqlsrv_fetch_array($stmt)){
					
			if($rowColorState===0){
				$rowColor = "pc_oddColor";
				$rowColorState = 1;
			}else{
				$rowColor = "pc_evenColor";
				$rowColorState = 0;
			}

			echo "<tr class=".$rowColor."><td>".$row['id']."</td><td>".$row[$columnOneName]."</td><td>".$row['state']."</td></tr>";
		}
	}	
	echo "</table></div>";
	
?>
<?php 
	if(isset($_POST['view'])){
		include 'htmldoc_end.php';
	}
?>