<?php
include 'connect.php';
include 'input_cleaner.php';

$match_name = ms_escape_string($_POST["match_name"]);
 
if(empty($match_name)){
	header("Location: index.php?match=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_-]*$/",$match_name)){
			header("Location: index.php?match=invalid");
			exit();
		}else{
			
			if(strlen($match_name)>=60){
				header("Location: index.php?match=overflow");
				exit();
			}else{
				
			$sql = "SELECT * FROM match WHERE match_name='$match_name'";
			$params = array();
			$options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen != 0){
				header("Location: index.php?match=taken");
				exit();
			}else{
			
				//INSERT
				$sql = "INSERT INTO match(match_name,state) VALUES ('$match_name',1)";
				$params = array(1, "some data");

				$stmt = sqlsrv_query( $conn, $sql, $params);

				if( $stmt === false ) {
					die( print_r( sqlsrv_errors(), true));
				}else{
					echo("Partida criada com sucesso!<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
				}
			}
		}
	}		
}
?>
