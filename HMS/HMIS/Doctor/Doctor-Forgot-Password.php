
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="login-style.css">
</head>

<body>
    <div class="center">
        <h2>HMS | Doctor Password Recovery</h2>

        <form method="post">
            <div style="color: green; text-align: center;">
            <?php
			if (isset($_POST['reset_btn'])) {
				echo "Reset Message has been sent to your email, check it...";
			}
			?>
            </div>
            <div class="txt_field">
                <input type="email" required>
                <span></span>
                <label>Registered Email</label>

            </div>
            </br>
            </br>
            <input type="submit" value="Reset" name="reset_btn">

        </form>
		<div style="text-align: center;">
            <p style="font-size: 0.9rem;">
                <a href="Doctor-login.php">Login Page</a>
            </p>
        </div>

        <div class="copyright">
            &copy;<span> HMS. All rights reserved</span>
        </div>

    </div>
</body>

</html>