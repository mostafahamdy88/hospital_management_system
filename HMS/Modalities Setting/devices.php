<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="devices-style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">
        <a href="../first.html" class="logo"> <i class="fas fa-heartbeat"></i> HMS </a>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

    </section>

    <!-- home section ends -->


    <!-- booking section starts   -->

    <section class="book" id="book">

        <h1 class="heading"> <span>adding</span> device </h1>


        <form action="devices.php" method="POST">
            <div style="font-size: 18px;">
            <?php include('errors.php'); ?>
            <?php include('correct.php'); ?>
            </div>
            <div class="input-box">
                <span class="details">Device name</span>
                <input type="text" placeholder="Device name" class="box" id="name" name="name" value="<?php echo $name; ?>"required>
            </div>

            <div class="input-box">
                <span class="details">Device Model</span>
                <input type="text" placeholder="Device Model" class="box" id="model" name="model" value="<?php echo $model; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Department</span>
                <input type="text" placeholder="Department" class="box" id="department" name="department" value="<?php echo $department; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">IP Address</span>
                <input type="text" placeholder="IP Address" class="box" id="ip" name="ip" value="<?php echo $ip; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Port Number</span>
                <input type="number" placeholder="Port Number" class="box" id="port" name="port" value="<?php echo $port; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">AE Title</span>
                <input type="text" placeholder="AE Title" class="box" id="ae_title" name="ae_title" value="<?php echo $ae_title; ?>" required>
            </div>

            <div class="input-box">
                <span class="details">Date</span>
                <input type="date" class="box" id="date" name="date" required>
            </div>

            <input type="submit" value="Add Device" class="btn" name="add_btn" required>
        </form>

    </section>

    <!-- booking section ends -->


    <!-- footer section starts  -->

    <section class="footer">


        <div class="credit"> created by <span>MasterMinds Team</span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->


    <!-- custom js file link  -->


</body>

</html>