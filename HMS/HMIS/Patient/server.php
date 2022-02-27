<?php
session_start();

$fullname = "";
$username = "";
$email = "";
$phone = "";
$city = "";
$address = "";
$password = "";
$conf_password = "";
$gender = "";
$errors = array();
$correct = array();

// -----------------------/////////// Database Connection \\\\\\\\\\\-----------------------

$conn = new mysqli('localhost', 'root', '', 'hospital');

// ---------------------------------------------/Register Doctor\---------------------------------------------

if (isset($_POST['register_btn'])) {
	// receive all input values from the form
	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone =  $_POST['phone'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);
	$gender = $_POST['gender'];

	//first check the database to make sure check if two passwords equal or not...
	if ($password != $conf_password) {
		array_push($errors, "The two passwords do not match, try again...");
	}

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM patients WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if ($user) { // if user exists
		if ($user['username'] === $username) {
			array_push($errors, "Username already exists, try again...");
		}

		if ($user['email'] === $email) {
			array_push($errors, "Email already exists, try again...");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {

		$query = "INSERT INTO patients(fullname, username, email, phone, city, address, password, gender) 
  			  VALUES('$fullname', '$username', '$email', '$phone', '$city', '$address', '$password', '$gender')";
		mysqli_query($conn, $query);
		array_push($correct, "Congratulations, you have successfully registered, Press login below...");
	}
}

// ---------------------------------------------/Login User\---------------------------------------------
if (isset($_POST['login_btn'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	if (count($errors) == 0) {

		$query = "SELECT * FROM patients WHERE username='$username' AND password='$password'";
		$results = mysqli_query($conn, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			array_push($errors, "");
			header('location: Patient-dashboard.php');
		} else {
			array_push($errors, "Wrong, username not matches with password, try again...");
		}
	}
}

//---------------------------------------------/Update Profile\---------------------------------------------

$U_fullname = "";
$U_username = "";
$U_email = "";
$U_phone = "";
$U_city = "";
$U_address = "";
$U_password = "";
$U_conf_password = "";
$U_errors = array();
$U_correct = array();

if (isset($_POST['update_btn'])) {
	// receive all input values from the form
	$U_fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$U_username = mysqli_real_escape_string($conn, $_POST['username']);
	$U_email = mysqli_real_escape_string($conn, $_POST['email']);
	$U_phone =  $_POST['phone'];
	$U_city = $_POST['city'];
	$U_address = $_POST['address'];
	$U_password = mysqli_real_escape_string($conn, $_POST['password']);
	$U_conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);

	//first check the database to make sure check if two passwords equal or not...
	if ($U_password != $U_conf_password) {
		array_push($U_errors, "The two passwords do not match, try again...");
	}

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM patients WHERE username='$U_username' OR email='$U_email' LIMIT 1";
	$U_result = mysqli_query($conn, $user_check_query);
	$U_user = mysqli_fetch_assoc($U_result);


	if ($U_user) { // if user exists
		if ($U_user['email'] === $U_email) {
			array_push($U_errors, "Email already exists, try again...");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($U_errors) == 0) {
		$U_query = "UPDATE patients SET fullname ='$U_fullname', email='$U_email', phone='$U_phone', 
		city='$U_city', address='$U_address', password='$U_password' WHERE username='$U_username' ";
		mysqli_query($conn, $U_query);
		array_push($U_correct, "You have successfully Updated your profile...");
	}
}
//---------------------------------------/Book Appointment\---------------------------------------
$patient = "";
$specialty = "";
$doctor = "";
$consultancy = "";
$date = "";
$time = "";
$A_errors = array();
$A_correct = array();

if (isset($_POST['book_btn'])) {
	$patient = $_POST['patient'];
	$doctor = $_POST['doctor'];
	$specialty = $_POST['specialty'];
	$consultancy =  $_POST['consultancy'];
	$date = $_POST['date'];
	$time = $_POST['time'];


	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$appointment_check_query = "SELECT * FROM appointments WHERE A_date='$date' AND A_time='$time' LIMIT 1";
	$A_result = mysqli_query($conn, $appointment_check_query);
	$appointment = mysqli_fetch_assoc($A_result);
	if ($appointment) { // if appointment exists
		if ($appointment['A_date'] === $date && $appointment['A_time'] === $time) {
				array_push($A_errors, "Sorry, This Appointment has been reserved...");
		}
	}

	if (count($A_errors) == 0) {
		$A_query = "INSERT INTO appointments(patient, doctor, specialty, consultancy, A_date, A_time) 
  			  VALUES('$patient', '$doctor', '$specialty', '$consultancy', '$date', '$time')";
		mysqli_query($conn, $A_query);
		array_push($A_correct, "Congratulations, you have successfully booked this appointment...");
	}
}
//---------------------------------------/Cancel Appointment\---------------------------------------

if (isset($_POST['cancel_btn'])) {
	$id = $_POST['cancel_id'];

	$D_query = "DELETE FROM appointments WHERE id='$id' ";
	$query_run = mysqli_query($conn, $D_query);
	if ($query_run) {
		header('Location: Patient-Appointment-History.php');
	}
}
