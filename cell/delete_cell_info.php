<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_cell.php";
$fileName = "delete_cell_info"; 
$tableName = "cell_info";

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
			
			//LOOK UP FOR IT
			$sql = "SELECT * FROM $tableName WHERE id='$id'";
			$params = array();

			$stmt = sqlsrv_query( $conn, $sql, $params);
			
			if($stmt === false){
				header("Location: ".$filePath."?".$fileName."=not_present");
				exit();
			}else{

				$sql = "DELETE FROM $tableName WHERE id='$id'";
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
