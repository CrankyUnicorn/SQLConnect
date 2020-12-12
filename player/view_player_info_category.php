<?php 
	if(isset($_POST['viewCategory'])){
		include 'htmldoc_start.php';
	}
?>
<?php include 'connect.php'; ?>
<?php

	$title = "Jogador";
	//$filePath = "../page_player.php";
	//$fileName = "view_player_info";
	$tableOneName = "player_info_category";
	$columnOneName = "info_category";

	$rowColorState = 0;
	$rowColor = "pc_evenColor";

	$sql = "SELECT * FROM $tableOneName";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	
	echo "<div class='pc_lists pc_margin'><h4 class='pc_center'>Categoria de Informação dos ".$title."</h4><table class='pc_center pc_margin'>";
	echo "<tr><th>ID</th><th>Categoria</th></tr>";
	
	if($stmt != false){
		while($row = sqlsrv_fetch_array($stmt)){
				
			if($rowColorState===0){
				$rowColor = "pc_oddColor";
				$rowColorState = 1;
			}else{
				$rowColor = "pc_evenColor";
				$rowColorState = 0;
			}

			echo "<tr class=".$rowColor."><td>".$row['id']."</td><td>".$row['info_category']."</td></tr>";
		}
	}
	echo "</table></div>";
	
?>
<?php 
	if(isset($_POST['viewCategory'])){
		include 'htmldoc_end.php';
	}
?>