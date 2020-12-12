<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_player.php";
$fileName = "player"; 
$tableName = $fileName;
$columnOneName = "nick_name";
//rename variables at line 43

$name = ms_escape_string($_POST["name"]);
$password = ms_escape_string($_POST["password"]);
$email = ms_escape_string($_POST["email"]);
 
if(empty($name) || empty($password) || empty($email)){
	header("Location: ".$filePath."?".$fileName."=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_.]*$/",$name) || !preg_match("/^[a-zA-Z0-9-_*?!.,]*$/",$password) || !preg_match("/^[a-z0-9._@]*$/",$email)){
		header("Location: ".$filePath."?".$fileName."=invalid");
			exit();
		}else{
			
			if(strlen($name)>=60 || strlen($password)>=60 || strlen($email)>=80){
				header("Location: ".$filePath."?".$fileName."=overflow");
				exit();
			}else{
				
			//CHECK EMAIL IS IN USE ALREADY	
			$sql = "SELECT email FROM player WHERE email='$email'";
			$params = array(1, "some data");

			$stmt = sqlsrv_query( $conn, $sql, $params);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen!=0){
				header("Location: ".$filePath."?".$fileName."=taken");
				exit();
				}else{
			
					//INSERT
					$sql = "INSERT INTO $tableName ($columnOneName, passwd, email, state) VALUES ('$name','$password','$email',1)";
					$params = array(1, "some data");

					$stmt = sqlsrv_query( $conn, $sql, $params);

					if( $stmt === false ) {
						die( print_r( sqlsrv_errors(), true));
					}else{
						header("Location: ".$filePath."?".$fileName."=success");
					}
				}
		}
	}		
}
?>
