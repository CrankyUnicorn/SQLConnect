<?php 
	if(isset($_POST['view'])){
		include 'htmldoc_start.php';
	}
?>

<?php include 'connect.php'; ?>

<?php

	$title = "Jogador";
	//$filePath = "../page_player.php";
	//$fileName = "view_player";
	$tableOneName = "player";
	//there is an extra parameter 'nick_name' to be changed by hand in line 24 and 29


	$sql = "SELECT * FROM $tableOneName";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
		
	echo "<div class='pc_lists pc_margin pc_magenta'><h4 class='pc_center'>".$title."es</h4><table class='pc_center pc_margin'>";
	echo "<tr><th>ID</th><th>Nome</th><th>Password</th><th>Email</th><th>Estado</th></tr>";
	
	if($stmt != false){
		while($row = sqlsrv_fetch_array($stmt)){
					
			echo "<tr><td>".$row['id']."</td><td>".$row['nick_name']."</td><td>".$row['passwd']."</td><td>".$row['email']."</td><td>".$row['state']."</td></tr>";
		}
	}	
	echo "</table></div>";
	
?>
<?php 
	if(isset($_POST['view'])){
		include 'htmldoc_end.php';
	}
?>