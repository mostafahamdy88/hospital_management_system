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
    <title>Appointments</title>
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
                            <li><a href="Add-Patient.php">
                                    <i class="fas fa-plus-circle icon"></i><span style="margin-left: 10px;">Add
                                        Patient</span></a></li>
                            <li><a href="Manage-Patients.php">
                                    <i class="fas fa-edit icon"></i><span style="margin-left: 10px;">Manage
                                        Patients</span></a></li>
                        </ul>
                    </a>
                </li>
                <li> <a href="#">
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
                <h3>Admin | Appointments History</h3><br>
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Specialty</th>
                        <th>Consultancy Fee</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['username'])) :
                        $doctor_username = $_SESSION['username'];
                    endif;
                    $conn = new mysqli('localhost', 'root', '', 'hospital');
                    $sql = "SELECT * FROM appointments";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['patient']; ?></td>
                                <td><?php echo $row['doctor']; ?></td>
                                <td><?php echo $row['specialty']; ?></td>
                                <td><?php echo $row['consultancy']; ?></td>
                                <td><?php echo $row['A_date']; ?></td>
                                <td><?php echo $row['A_time']; ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="cancel_id" value="<?php echo $row['id']; ?>" style="display: none;">
                                        <button class="cancel_btn" type="submit" name="cancel_btn" style="background-color:red; color:white; width:80px; height:30px; border-radius: 7px;" onclick="alert('Successfully Appointment has been cancelled..')"> Delete</button>
                                    </form>
                                </td>

                            </tr>
                    <?php
                        }
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                </tbody>
            </table>


        </main>

    </div>

</body>

</html>