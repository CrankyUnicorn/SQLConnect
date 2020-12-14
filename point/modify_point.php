<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_point.php";
$fileName = "modify_point"; 
$tableName = "point";

$id = ms_escape_string($_POST["id"]);
$name = ms_escape_string($_POST["name"]);
$cell = ms_escape_string($_POST["cell"]);
$posx = ms_escape_string($_POST["posx"]);
$posy = ms_escape_string($_POST["posy"]);
 
if(empty($name) ){
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
			
			//LOOK UP FOR IT
			$sql = "SELECT * FROM $tableName WHERE id='$id'";
			$params = array();

			$stmt = sqlsrv_query( $conn, $sql, $params);
			
			if($stmt === false){
				header("Location: ".$filePath."?".$fileName."=not_present");
				exit();
			}else{

				$sql = "UPDATE $tableName SET point_name='$name', point_cell='$cell', point_posx='$posx', point_posy='$posy' WHERE id='$id'";
				$params = array();

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
