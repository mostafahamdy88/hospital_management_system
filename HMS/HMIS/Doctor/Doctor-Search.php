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
                <h3>Doctor | Appointments History</h3><br>
            </div>
            <div>
                <h4 style="text-align: center;">Fliter by Username</h4>
            </div>
            <form action="Doctor-Search.php" method="post">
                <div class="search_wrap search_wrap_3">
                    <div class="search_box" style="align-content: center;">
                        <input type="text" class="input" placeholder="search..." name="valueToSearch">
                        <div>
                            <input class="btn" type="submit" name="search" value="Filter" style="height:50px; width:90px; color:white; font-size:18px;">
                        </div>
                    </div>
                </div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Patient Username</th>
                            <th>Patient Phone</th>
                            <th>Patient Email</th>
                            <th>Patient Address</th>
                            <th>Patient Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($filter_Result)) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
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