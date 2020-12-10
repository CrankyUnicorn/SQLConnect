<?php
include 'connect.php';
include 'input_cleaner.php';

$info_category = ms_escape_string($_POST["info_category"]);
 
if(empty($info_category)){
	header("Location: index.php?match_info_category=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_.]*$/",$info_category)){
			header("Location: index.php?match_info_category=invalid");
			exit();
		}else{
			
			if(strlen($info_category)>=60){
				header("Location: index.php?match_info_category=overflow");
				exit();
			}else{
				
			//CHECK NICK NAME IS IN USE ALREADY	
			$sql = "SELECT * FROM match_info_category WHERE info_category='$info_category'";
			$params = array();
			$options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen != 0){
				header("Location: index.php?match_info_category=taken");
				exit();
			}else{
			
					//INSERT
					$sql = "INSERT INTO match_info_category(info_category) VALUES ('$info_category')";
					$params = array(1, "some data");

					$stmt = sqlsrv_query( $conn, $sql, $params);

					if( $stmt === false ) {
						die( print_r( sqlsrv_errors(), true));
					}else{
						echo("Categoria de partida criado com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
					}
			}
		}
	}		
}
?>
