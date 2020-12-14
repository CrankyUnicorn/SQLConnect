<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_map.php";
$fileName = "map"; 
$tableName = $fileName;
$columnOneName = "map_name";

$name = ms_escape_string($_POST["name"]);
 
if(empty($name)){
	header("Location: ".$filePath."?".$fileName."=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_.]*$/",$name)){
		header("Location: ".$filePath."?".$fileName."=invalid");
			exit();
		}else{
			
			if(strlen($name)>=60){
				header("Location: ".$filePath."?".$fileName."=overflow");
				exit();
			}else{
				
			//CHECK
			$sql = "SELECT * FROM map";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen!=0){
				header("Location: ".$filePath."?".$fileName."=taken");
				exit();
				}else{
			
					//INSERT
					$sql = "INSERT INTO $tableName ($columnOneName, state) VALUES ('$name',1)";
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
