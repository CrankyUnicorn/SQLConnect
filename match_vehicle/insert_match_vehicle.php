<?php
include '../connect.php';
include '../input_cleaner.php';

$keywordOne = "match";
$keywordTwo = "vehicle";

$filePath = "../page_match_vehicle.php";
$fileName = "insert_match_vehicle";

$tableName = $keywordOne . "_" . $keywordTwo;
$columnOneName = $keywordOne . "_id";
$columnTwoName = $keywordTwo . "_id";

$tableOneName = $keywordOne;
$columnTableOneName = $keywordOne . "_name"; // replace this on other folder that fit the standard
$tableTwoName = $keywordTwo;
$columnTableTwoName = $keywordTwo . "_name";

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

		//first check
		$sql = "SELECT * FROM $tableOneName WHERE id = $idOne ";

		$stmt = sqlsrv_query($conn, $sql);

		if (sqlsrv_has_rows($stmt) === false) {
			header("Location: " . $filePath . "?" . $fileName . "=invalid_id_1");
			exit();
		}

		//second check
		$sql = "SELECT * FROM $tableTwoName WHERE id = $idTwo ";

		$stmt = sqlsrv_query($conn, $sql);

		if (sqlsrv_has_rows($stmt) === false) {
			header("Location: " . $filePath . "?" . $fileName . "=invalid_id_2");
			exit();
		}

		//check if two is already being used by someone
		$sql = "SELECT * FROM $tableName WHERE $columnTwoName = $idTwo ";

		$stmt = sqlsrv_query($conn, $sql);

		if (sqlsrv_has_rows($stmt) != false) {
			header("Location: " . $filePath . "?" . $fileName . "=taken");
			exit();
		}

		$sql = "INSERT INTO $tableName ($columnOneName, $columnTwoName) VALUES ( '$idOne', '$idTwo')";

		$params = array();
		$stmt = sqlsrv_query($conn, $sql, $params);

		if ($stmt === false) {
			die(print_r(sqlsrv_errors(), true));
		} else {
			header("Location: " . $filePath . "?" . $fileName . "=success");
		}
	}
}
