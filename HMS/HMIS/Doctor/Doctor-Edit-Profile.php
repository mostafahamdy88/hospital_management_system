<?php include('server.php') ?>
<?php
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
                <h3 style="margin: 0%;">Doctor | Update Profile</h3>
            </div>
            <div class="content">
                <form action="Doctor-Edit-Profile.php" method="post">
                    <?php include('errors.php'); ?>
                    <?php include('correct.php'); ?>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Doctor Username</span>
                            <input type="text" readonly placeholder="Enter your current username" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Doctor Full Name</span>
                            <input type="text" placeholder="Enter your new name" id="fullname" name="fullname" value="<?php echo $U_fullname; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Doctor Email</span>
                            <input type="email" placeholder="Enter your new email" id="email" name="email" value="<?php echo $U_email; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Doctor Phone Number</span>
                            <input type="number" placeholder="Enter your new number" id="phone" name="phone" value="<?php echo $U_phone; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Doctor specialty</span>
                            <select name="specialty" id="specialty" style="height: 45px; width: 100%; outline: none; font-size: 13px; border-radius: 
			5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px; transition: all 0.3s ease; background: rgb(255, 255, 255);">
                                <option name="specialty" value="Anesthesiology">Anesthesiology</option>
                                <option name="specialty" value="Allergy">Allergy</option>
                                <option name="specialty" value="Cardiology">Cardiology</option>
                                <option name="specialty" value="Dermatology">Dermatology</option>
                                <option name="specialty" value="Family Physician">Family Doctor</option>
                                <option name="specialty" value="Infectious disease">Infectious disease</option>
                                <option name="specialty" value="Nephrology">Nephrology</option>
                                <option name="specialty" value="Neurology">Neurology</option>
                                <option name="specialty" value="Otolaryngology">Otolaryngology</option>
                                <option name="specialty" value="Ophthalmology">Ophthalmology</option>
                                <option name="specialty" value="Obstetrics/gynecology">Obstetrics/gynecology</option>
                                <option name="specialty" value="Oncology">Oncology</option>
                                <option name="specialty" value="Pediatrics">Pediatrics</option>
                                <option name="specialty" value="Pulmonology">Pulmonology</option>
                                <option name="specialty" value="Radiology">Radiology</option>
                                <option name="specialty" value="Rheumatology">Rheumatology</option>
                                <option name="specialty" value="Surgery">Surgery</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Doctor Address</span>
                            <input type="text" placeholder="Enter your new address" id="address" name="address" value="<?php echo $U_address; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Enter your new password" id="password" name="password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" placeholder="Confirm your new password" id="conf_password" name="conf_password" required>
                        </div>
                    </div>
                    <div class="button" style="margin-top: 30px;">
                        <input type="submit" value="Update" name="update_btn">
                    </div>
                </form>
            </div>


        </main>

    </div>

</body>

</html>