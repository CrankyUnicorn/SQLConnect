<?php
include '../connect.php';
include '../input_cleaner.php';

$keywordOne = "player";
$keywordTwo = "character";

$filePath = "../page_player_character.php";
$fileName = "modify_player_character";

$tableName = $keywordOne."_".$keywordTwo;
$columnOneName = $keywordOne."_id";
$columnTwoName = $keywordTwo."_id";

$tableOneName = $keywordOne;
$columnTableOneName = "nick_name"; // replace this on other folder that fit the standard
$tableTwoName = $keywordTwo;
$columnTableTwoName = $keywordTwo."_name";

$id = ms_escape_string($_POST["id"]);
$idOne = ms_escape_string($_POST["id_one"]);
$idTwo = ms_escape_string($_POST["id_two"]);

if (empty($idOne) || empty($idTwo)) {
	header("Location: " . $filePath . "?" . $fileName . "=empty");
	exit();
} else {

	if (!preg_match("/^[0-9]*$/", $idOne) || !preg_match("/^[0-9]*$/", $idTwo)) {
		header("Location: " . $filePath . "?" . $fileName . "=invalid");
		exit();
	} else {

		$sql = "SELECT * FROM $tableName WHERE id = $id ";
		$params = array(1, "some data");
	
		//first check
		$stmt = sqlsrv_query( $conn, $sql, $params);
		if($stmt === false){
			header("Location: " . $filePath . "?" . $fileName . "=invalid_id");
		exit();
		}

		//second check
		$sql = "SELECT * FROM $tableOneName WHERE id = $idOne ";
		$params = array(1, "some data");
	
		$stmt = sqlsrv_query( $conn, $sql, $params);
		if($stmt === false){
			header("Location: " . $filePath . "?" . $fileName . "=invalid_id_1");
		exit();
		}

		//third check
		$sql = "SELECT * FROM $tableTwoName WHERE id = $idTwo ";
		$params = array(1, "some data");
	
		$stmt = sqlsrv_query( $conn, $sql, $params);
		if($stmt === false){
			header("Location: " . $filePath . "?" . $fileName . "=invalid_id_2");
		exit();
		}

		//check if two is already being used by someone
		$sql = "SELECT * FROM $tableName WHERE $columnTwoName = $idTwo ";

		$stmt = sqlsrv_query($conn, $sql);
		
		if (sqlsrv_has_rows ( $stmt ) != false) {
			header("Location: " . $filePath . "?" . $fileName . "=taken");
			exit();
		}

		$sql = "UPDATE $tableName SET $columnOneName='$idOne', $columnTwoName='$idTwo' WHERE id='$id'";
		
		$params = array();
		$stmt = sqlsrv_query($conn, $sql, $params);
		
		if ($stmt === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			header("Location: " . $filePath . "?" . $fileName . "=success");
		}
	}
}
