<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Add Patient</title>
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
                            <li><a href="Add-Doctor.php">
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
                            <li><a href="#">
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
        <h3>Admin | Add Patient</h3>
      </div>

      <div class="content">

        <form action="#" method="post">
          <?php include('errors.php'); ?>
          <?php include('correct.php'); ?>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Patient Full Name</span>
              <input type="text" placeholder="Enter patient name" id="P_fullname" name="P_fullname" value="<?php echo $P_fullname; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Username</span>
              <input type="text" placeholder="Enter patient username" id="P_username" name="P_username" value="<?php echo $P_username; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Email</span>
              <input type="email" placeholder="Enter patient email" id="P_email" name="P_email" value="<?php echo $P_email; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Phone Number</span>
              <input type="number" placeholder="Enter patient number" id="P_phone" name="P_phone" value="<?php echo $P_phone; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient City</span>
              <input type="text" placeholder="Enter patient city" id="P_city" name="P_city" value="<?php echo $P_city; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Address</span>
              <input type="text" placeholder="Enter patient address" id="P_address" name="P_address" value="<?php echo $P_address; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Password</span>
              <input type="password" placeholder="Enter patient password" id="P_password" name="P_password" required>
            </div>

            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" placeholder="Confirm patient password" id="P_conf_password" name="P_conf_password" required>
            </div>

          </div>

          <div class="gender-details">
            <input type="radio" name="P_gender" id="dot-1" value="male" required>
            <input type="radio" name="P_gender" id="dot-2" value="female" required>
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
            <input type="submit" value="Add" name="P_add_btn">
          </div>

        </form>
      </div>


    </main>

  </div>

</body>

</html>