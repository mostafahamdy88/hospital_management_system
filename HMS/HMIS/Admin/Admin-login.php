<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="login-style.css">
</head>

<body>
    <div class="center">
        <h1>HMS | Admin Login</h1>

        <form action="Admin-login.php" method="post">
            <?php include('errors.php'); ?>
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <input type="submit" value="login" name="login_btn">
        </form>
        <div style="text-align: center;">
            <p style="font-size: 0.9rem;">
                To Back to Previous Page <a href="../Login_As.html">Click here</a>
            </p>
        </div>
        <div class="copyright">
            &copy;<span> HMS. All rights reserved</span>
        </div>

    </div>
</body>

</html>