<?php
include 'connect.php';
include 'input_cleaner.php';

$player_id = ms_escape_string($_POST["player_id"]);
 
if(empty($player_id)){
	header("Location: index.php?state_player=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$player_id)){
		header("Location: index.php?state_player=invalid");
		exit();
	}else{
			
		if(strlen($player_id)>=11){
			header("Location: index.php?state_player=overflow");
			exit();
		}else{
			
			//INSERT
			$sql = "SELECT COUNT(*) FROM player";
			$params = array();

			$stmt = sqlsrv_query( $conn, $sql, $params);
				
			if($stmt >= $player_id){
			
				
				$sql = "SELECT * FROM player WHERE id='$player_id'";
				$params = array(1, "some data");
				
				$stmt = sqlsrv_query( $conn, $sql, $params);
				while($row = sqlsrv_fetch_array($stmt)){
					if($row['state'] === 0 ){
						
						//echo "is now 1<br>";	
							
						//INSERT
						$sql = "UPDATE player SET player.state = 1 WHERE player.id='$player_id'";
						$params = array(1, "some data");

						$stmt = sqlsrv_query( $conn, $sql, $params);
							
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Estado do jogador modificado para 1 com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}else{
								
							
						//echo "is now 0<br>";	
						
						//INSERT
						$sql = "UPDATE player SET player.state = 0 WHERE player.id='$player_id'";
						$params = array(1, "some data");

						$stmt = sqlsrv_query( $conn, $sql, $params);
						
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Estado do jogador modificado para 0 com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}
				}
			}
		}
	}		
}
?>
