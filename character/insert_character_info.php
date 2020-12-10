<?php
include 'connect.php';
include 'input_cleaner.php';

$character_id = ms_escape_string($_POST["character_id"]);
$character_info_id = ms_escape_string($_POST["character_info_id"]);
$character_info = ms_escape_string($_POST["character_info"]);
 
if(empty($character_id) || empty($character_info_id) || empty($character_info)){
	header("Location: index.php?character_info=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$character_id) || !preg_match("/^[0-9]*$/",$character_info_id) || !preg_match("/^[a-zA-Z0-9., _@!?]*$/",$character_info)){
			header("Location: index.php?character_info=invalid");
			exit();
		}else{
			
			if(strlen($character_id)>=11 || strlen($character_info_id)>=11 || strlen($character_info)>=120){
				header("Location: index.php?character_info=overflow");
				exit();
			}else{
				
			//CHECK IF BOTH ELEMENTS REGISTRIES EXIST	
			$sql = "SELECT id FROM character WHERE id='$character_id'";
			$params = array();
			$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen === 0){
				header("Location: index.php?character_info=character_id_null");
				exit();
			}else{
					
				$sql = "SELECT id FROM character_info_category WHERE id='$character_info_id'";
				$params = array();
				$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
				$stmt = sqlsrv_query( $conn, $sql, $params, $options);
				$stmtlen = sqlsrv_num_rows($stmt); 
			
				if($stmtlen === 0){
					header("Location: index.php?character_info=character_info_id_null");
					exit();
				}else{	
				
					//INSERT
					$sql = "INSERT INTO character_info(character_id, character_info_id, info) VALUES ('$character_id','$character_info_id','$character_info')";
					$params = array(1, "some data");

					$stmt = sqlsrv_query( $conn, $sql, $params);

					if( $stmt === false ) {
					die( print_r( sqlsrv_errors(), true));
					}else{
						echo("Informação de character criado com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
					}
				}
			}	
		}
	}		
}
?>
