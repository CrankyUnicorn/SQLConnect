<?php
include 'connect.php';
include 'input_cleaner.php';

$info_category = ms_escape_string($_POST["info_category"]);
 
if(empty($info_category)){
	header("Location: index.php?character_info_category=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_.]*$/",$info_category)){
			header("Location: index.php?character_info_category=invalid");
			exit();
		}else{
			
			if(strlen($info_category)>=60){
				header("Location: index.php?character_info_category=overflow");
				exit();
			}else{
				
			//CHECK CATEGORY IS IN USE ALREADY	
			$sql = "SELECT info_category FROM character_info_category WHERE info_category='$info_category'";
			$params = array(1, "some data");

			$stmt = sqlsrv_query( $conn, $sql, $params);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen!=0){
				header("Location: index.php?character_info_category=taken");
				exit();
				}else{
			
					//INSERT
					$sql = "INSERT INTO character_info_category(info_category) VALUES ('$info_category')";
					$params = array(1, "some data");

					$stmt = sqlsrv_query( $conn, $sql, $params);

					if( $stmt === false ) {
						die( print_r( sqlsrv_errors(), true));
					}else{
						echo("Categoria de Personagem criado com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
					}
				}
		}
	}		
}
?>
