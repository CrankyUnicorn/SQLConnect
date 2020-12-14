<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_point.php";
$fileName = "point"; 
$tableName = $fileName;
$columnOneName = "point_name";

$name = ms_escape_string($_POST["name"]);
$cell = ms_escape_string($_POST["cell"]);
$posx = ms_escape_string($_POST["posx"]);
$posy = ms_escape_string($_POST["posy"]);
 
if(empty($name) || empty($cell) || empty($posx) || empty($posy)){
	header("Location: ".$filePath."?".$fileName."=empty");
	exit();
}else{
 
	if(!preg_match("/^[a-zA-Z0-9_.]*$/",$name) || !preg_match("/^[0-9]*$/",$cell) || !preg_match("/^[0-9]*$/",$posx) || !preg_match("/^[0-9]*$/",$posy)  ){
		header("Location: ".$filePath."?".$fileName."=invalid");
			exit();
		}else{
			
			if(strlen($name)>=60){
				header("Location: ".$filePath."?".$fileName."=overflow");
				exit();
			}else{
			
				//INSERT
				$sql = "INSERT INTO $tableName ($columnOneName, point_cell, point_posx, point_posy, state) VALUES ('$name','$cell','$posx','$posy',1)";
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
?>
