<?php
include 'connect.php';
include 'input_cleaner.php';

$nick_name = ms_escape_string($_POST["nick_name"]);
$password = ms_escape_string($_POST["password"]);
$email = ms_escape_string($_POST["email"]);
 
if(empty($nick_name) || empty($password) || empty($email)){
	header("Location: index.php?player=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_.]*$/",$nick_name) || !preg_match("/^[a-zA-Z0-9-_*?!.,]*$/",$password) || !preg_match("/^[a-z0-9._@]*$/",$email)){
			header("Location: index.php?player=invalid");
			exit();
		}else{
			
			if(strlen($nick_name)>=60 || strlen($password)>=60 || strlen($email)>=80){
				header("Location: index.php?player=overflow");
				exit();
			}else{
				
			//CHECK EMAIL IS IN USE ALREADY	
			$sql = "SELECT email FROM player WHERE email='$email'";
			$params = array(1, "some data");

			$stmt = sqlsrv_query( $conn, $sql, $params);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen!=0){
				header("Location: index.php?player=taken<br><button onclick='window.location.href=\"index.php\"'>Continuar</button>");
				exit();
				}else{
			
					//INSERT
					$sql = "INSERT INTO player(nick_name, passwd, email, state) VALUES ('$nick_name','$password','$email',1)";
					$params = array(1, "some data");

					$stmt = sqlsrv_query( $conn, $sql, $params);

					if( $stmt === false ) {
						die( print_r( sqlsrv_errors(), true));
					}else{
						echo("Jogador criado com sucesso!");
					}
				}
		}
	}		
}
?>
