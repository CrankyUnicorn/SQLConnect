<?php
include 'connect.php';
include 'input_cleaner.php';

$player_id = ms_escape_string($_POST["player_id"]);
$character_id = ms_escape_string($_POST["character_id"]);
 
if(empty($player_id) || empty($character_id)){
	header("Location: index.php?player_character=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$player_id) || !preg_match("/^[0-9]*$/",$character_id)){
			header("Location: index.php?player_character=invalid");
			exit();
		}else{
			
			if(strlen($player_id)>=11 || strlen($character_id)>=11){
				header("Location: index.php?player_character=overflow");
				exit();
			}else{
				
			//CHECK IF BOTH ELEMENTS REGISTRIES EXIST	
			$sql = "SELECT * FROM player WHERE id='$player_id'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 

			if($stmtlen === 0 || $stmtlen === null){
				header("Location: index.php?player_character=player_id_null");
				exit();
			}else{
					
				$sql = "SELECT * FROM character WHERE id='$character_id'";
				$params = array();
				$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$stmt = sqlsrv_query( $conn, $sql, $params, $options);
				$stmtlen = sqlsrv_num_rows($stmt); 
			
				if($stmtlen === 0 || $stmtlen === null){
					header("Location: index.php?player_character=character_id_null");
					exit();
				}else{	
				
					$sql = "SELECT * FROM player_character WHERE character_id='$character_id'";
					$params = array();
					$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
					$stmt = sqlsrv_query( $conn, $sql, $params, $options);
					$stmtlen = sqlsrv_num_rows($stmt); 
				
					//TEST IF CHARACTER IS TAKEN BY A PLAYER
					if($stmtlen != 0 || $stmtlen === null){
						header("Location: index.php?player_character=character_id_taken");
						exit();
					}else{	
						
						//INSERT
						$sql = "INSERT INTO player_character(player_id, character_id) VALUES ('$player_id','$character_id')";
						$stmt = sqlsrv_query( $conn, $sql);

						if( $stmt === false ) {
						die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Informação de personagens de jogador criado com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}
				}
			}	
		}
	}		
}
?>
