<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Search Doctors</title>
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
                <li> <a href="Appointment-History.php">
                        <i class="fas fa-history"></i><span style="margin-left: 15px;">Appointments History</span>
                    </a>
                </li>
                <li> <a href="#">
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
                <h3>Admin | Search Doctors</h3><br>
            </div>
            <div>
                <h4 style="text-align: center;">Fliter by Username</h4>
            </div>
            <form action="Doctors-Search.php" method="post">
                <div class="search_wrap search_wrap_3">
                    <div class="search_box" style="align-content: center;">
                        <input type="text" class="input" placeholder="search..." name="valueToSearch">
                        <div>
                            <input class="btn" type="submit" name="D_search" value="Filter" style="height:50px; width:90px; color:white; font-size:18px;">
                        </div>
                    </div>
                </div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Doctor Name</th>
                            <th>Doctor Username</th>
                            <th>Doctor Phone</th>
                            <th>Doctor Email</th>
                            <th>Doctor Specialty</th>
                            <th>Doctor Address</th>
                            <th>Doctor Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($SD_filter_Result)) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['specialty']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </form>

        </main>

    </div>

</body>

</html>