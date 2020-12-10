<?php
include 'connect.php';
include 'input_cleaner.php';

$player_id = ms_escape_string($_POST["player_id"]);
$player_info_id = ms_escape_string($_POST["player_info_id"]);
$player_info = ms_escape_string($_POST["player_info"]);
 
if(empty($player_id) || empty($player_info_id) || empty($player_info)){
	header("Location: index.php?player_info=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$player_id) || !preg_match("/^[0-9]*$/",$player_info_id) || !preg_match("/^[a-zA-Z0-9., _@!?]*$/",$player_info)){
			header("Location: index.php?player_info=invalid");
			exit();
		}else{
			
			if(strlen($player_id)>=11 || strlen($player_info_id)>=11 || strlen($player_info)>=120){
				header("Location: index.php?player_info=overflow");
				exit();
			}else{
				
			//CHECK IF BOTH ELEMENTS REGISTRIES EXIST	
			$sql = "SELECT id FROM player WHERE id='$player_id'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen === 0){
				header("Location: index.php?player_info=player_id_null");
				exit();
			}else{
					
				$sql = "SELECT id FROM player_info_category WHERE id='$player_info_id'";
				$params = array();
				$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$stmt = sqlsrv_query( $conn, $sql, $params, $options);
				$stmtlen = sqlsrv_num_rows($stmt); 
			
				if($stmtlen === 0){
					header("Location: index.php?player_info=player_info_id_null");
					exit();
				}else{	
				
					//INSERT
					$sql = "INSERT INTO player_info(player_id, player_info_id, info) VALUES ('$player_id','$player_info_id','$player_info')";
					$params = array(1, "some data");

					$stmt = sqlsrv_query( $conn, $sql, $params);

					if( $stmt === false ) {
					die( print_r( sqlsrv_errors(), true));
					}else{
						echo("Informação de jogador criado com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
					}
				}
			}	
		}
	}		
}
?>
