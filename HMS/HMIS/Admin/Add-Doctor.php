<?php include('server.php') ?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: Admin-login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: Admin-login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Add Doctor</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="dashboard-style.css">
</head>

<body>

  <input type="checkbox" id="nav-toggle">
  <div class="sidebar">
    <div class="sidebar-brand">
      <h2><span class="las la-clinic-medical"></span> <span>HMS</span></h2>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li> <a href="Admin-dashboard.php">
            <i class="fas fa-home"></i><span style="margin-left: 15px;">Dashboard</span>
          </a>
        </li>
        <li> <a href="#">
            <i class="fas fa-user-nurse"></i><span style="margin-left: 15px;">Doctors</span>
            <i class="fas fa-caret-right icon" style="float: right;"></i>
            <ul>
              <li><a href="#">
                  <i class="fas fa-plus-circle icon"></i><span style="margin-left: 10px;">Add
                    Doctor</span></a></li>
              <li><a href="Manage-Doctors.php">
                  <i class="fas fa-edit icon"></i><span style="margin-left: 10px;">Manage
                    Doctors</span></a></li>
            </ul>
          </a>
        </li>
        <li><a href="#">
            <i class="fas fa-wheelchair"></i><span style="margin-left: 15px;">Patients</span>
            <i class="fas fa-caret-right icon" style="float: right;"></i>
            <ul>
              <li><a href="Add-Patient.php">
                  <i class="fas fa-plus-circle icon"></i><span style="margin-left: 10px;">Add
                    Patient</span></a></li>
              <li><a href="Manage-Patients.php">
                  <i class="fas fa-edit icon"></i><span style="margin-left: 10px;">Manage
                    Patients</span></a></li>
            </ul>
          </a>
        </li>
        <li> <a href="Appointment-History.php">
            <i class="fas fa-history"></i><span style="margin-left: 15px;">Appointments History</span>
          </a>
        </li>
        <li> <a href="Doctors-Search.php">
            <i class="fas fa-search"></i><span style="margin-left: 15px;">Doctor Search</span>
          </a>
        </li>
        <li> <a href="Patients-Search.php">
            <i class="fas fa-search"></i><span style="margin-left: 15px;">Patient Search</span>
          </a>
        </li>
        <li> <a href="Contactus-Show.php">
            <i class="fas fa-sms"></i><span style="margin-left: 15px;">Contactus Queries</span>
          </a>
        </li>
        <li> <a href="Devices-Show.php">
            <i class="fas fa-desktop"></i><span style="margin-left: 15px;">Manage Devices</span>
          </a>
        </li>
        <li> <a href="#">
            <i class="fas fa-book-medical"></i><span style="margin-left: 15px;">Doctor Session Logs</span>
          </a>
        </li>
        <?php if (isset($_SESSION['username'])) : ?>
          <li> <a href="Admin-login.php?logout='1'">
              <i class="fas fa-sign-out-alt"></i><span style="margin-left: 10px;">Logout</span>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle">
          <span class="las la-bars"></span>
        </label> Hospital Management System
      </h2>

      <div class="user-wrapper">
        <img src="../img/profile.png" width="50px" height="50px" alt="">
        <div>
          <h4>Administrator</h4>
          <?php if (isset($_SESSION['username'])) : ?>
            <small><?php echo $_SESSION['username']; ?></small>
          <?php endif ?>
        </div>
      </div>
    </header>

    <main>

      <div class="mainTitle">
        <h3>Admin | Add Doctor</h3>
      </div>

      <div class="content">

        <form action="#" method="post">
          <?php include('errors.php'); ?>
          <?php include('correct.php'); ?>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Doctor Full Name</span>
              <input type="text" placeholder="Enter Doctor name" id="D_fullname" name="D_fullname" value="<?php echo $D_fullname; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Doctor Username</span>
              <input type="text" placeholder="Enter Doctor username" id="D_username" name="D_username" value="<?php echo $D_username; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Doctor Email</span>
              <input type="email" placeholder="Enter Doctor email" id="D_email" name="D_email" value="<?php echo $D_email; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Doctor Phone Number</span>
              <input type="number" placeholder="Enter Doctor number" id="D_phone" name="D_phone" value="<?php echo $D_phone; ?>" required>
            </div>
            <div class="input-box">
              <span class="details">Doctor Specialty</span>
              <select name="D_specialty" id="D_specialty">
                <option>Select Specialty</option>
                <option name="D_specialty" value="Anesthesiology">Anesthesiology</option>
                <option name="D_specialty" value="Allergy">Allergy</option>
                <option name="D_specialty" value="Cardiology">Cardiology</option>
                <option name="D_specialty" value="Dermatology">Dermatology</option>
                <option name="D_specialty" value="Family Physician">Family Doctor</option>
                <option name="D_specialty" value="Infectious disease">Infectious disease</option>
                <option name="D_specialty" value="Neurology">Neurology</option>
                <option name="D_specialty" value="Ophthalmology">Ophthalmology</option>
                <option name="D_specialty" value="Oncology">Oncology</option>
                <option name="D_specialty" value="Pediatrics">Pediatrics</option>
                <option name="D_specialty" value="Pulmonology">Pulmonology</option>
                <option name="D_specialty" value="Radiology">Radiology</option>
                <option name="D_specialty" value="Surgery">Surgery</option>
              </select>
            </div>

            <div class="input-box">
              <span class="details">Doctor Address</span>
              <input type="text" placeholder="Enter patient address" id="D_address" name="D_address" value="<?php echo $D_address; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Doctor Password</span>
              <input type="password" placeholder="Enter patient password" id="D_password" name="D_password" required>
            </div>

            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" placeholder="Confirm patient password" id="D_conf_password" name="D_conf_password" required>
            </div>

          </div>

          <div class="gender-details">
            <input type="radio" name="D_gender" id="dot-1" value="male" required>
            <input type="radio" name="D_gender" id="dot-2" value="female" required>
            <span class="gender-title">Patient Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
            </div>
          </div>

          <div class="button">
            <input type="submit" value="Add" name="D_add_btn">
          </div>

        </form>
      </div>


    </main>

  </div>

</body>

</html>