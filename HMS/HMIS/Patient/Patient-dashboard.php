<?php
session_start();

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
    <title>User Dashboard</title>
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
                <li> <a href="#">
                        <i class="fas fa-home icon"></i><span style="margin-left: 15px;">Dashboard</span>
                    </a>
                </li>
                <li> <a href="Patient-Book-Appointment.php">
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
                <h3>User | Dashboard</h3><br>
            </div>
            <div class="cards">

                <div class="card-single">
                    <div>
                        <h4>My Profile</h4>
                        <a href="Patient-Edit-Profile.php"><span>Update Profile</span></a>
                    </div>
                    <div>
                        <span class="las la-user-circle"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h4>My Appointments</h4>
                        <a href="Patient-Appointment-History.php"><span>View Appointment History</span></a>
                    </div>
                    <div>
                        <span class="las la-clock"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h4>Book Appointment</h4>
                        <a href="Patient-Book-Appointment.php"><span>Book Appointment</span></a>
                    </div>
                    <div>
                        <span class="las la-calendar-check"></span>
                    </div>
                </div>
            </div>


        </main>

    </div>

</body>

</html>