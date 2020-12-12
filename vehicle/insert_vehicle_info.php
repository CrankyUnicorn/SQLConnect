<?php
include '../connect.php';
include '../input_cleaner.php';

$filePath = "../page_vehicle.php";
$fileName = "vehicle_info"; 
$tableOneName = "vehicle";
$columnOneName = "vehicle_id";
$columnTwoName = "vehicle_info_id";
$tableTwoName = "vehicle_info_category";
$tableThreeName = "vehicle_info";

$id = ms_escape_string($_POST["id"]);
$info_id = ms_escape_string($_POST["info_id"]);
$info = ms_escape_string($_POST["info"]);
 
if(empty($id) || empty($info_id) || empty($info)){
	header("Location: ".$filePath."?".$fileName."=empty");
	exit();
}else{
 
	if(!preg_match("/^[0-9]*$/",$id) || !preg_match("/^[0-9]*$/",$info_id) || !preg_match("/^[a-zA-Z0-9., _@!?]*$/",$info)){
		header("Location: ".$filePath."?".$fileName."=invalid");
			exit();
		}else{
			
			if(strlen($id)>=11 || strlen($info_id)>=11 || strlen($info)>=120){
				header("Location: ".$filePath."?".$fileName."=overflow");
				exit();
			}else{
				
			//CHECK IF BOTH ELEMENTS REGISTRIES EXIST	
			$sql = "SELECT id FROM $tableOneName WHERE id='$id'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
			
			if($stmtlen === 0){
				header("Location: ".$filePath."?".$fileName."=id_null");
				exit();
			}else{
					
				$sql = "SELECT id FROM $tableTwoName WHERE id='$info_id'";
				$params = array();
				$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$stmt = sqlsrv_query( $conn, $sql, $params, $options);
				$stmtlen = sqlsrv_num_rows($stmt); 
			
				if($stmtlen === 0){
					header("Location: ".$filePath."?".$fileName."=info_id_null");
					exit();
				}else{	
				
					//INSERT
					$sql = "INSERT INTO $tableThreeName ($columnOneName, $columnTwoName, info) VALUES ('$id','$info_id','$info')";
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
