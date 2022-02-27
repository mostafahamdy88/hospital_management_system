<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: Doctor-login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: Doctor-login.php");
}
?>

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
                <h3>Doctor | Dashboard</h3><br>
            </div>
            <div class="cards">

                <div class="card-single">
                    <div>
                        <h4>My Profile</h4>
                        <a href="Doctor-Edit-Profile.php"><span>Update Profile</span></a>
                    </div>
                    <div>
                        <span class="las la-user-circle"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h4>My Appointments</h4>
                        <span>View Appointment History</span>
                    </div>
                    <div>
                        <span class="las la-clock"></span>
                    </div>
                </div>
            </div>


        </main>

    </div>

</body>

</html>