<?php
include 'connect.php';
include 'input_cleaner.php';

$match_id = ms_escape_string($_POST["match_id"]);
 
if(empty($player_id)){
	header("Location: index.php?state_match=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$match_id)){
		header("Location: index.php?state_match=invalid");
		exit();
	}else{
			
		if(strlen($match_id)>=11){
			header("Location: index.php?state_match=overflow");
			exit();
		}else{
			
			//INSERT
			$sql = "SELECT COUNT(*) FROM match";
			$params = array();

			$stmt = sqlsrv_query( $conn, $sql, $params);
				
			if($stmt >= $player_id){
			
				
				$sql = "SELECT * FROM match WHERE id='$match_id'";
				$params = array(1, "some data");
				
				$stmt = sqlsrv_query( $conn, $sql, $params);
				while($row = sqlsrv_fetch_array($stmt)){
					if($row['state'] === 0 ){
						
						//echo "is now 1<br>";	
							
						//INSERT
						$sql = "UPDATE match SET match.state = 1 WHERE match.id='$match_id'";
						$params = array(1, "some data");

						$stmt = sqlsrv_query( $conn, $sql, $params);
							
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Estado da Partida modificado para 1 com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}else{
								
							
						//echo "is now 0<br>";	
						
						//INSERT
						$sql = "UPDATE match SET match.state = 0 WHERE match.id='$match_id'";
						$params = array(1, "some data");

						$stmt = sqlsrv_query( $conn, $sql, $params);
						
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Estado da Partida modificado para 0 com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}
				}
			}
		}
	}		
}
?>
