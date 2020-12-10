<?php
include 'connect.php';
include 'input_cleaner.php';

$character_name = ms_escape_string($_POST["character_name"]);
 
if(empty($character_name)){
	header("Location: index.php?character=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_-]*$/",$character_name)){
			header("Location: index.php?character=invalid");
			exit();
		}else{
			
			if(strlen($character_name)>=60){
				header("Location: index.php?character=overflow");
				exit();
			}else{
		
				//INSERT
				$sql = "INSERT INTO character(character_name,state) VALUES ('$character_name',1)";
				$params = array(1, "some data");

				$stmt = sqlsrv_query( $conn, $sql, $params);

				if( $stmt === false ) {
				die( print_r( sqlsrv_errors(), true));
			}else{
				echo("Personagem inserido com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
			}
		}
	}		
}
?>
