<?php
include 'connect.php';
include 'input_cleaner.php';

$match_id = ms_escape_string($_POST["match_id"]);
$match_info_id = ms_escape_string($_POST["match_info_id"]);
$match_info = ms_escape_string($_POST["match_info"]);
 
if(empty($match_id) || empty($match_info_id) || empty($match_info)){
	header("Location: index.php?match_info=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$match_id) || !preg_match("/^[0-9]*$/",$match_info_id) || !preg_match("/^[a-zA-Z0-9., _@!?]*$/",$match_info)){
			header("Location: index.php?match_info=invalid");
			exit();
		}else{
			
			if(strlen($match_id)>=11 || strlen($match_info_id)>=11 || strlen($match_info)>=120){
				header("Location: index.php?match_info=overflow");
				exit();
			}else{
				
			//CHECK IF BOTH ELEMENTS REGISTRIES EXIST	
			$sql = "SELECT id FROM match WHERE id='$match_id'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmt = sqlsrv_query( $conn, $sql, $params);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen === 0){
				header("Location: index.php?match_info=match_id_null");
				exit();
			}else{
					
				$sql = "SELECT id FROM match_info_category WHERE id='$match_info_id'";
				$params = array();
				$options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$stmt = sqlsrv_query( $conn, $sql, $params, $options);
				$stmtlen = sqlsrv_num_rows($stmt); 
			
				if($stmtlen === 0){
					header("Location: index.php?match_info=match_info_id_null");
					exit();
				}else{	
				
					//INSERT
					$sql = "INSERT INTO match_info(match_id, match_info_id, info) VALUES ('$match_id','$match_info_id','$match_info')";
					$params = array(1, "some data");

					$stmt = sqlsrv_query( $conn, $sql, $params);

					if( $stmt === false ) {
					die( print_r( sqlsrv_errors(), true));
					}else{
						echo("Informação de partida criado com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
					}
				}
			}	
		}
	}		
}
?>
