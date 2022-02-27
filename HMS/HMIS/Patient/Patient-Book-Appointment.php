<?php include('server.php') ?>
<?php
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: Patient-login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: Patient-login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Patient Book Appointment</title>
  <script src="js/jquery-3.6.0.min.js"> </script>
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
                <li> <a href="Patient-dashboard.php">
                        <i class="fas fa-home icon"></i><span style="margin-left: 15px;">Dashboard</span>
                    </a>
                </li>
                <li> <a href="#">
                        <i class="fas fa-calendar-check icon"></i><span style="margin-left: 15px;">Book
                            Appointment</span>
                    </a>
                </li>
                <li> <a href="Patient-Appointment-History.php">
                        <i class="fas fa-clock icon"></i><span style="margin-left: 15px;">Appointment History</span>
                    </a>
                </li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li><a href="Patient-login.php?logout='1'">
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
          <h4>User</h4>
          <?php if (isset($_SESSION['username'])) : ?>
            <small><?php echo $_SESSION['username']; ?></small>
          <?php endif ?>
        </div>
      </div>
    </header>

    <main>
      <div class="mainTitle">
        <h3>User | Book Appointment</h3><br>
      </div>
      <div class="content">
        <form action="Patient-Book-Appointment.php" method="post">
        <?php include('errors.php'); ?>
        <?php include('correct.php'); ?>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Patient Username</span>
              <input type="text" readonly id="patient" name="patient" value="<?php echo $_SESSION['username']; ?>">
            </div>
            <div class="input-box">
              <span class="details">Doctor specialty</span>
              <select name="specialty" id="specialty" required>
                <option>Select Specialty</option>
                <option name="specialty" value="Anesthesiology">Anesthesiology</option>
                <option name="specialty" value="Allergy">Allergy</option>
                <option name="specialty" value="Cardiology">Cardiology</option>
                <option name="specialty" value="Dermatology">Dermatology</option>
                <option name="specialty" value="Family Physician">Family Doctor</option>
                <option name="specialty" value="Infectious disease">Infectious disease</option>
                <option name="specialty" value="Neurology">Neurology</option>
                <option name="specialty" value="Ophthalmology">Ophthalmology</option>
                <option name="specialty" value="Oncology">Oncology</option>
                <option name="specialty" value="Pediatrics">Pediatrics</option>
                <option name="specialty" value="Pulmonology">Pulmonology</option>
                <option name="specialty" value="Radiology">Radiology</option>
                <option name="specialty" value="Surgery">Surgery</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Doctor</span>
              <select name="doctor" id="doctor" required>
                <option>Select Doctor</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Consultancy Fee</span>
              <select name="consultancy" id="consultancy" required>
                <option name="consultancy" value="100">100 EGP</option>
                <option name="consultancy" value="120">120 EGP</option>
                <option name="consultancy" value="150">150 EGP</option>
                <option name="consultancy" value="200">200 EGP</option>
                <option name="consultancy" value="250">250 EGP</option>
                </select>
            </div>
            <div class="input-box">
              <span class="details">Appointment Date</span>
              <input type="date" id="date" name="date" required>
            </div>
            <div class="input-box">
              <span class="details">Appointment Time</span required>
              <input type="time" id="time" name="time">
            </div>
          </div>
          <div class="button" style="margin-top: 70px;">
            <input type="submit" value="Book" name="book_btn">
          </div>
        </form>
      </div>


    </main>

  </div>
  <script src="js/ajax-get-doctors-of-spec.js"> </script>


</body>

</html>