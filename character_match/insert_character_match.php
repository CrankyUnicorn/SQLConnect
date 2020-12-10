<?php
include 'connect.php';
include 'input_cleaner.php';

$character_id = ms_escape_string($_POST["character_id"]);
$match_id = ms_escape_string($_POST["match_id"]);
 
if(empty($character_id) || empty($match_id)){
	header("Location: index.php?character_match=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$character_id) || !preg_match("/^[0-9]*$/",$match_id)){
			header("Location: index.php?character_match=invalid");
			exit();
		}else{
			
			if(strlen($character_id)>=11 || strlen($match_id)>=11){
				header("Location: index.php?character_match=overflow");
				exit();
			}else{
				
			//CHECK IF BOTH ELEMENTS REGISTRIES EXIST	
			$sql = "SELECT * FROM character WHERE id='$character_id'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 

			if($stmtlen === 0 || $stmtlen === null){
				header("Location: index.php?character_match=player_id_null");
				exit();
			}else{
					
				$sql = "SELECT * FROM match WHERE id='$match_id'";
				$params = array();
				$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$stmt = sqlsrv_query( $conn, $sql, $params, $options);
				$stmtlen = sqlsrv_num_rows($stmt); 
			
				if($stmtlen === 0 || $stmtlen === null){
					header("Location: index.php?character_match=character_id_null");
					exit();
				}else{	
				
					$sql = "SELECT * FROM character_match WHERE character_id='$character_id'";
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
						$sql = "INSERT INTO character_match (character_id, match_id) VALUES ('$character_id','$match_id')";
						$stmt = sqlsrv_query( $conn, $sql);

						if( $stmt === false ) {
						die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Informação personagem em partida criado com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}
				}
			}	
		}
	}		
}
?>
