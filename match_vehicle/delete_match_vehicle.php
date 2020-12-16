<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_match_vehicle.php";
$fileName = "delete_match_vehicle"; 
$tableName = "match_vehicle";

$id = ms_escape_string($_POST["id"]);
 
if(empty($id)){
	header("Location: ".$filePath."?".$fileName."=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$id)){
		header("Location: ".$filePath."?".$fileName."=invalid");
		exit();
	}else{
			
		if(strlen($id)>=11){
			header("Location: ".$filePath."?".$fileName."=overflow");
			exit();
		}else{
			
			//INSERT
			$sql = "SELECT * FROM $tableName WHERE id='$id'";
			$params = array();

			$stmt = sqlsrv_query( $conn, $sql, $params);
				
			if($stmt != false){
			
				
				$sql = "SELECT * FROM $tableName WHERE id='$id'";
				$params = array(1, "some data");
				
				$stmt = sqlsrv_query( $conn, $sql, $params);
				while($row = sqlsrv_fetch_array($stmt)){
				
						//DELETE ROW
						$sql = "DELETE FROM $tableName WHERE $tableName.id='$id'";
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
}
?>
