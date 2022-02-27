<?php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital');

// ---------------------------------------------/Send Message\---------------------------------------------

$name = "";
$phone = "";
$email = "";
$message = "";

if (isset($_POST['send_btn'])) {
	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$message =  $_POST['message'];



		$query = "INSERT INTO contactus(name, phone, email, message) 
			VALUES('$name', '$phone', '$email', '$message')";
		mysqli_query($conn, $query);
}
