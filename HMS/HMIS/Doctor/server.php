<?php
session_start();


// -----------------------/////////// Database Connection \\\\\\\\\\\-----------------------
$conn = new mysqli('localhost', 'root', '', 'hospital');

// ---------------------------------------------/Register Doctor\---------------------------------------------
$fullname = "";
$username = "";
$email = "";
$phone = "";
$specialty = "";
$address = "";
$password = "";
$conf_password = "";
$gender = "";
$errors = array();
$correct = array();

if (isset($_POST['register_btn'])) {
	// receive all input values from the form
	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone =  $_POST['phone'];
	$specialty = $_POST['specialty'];
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
	$user_check_query = "SELECT * FROM doctors WHERE username='$username' OR email='$email' LIMIT 1";
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

		$query = "INSERT INTO doctors(fullname, username, email, phone, specialty, address, password, gender) 
  			  VALUES('$fullname', '$username', '$email', '$phone', '$specialty', '$address', '$password', '$gender')";
		mysqli_query($conn, $query);
		array_push($correct, "Congratulations, you have successfully registered, Press login below...");
	}
}

// ---------------------------------------------/Login User\---------------------------------------------
if (isset($_POST['login_btn'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	if (count($errors) == 0) {

		$query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
		$results = mysqli_query($conn, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			array_push($errors, "");
			header('location: Doctor-dashboard.php');
		} else {
			array_push($errors, "Wrong, username not matches with password, try again...");
		}
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

if (isset($_POST['add_btn'])) {
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
		array_push($errors, "The two passwords do not match, try again...");
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


//---------------------------------------------/Update Profile\---------------------------------------------

$U_fullname = "";
$U_username = "";
$U_email = "";
$U_phone = "";
$U_specialty = "";
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
	$U_specialty = $_POST['specialty'];
	$U_address = $_POST['address'];
	$U_password = mysqli_real_escape_string($conn, $_POST['password']);
	$U_conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);

	//first check the database to make sure check if two passwords equal or not...
	if ($U_password != $U_conf_password) {
		array_push($U_errors, "The two passwords do not match, try again...");
	}

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM doctors WHERE username='$U_username' OR email='$U_email' LIMIT 1";
	$U_result = mysqli_query($conn, $user_check_query);
	$U_user = mysqli_fetch_assoc($U_result);


	if ($U_user) { // if user exists
		if ($U_user['email'] === $U_email) {
			array_push($U_errors, "Email already exists, try again...");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($U_errors) == 0) {
		$U_query = "UPDATE doctors SET fullname ='$U_fullname', email='$U_email', phone='$U_phone', 
		specialty='$U_specialty', address='$U_address', password='$U_password' WHERE username='$U_username' ";
		mysqli_query($conn, $U_query);
		array_push($U_correct, "You have successfully Updated your profile...");
	}
}



// ----------------------------------------------/Delete Patient\---------------------------------------------

if (isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];

	$D_query = "DELETE FROM patients WHERE id='$id' ";
	$query_run = mysqli_query($conn, $D_query);
	if ($query_run) {
		header('Location: Doctor-Manage-Patient.php');
	}
}

// ----------------------------------------------/Search Patient\---------------------------------------------

if (isset($_POST['search'])) {
	$valueToSearch = $_POST['valueToSearch'];

	$F_query = "SELECT * FROM patients WHERE username ='$valueToSearch'";
	$filter_Result = mysqli_query($conn, $F_query);
	if ($valueToSearch == null) {
		$F_query = "SELECT * FROM patients";
		$filter_Result = mysqli_query($conn, $F_query);
	}
} else {
	$F_query = "SELECT * FROM patients";
	$filter_Result = mysqli_query($conn, $F_query);
}

// -----------------------------------/Create Medical Record\-----------------------------------
$doctor = "";
$patient = "";
$weight = "";
$height = "";
$age = "";
$BPressure = "";
$BSugar = "";
$heart = "";
$BType = "";
$chronic = "";
$MRC_errors = array();
$MRC_correct = array();

if (isset($_POST['mr_create_btn'])) {
	// receive all input values from the form
	$doctor = mysqli_real_escape_string($conn, $_POST['doctor']);
	$patient = mysqli_real_escape_string($conn, $_POST['patient']);
	$weight = $_POST['weight'];
	$height =  $_POST['height'];
	$age = $_POST['age'];
	$BPressure = $_POST['BPressure'];
	$BSugar = $_POST['BSugar'];
	$heart = $_POST['heart'];
	$BType = $_POST['BType'];
	$chronic = $_POST['chronic'];

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$MRC_query = "SELECT * FROM medicalrecord WHERE patient='$patient' LIMIT 1";
	$MRC_result = mysqli_query($conn, $MRC_query);
	$medicalrecord = mysqli_fetch_assoc($MRC_result);

	if ($medicalrecord) { // if medical record exists
		if ($medicalrecord['patient'] === $patient) {
			array_push($MRC_errors, "Patient already has Medical Record...");
		}
	}

	if (count($MRC_errors) == 0) {

		$query = "INSERT INTO medicalrecord(patient, doctor, weight, height, age, BPressure, BSugar, heart, BType, chronic) 
			VALUES('$patient', '$doctor', '$weight', '$height', '$age', '$BPressure', '$BSugar', '$heart', '$BType', '$chronic')";
		mysqli_query($conn, $query);
		array_push($MRC_correct, "Congratulations, you have successfully created new Medical Record...");
	}
}

// -----------------------------------/Update Medical Record\-----------------------------------

$MRU_doctor = "";
$MRU_patient = "";
$MRU_weight = "";
$MRU_height = "";
$MRU_age = "";
$MRU_BPressure = "";
$MRU_BSugar = "";
$MRU_heart = "";
$MRU_BType = "";
$MRU_chronic = "";
$MRU_errors = array();
$MRU_correct = array();

if (isset($_POST['mr_update_btn'])) {
	// receive all input values from the form
	$MRU_doctor = $_POST['doctor'];
	$MRU_patient = $_POST['patient'];
	$MRU_weight = $_POST['weight'];
	$MRU_height =  $_POST['height'];
	$MRU_age = $_POST['age'];
	$MRU_BPressure = $_POST['BPressure'];
	$MRU_BSugar = $_POST['BSugar'];
	$MRU_heart = $_POST['heart'];
	$MRU_BType = $_POST['BType'];
	$MRU_chronic = $_POST['chronic'];

	if (count($MRU_errors) == 0) {

		$MRU_query = "SELECT * FROM medicalrecord WHERE patient = '$MRU_patient'";
		$MRU_result = mysqli_query($conn, $MRU_query);
		if (mysqli_num_rows($MRU_result) == 1) {
			$MRU_query = "UPDATE medicalrecord SET doctor ='$MRU_doctor', weight='$MRU_weight', 
		height='$MRU_height', age='$MRU_age', BPressure='$MRU_BPressure', BSugar='$MRU_BSugar', 
		heart='$MRU_heart', BType='$MRU_BType', chronic='$MRU_chronic' WHERE patient='$MRU_patient'";
			mysqli_query($conn, $MRU_query);
			array_push($MRU_correct, "You have successfully Updated Medical Record...");
		} else {
			array_push($MRU_errors, "This patient doesn't have medical record, create new one...");
		}
	}
}

//---------------------------------------/Cancel Appointment\---------------------------------------

if (isset($_POST['cancel_btn'])) {
	$id = $_POST['cancel_id'];

	$D_query = "DELETE FROM appointments WHERE id='$id' ";
	$query_run = mysqli_query($conn, $D_query);
	if ($query_run) {
		header('Location: Doctor-Appointment-History.php');
	}
}