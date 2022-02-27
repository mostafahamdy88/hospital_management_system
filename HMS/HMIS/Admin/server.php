<?php
session_start();

$username = "";
$password = "";
$errors = array();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital');


// ---------------------------------------------/Login User\---------------------------------------------
if (isset($_POST['login_btn'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	if (count($errors) == 0) {

		$query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
		$results = mysqli_query($conn, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			array_push($errors, "");
			header('location: Admin-dashboard.php');
		} else {
			array_push($errors, "Wrong, username not matches with password, try again...");
		}
	}
}

// ---------------------------------------------/Add Doctor\---------------------------------------------

$D_fullname = "";
$D_username = "";
$D_email = "";
$D_phone = "";
$D_specialty = "";
$D_address = "";
$D_password = "";
$D_conf_password = "";
$D_gender = "";
$D_errors = array();
$D_correct = array();

if (isset($_POST['D_add_btn'])) {
	
	$D_fullname = mysqli_real_escape_string($conn, $_POST['D_fullname']);
	$D_username = mysqli_real_escape_string($conn, $_POST['D_username']);
	$D_email = mysqli_real_escape_string($conn, $_POST['D_email']);
	$D_phone =  $_POST['D_phone'];
	$D_specialty = $_POST['D_specialty'];
	$D_address = $_POST['D_address'];
	$D_password = mysqli_real_escape_string($conn, $_POST['D_password']);
	$D_conf_password = mysqli_real_escape_string($conn, $_POST['D_conf_password']);
	$D_gender = $_POST['D_gender'];

	//first check the database to make sure check if two passwords equal or not...
	if ($D_password != $D_conf_password) {
		array_push($D_errors, "The two passwords do not match, try again...");
	}

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM doctors WHERE username='$D_username' OR email='$D_email' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$D_user = mysqli_fetch_assoc($result);

	if ($D_user) { // if user exists
		if ($D_user['username'] === $D_username) {
			array_push($D_errors, "Doctor Username already exists, try again...");
		}

		if ($D_user['email'] === $D_email) {
			array_push($D_errors, "Doctor Email already exists, try again...");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($D_errors) == 0) {

		$query = "INSERT INTO doctors(fullname, username, email, phone, specialty, address, password, gender) 
			VALUES('$D_fullname', '$D_username', '$D_email', '$D_phone', '$D_specialty', '$D_address', '$D_password', '$D_gender')";
		mysqli_query($conn, $query);
		array_push($D_correct, "Congratulations, you have successfully added new patient...");
	}
}

// ---------------------------------------------/Add Patient\---------------------------------------------
$P_fullname = "";
$P_username = "";
$P_email = "";
$P_phone = "";
$P_city = "";
$P_address = "";
$P_password = "";
$P_conf_password = "";
$P_gender = "";
$P_errors = array();
$P_correct = array();

if (isset($_POST['P_add_btn'])) {
	// receive all input values from the form
	$P_fullname = mysqli_real_escape_string($conn, $_POST['P_fullname']);
	$P_username = mysqli_real_escape_string($conn, $_POST['P_username']);
	$P_email = mysqli_real_escape_string($conn, $_POST['P_email']);
	$P_phone =  $_POST['P_phone'];
	$P_city = $_POST['P_city'];
	$P_address = $_POST['P_address'];
	$P_password = mysqli_real_escape_string($conn, $_POST['P_password']);
	$P_conf_password = mysqli_real_escape_string($conn, $_POST['P_conf_password']);
	$P_gender = $_POST['P_gender'];

	//first check the database to make sure check if two passwords equal or not...
	if ($P_password != $P_conf_password) {
		array_push($P_errors, "The two passwords do not match, try again...");
	}

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM patients WHERE username='$P_username' OR email='$P_email' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$P_user = mysqli_fetch_assoc($result);

	if ($P_user) { // if user exists
		if ($P_user['username'] === $P_username) {
			array_push($P_errors, "Username already exists, try again...");
		}

		if ($P_user['email'] === $P_email) {
			array_push($P_errors, "Email already exists, try again...");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($P_errors) == 0) {

		$query = "INSERT INTO patients(fullname, username, email, phone, city, address, password, gender) 
			VALUES('$P_fullname', '$P_username', '$P_email', '$P_phone', '$P_city', '$P_address', '$P_password', '$P_gender')";
		mysqli_query($conn, $query);
		array_push($P_correct, "Congratulations, you have successfully added new patient...");
	}
}

//---------------------------------------/Cancel Appointment\---------------------------------------

if (isset($_POST['cancel_btn'])) {
	$id = $_POST['cancel_id'];

	$D_query = "DELETE FROM appointments WHERE id='$id' ";
	$query_run = mysqli_query($conn, $D_query);
	if ($query_run) {
		header('Location: Appointment-History.php');
	}
}

// ----------------------------------------------/Delete Doctor\---------------------------------------------

if (isset($_POST['D_delete_btn'])) {
	$id = $_POST['D_delete_id'];

	$D_query = "DELETE FROM doctors WHERE id='$id' ";
	$query_run = mysqli_query($conn, $D_query);
	if ($query_run) {
		header('Location: Manage-Doctors.php');
	}
}

// ----------------------------------------------/Delete Patient\---------------------------------------------

if (isset($_POST['P_delete_btn'])) {
	$id = $_POST['P_delete_id'];

	$P_query = "DELETE FROM patients WHERE id='$id' ";
	$query_run = mysqli_query($conn, $P_query);
	if ($query_run) {
		header('Location: Manage-Patients.php');
	}
}

// ----------------------------------------------/Search Doctor\---------------------------------------------

if (isset($_POST['D_search'])) {
	$valueToSearch = $_POST['valueToSearch'];

	$SD_query = "SELECT * FROM doctors WHERE username ='$valueToSearch'";
	$SD_filter_Result = mysqli_query($conn, $SD_query);
	if ($valueToSearch == null) {
		$SD_query = "SELECT * FROM doctors";
		$SD_filter_Result = mysqli_query($conn, $SD_query);
	}
} else {
	$SD_query = "SELECT * FROM doctors";
	$SD_filter_Result = mysqli_query($conn, $SD_query);
}

// ----------------------------------------------/Search Patient\---------------------------------------------

if (isset($_POST['P_search'])) {
	$valueToSearch = $_POST['valueToSearch'];

	$SP_query = "SELECT * FROM patients WHERE username ='$valueToSearch'";
	$SP_filter_Result = mysqli_query($conn, $SP_query);
	if ($valueToSearch == null) {
		$SP_query = "SELECT * FROM patients";
		$SP_filter_Result = mysqli_query($conn, $SP_query);
	}
} else {
	$SP_query = "SELECT * FROM patients";
	$SP_filter_Result = mysqli_query($conn, $SP_query);
}

