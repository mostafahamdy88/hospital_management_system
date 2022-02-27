<?php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital');

// ---------------------------------------------/Add Device\---------------------------------------------

$name = "";
$model = "";
$department = "";
$ip = "";
$port = "";
$ae_title = "";
$date = "";
$errors = array();
$correct = array();

if (isset($_POST['add_btn'])) {
	
	$name = $_POST['name'];
	$model = $_POST['model'];
	$department = $_POST['department'];
	$ip =  $_POST['ip'];
	$port = $_POST['port'];
	$ae_title = $_POST['ae_title'];
	$date = $_POST['date'];

	$device_check_query = "SELECT * FROM devices WHERE name='$name' LIMIT 1";
	$result = mysqli_query($conn, $device_check_query);
	$device = mysqli_fetch_assoc($result);

	if ($device) { // if device exists
		if ($D_user['name'] === $name) {
			array_push($errors, "Device Name already exists, try Another name...");
		}
	}
	if (count($errors) == 0) {

		$query = "INSERT INTO devices(name, model, department, ip, port, ae_title, date) 
			VALUES('$name', '$model', '$department', '$ip', '$port', '$ae_title', '$date')";
		mysqli_query($conn, $query);
		array_push($correct, "Congratulations, you have successfully added new Device...");
	}
}
