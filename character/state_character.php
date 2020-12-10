<?php
include 'connect.php';
include 'input_cleaner.php';

$character_id = ms_escape_string($_POST["char_id"]);
 
if(empty($char_id)){
	header("Location: index.php?state_character=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$character_id)){
		header("Location: index.php?state_character=invalid");
		exit();
	}else{
			
		if(strlen($character_id)>=11){
			header("Location: index.php?state_character=overflow");
			exit();
		}else{
			
			//INSERT
			$sql = "SELECT COUNT(*) FROM character";
			$params = array();

			$stmt = sqlsrv_query( $conn, $sql, $params);
				
			if($stmt >= $character_id){
			
				
				$sql = "SELECT * FROM character WHERE id='$character_id'";
				$params = array(1, "some data");
				
				$stmt = sqlsrv_query( $conn, $sql, $params);
				while($row = sqlsrv_fetch_array($stmt)){
					if($row['state'] === 0 ){
						
						//echo "is now 1<br>";	
							
						//INSERT
						$sql = "UPDATE character SET character.state = 1 WHERE character.id='$character_id'";
						$params = array(1, "some data");

						$stmt = sqlsrv_query( $conn, $sql, $params);
							
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Estado de personagem modificado para 1 com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}else{
								
							
						//echo "is now 0<br>";	
						
						//INSERT
						$sql = "UPDATE character SET character.state = 0 WHERE character.id='$character_id'";
						$params = array(1, "some data");

						$stmt = sqlsrv_query( $conn, $sql, $params);
						
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}else{
							echo("Estado de personagem modificado para 0 com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
						}
					}
				}
			}
		}
	}		
}
?>
