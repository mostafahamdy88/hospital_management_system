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
    <title>Patient Edit Profile</title>
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
                <h3>Patient | Edit Profile</h3>
            </div>
            <div class="content">
                <form action="Patient-Edit-Profile.php" method="post">
                    <?php include('errors.php'); ?>
                    <?php include('correct.php'); ?>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" readonly placeholder="Enter your current username" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" placeholder="Enter your new name" id="fullname" name="fullname" value="<?php echo $U_fullname; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" placeholder="Enter your new email" id="email" name="email" value="<?php echo $U_email; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="number" placeholder="Enter your new number" id="phone" name="phone" value="<?php echo $U_phone; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">City</span>
                            <input type="text" placeholder="Enter your city" id="city" name="city" value="<?php echo $U_city; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Address</span>
                            <input type="text" placeholder="Enter your address" id="address" name="address" value="<?php echo $U_address; ?>" required>
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
                    <div class="button" style="margin-top: 70px;">
                        <input type="submit" value="Update" name="update_btn">
                    </div>
                </form>
            </div>


        </main>

    </div>

</body>

</html>