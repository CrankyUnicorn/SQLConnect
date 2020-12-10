<?php 
	if(isset($_POST['viewPlayer'])){
		include 'htmldoc_start.php';
	}
?>

<?php include 'connect.php'; ?>

<?php

	$sql = "SELECT * FROM player";
	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	$stmtlen = sqlsrv_num_rows($stmt); 
	
	if($stmtlen === 0){
		header("Location: index.php?player=no_results");
		exit();
	}else{
		
		echo "<div class='pc_lists pc_margin pc_magenta'><h4 class='pc_center'>Jogadores</h4><table class='pc_center pc_margin'>";
		echo "<tr><th>ID</th><th>Nome</th><th>Password</th><th>Email</th><th>Estado</th></tr>";
		
		while($row = sqlsrv_fetch_array($stmt)){
				
			echo "<tr><td>".$row['id']."</td><td>".$row['nick_name']."</td><td>".$row['passwd']."</td><td>".$row['email']."</td><td>".$row['state']."</td></tr>";
		}
		
		echo "</table></div>";
	}
	
?>
<?php 
	if(isset($_POST['viewPlayer'])){
		include 'htmldoc_end.php';
	}
?>