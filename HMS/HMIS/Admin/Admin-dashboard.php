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
    <title>Admin Dashboard</title>
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
                <h3>Admin | Dashboard</h3><br>
            </div>
            <div class="cards">

                <div class="card-single">
                    <div>
                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'hospital');
                        $query = "SELECT id FROM patients ORDER BY id";
                        $results = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($results);
                        echo '<h1>' . $row . '</h1>';
                        ?>
                        <span>Manage Users</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'hospital');
                        $query = "SELECT id FROM doctors ORDER BY id";
                        $results = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($results);
                        echo '<h1>' . $row . '</h1>';
                        ?>
                        <span>Manage Doctors</span>
                    </div>
                    <div>
                        <span class="las la-stethoscope"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'hospital');
                        $query = "SELECT id FROM appointments ORDER BY id";
                        $results = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($results);
                        echo '<h1>' . $row . '</h1>';
                        ?>
                        <span>Manage Appointments</span>
                    </div>
                    <div>
                        <span class="las la-clock"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>4</h1>
                        <span>Manage Patients</span>
                    </div>
                    <div>
                        <span class="las la-procedures"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <span>New Queries</span>
                    </div>
                    <div>
                        <span class="lab la-wpforms"></span>
                    </div>
                </div>

            </div>


        </main>

    </div>

</body>

</html>