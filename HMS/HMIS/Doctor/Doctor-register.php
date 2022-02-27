<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Registration Form | HMS </title>
  <link rel="stylesheet" href="register-style.css">
</head>

<body>
  <div class="container">
    <div class="title">Doctor Registration</div>
    <div class="content">
      <form action="Doctor-register.php" method="post">
        <br>
        <?php include('errors.php'); ?>
        <?php include('correct.php'); ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" id="username" name="username" value="<?php echo $username; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" id="email" name="email" value="<?php echo $email; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter your number" id="phone" name="phone" value="<?php echo $phone; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Doctor Specialty</span>
            <select name="specialty" id="specialty">
              <option>Select Specialty</option>
              <option name="specialty" value="Anesthesiology">Anesthesiology</option>
              <option name="specialty" value="Allergy">Allergy</option>
              <option name="specialty" value="Cardiology">Cardiology</option>
              <option name="specialty" value="Dermatology">Dermatology</option>
              <option name="specialty" value="Family Physician">Family Doctor</option>
              <option name="specialty" value="Infectious disease">Infectious disease</option>
              <option name="specialty" value="Neurology">Neurology</option>
              <option name="specialty" value="Ophthalmology">Ophthalmology</option>
              <option name="specialty" value="Oncology">Oncology</option>
              <option name="specialty" value="Pediatrics">Pediatrics</option>
              <option name="specialty" value="Pulmonology">Pulmonology</option>
              <option name="specialty" value="Radiology">Radiology</option>
              <option name="specialty" value="Surgery">Surgery</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your address" id="address" name="address" value="<?php echo $address; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" id="password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" id="conf_password" name="conf_password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male" required>
          <input type="radio" name="gender" id="dot-2" value="female" required>
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
          </div>
        </div>
        <div>
          <label class="check"> I agree to the Terms and Conditions
            <input type="checkbox" checked="checked" required>
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="register_btn">
        </div>
        <div class="box-haveAccount">
          Already have an account?
          <a class="link visited hover active" href="Doctor-login.php" target="_blank">Log-in</a>
        </div>
      </form>
    </div>
  </div>

</body>

</html>