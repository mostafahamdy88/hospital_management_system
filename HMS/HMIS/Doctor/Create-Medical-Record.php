<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Doctor Dashboard</title>
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
        <li> <a href="Doctor-dashboard.php">
            <i class="fas fa-home icon"></i><span style="margin-left: 10px;">Dashboard</span>
          </a>
        </li>
        <li> <a href="#">
            <i class="fas fa-user-injured icon"></i><span style="margin-left: 10px;">Patients</span>
            <i class="fas fa-caret-right icon" style="float: right;"></i>
            <ul>
              <li><a href="Doctor-Add-Patient.php">
                  <i class="fas fa-plus-circle icon"></i><span style="margin-left: 10px;">Add
                    Patient</span></a></li>
              <li><a href="Doctor-Manage-Patient.php">
                  <i class="fas fa-chart-pie icon"></i><span style="margin-left: 10px;">Manage
                    Patient</span></a></li>
            </ul>
          </a>
        </li>
        <li> <a href="#">
            <i class="fas fa-book-medical icon"></i><span style="margin-left: 10px;">Medical Record</span>
            <i class="fas fa-caret-right icon" style="float: right;"></i>
            <ul>
              <li><a href="Create-Medical-Record.php">
                  <i class="fas fa-plus-circle icon"></i><span style="margin-left: 10px;">Create
                    MR</span></a></li>
              <li><a href="Update-Medical-Record.php">
                  <i class="fas fa-edit icon"></i><span style="margin-left: 10px;">Update
                    MR</span></a></li>
            </ul>
          </a>
        </li>
        <li><a href="Doctor-Appointment-History.php">
            <i class="fas fa-history icon"></i><span style="margin-left: 10px;">Appointment History</span>
          </a>
        </li>
        <li><a href="Doctor-Search.php">
            <i class="fas fa-search icon"></i><span style="margin-left: 10px;">Search</span>
          </a>
        </li>
        <?php if (isset($_SESSION['username'])) : ?>
          <li><a href="Doctor-login.php?logout='1'">
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
          <h4>Doctor</h4>
          <?php if (isset($_SESSION['username'])) : ?>
            <small><?php echo $_SESSION['username']; ?></small>
          <?php endif ?>
        </div>
      </div>
    </header>

    <main>

      <div class="mainTitle">
        <h3>Doctor | Create New Medical Record</h3><br>
      </div>

      <div class="content">
        <form action="Create-Medical-Record.php" method="post">
          <?php include('errors.php'); ?>
          <?php include('correct.php'); ?>
          <div class="user-details">

            <div class="input-box">
              <span class="details">Doctor Name</span>
              <input type="text" placeholder="Enter your Name" id="doctor" name="doctor" value="<?php echo $doctor; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Name</span>
              <input type="text" placeholder="Enter patient Name" id="patient" name="patient" value="<?php echo $patient; ?>" required>
            </div>


            <div class="input-box">
              <span class="details">Patient Weight</span>
              <input type="number" placeholder="Enter patient Weight" id="weight" name="weight" value="<?php echo $weight; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Height</span>
              <input type="number" placeholder="Enter patient Height" id="height" name="height" value="<?php echo $height; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Age</span>
              <input type="number" placeholder="Enter patient Age" id="age" name="age" value="<?php echo $age; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Blood Pressure</span>
              <input type="text" placeholder="Enter patient Blood Pressure" id="BPressure" name="BPressure" value="<?php echo $BPressure; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Blood Sugar Level</span>
              <input type="text" placeholder="Enter patient Blood Sugar Level" id="BSugar" name="BSugar" value="<?php echo $BSugar; ?>" required>
            </div>

            <div class="input-box">
              <span class="details">Patient Heart Rate</span>
              <input type="text" placeholder="Enter patient Heart Rate" id="heart" name="heart" value="<?php echo $heart; ?>" required>
            </div>
            <div class="input-box">
              <span class="details">Patient Blood Type</span>
              <select name="BType" id="BType">
                <option name="BType" value="A+">A+</option>
                <option name="BType" value="A-">A-</option>
                <option name="BType" value="B+">B+</option>
                <option name="BType" value="B-">B-</option>
                <option name="BType" value="O+">O+</option>
                <option name="BType" value="O-">O-</option>
                <option name="BType" value="AB+">AB+</option>
                <option name="BType" value="AB-">AB-</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Patient Has Chronic diseases?</span>
              <select name="chronic" id="chronic">
                <option name="chronic" value="yes">Yes</option>
                <option name="chronic" value="no">No</option>
              </select>
            </div>


          </div>
          <div class="button">
            <input type="submit" value="Create" name="mr_create_btn">
          </div>

        </form>
      </div>


    </main>

  </div>

</body>

</html>