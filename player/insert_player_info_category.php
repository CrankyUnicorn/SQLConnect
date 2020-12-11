<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_player.php";
$fileName = "player_info_category"; 
$tableName = $fileName;

$info_category = ms_escape_string($_POST["info_category"]);
 
if(empty($info_category)){
	header("Location: ".$filePath."?".$fileName."=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_.]*$/",$info_category)){
		header("Location: ".$filePath."?".$fileName."=invalid");
			exit();
		}else{
			
			if(strlen($info_category)>=60){
				header("Location: ".$filePath."?".$fileName."=overflow");
				exit();
			}else{
				
			//CHECK CATEGORY IS IN USE ALREADY	
			$sql = "SELECT * FROM $tableName WHERE info_category = '$info_category'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt);  
			
			if($stmtlen!=0){
				header("Location: ".$filePath."?".$fileName."=taken");
				exit();
				}else{
			
					//INSERT
					$sql = "INSERT INTO $tableName(info_category) VALUES ('$info_category')";
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
