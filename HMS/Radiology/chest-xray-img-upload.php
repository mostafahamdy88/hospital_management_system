<?php

require_once('machine-learning.php');

if (isset($_POST['submit-img'])) {
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    $dst_fname =  getcwd() . '/chest-xray/' . time() . uniqid(rand()) . '.' . $extension;
    $dst_fname = str_replace('\\', '/', $dst_fname);
    move_uploaded_file($_FILES["img"]["tmp_name"],  $dst_fname);
    $result = classify_image($dst_fname);
} else {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>HMIS</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

        :root {
			--main-color: #1f8fc3;
			--color-dark: #1D2231;
			--text-grey: #8390A2;
            --blue: #1F8FC3;
            --black: #444;
            --light-color: #777;
            --box-shadow: .5rem .5rem 0 rgba(22, 139, 160, 0.2);
            --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
            --border: .2rem solid var(--blue);
        }

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            text-transform: capitalize;
            transition: all .2s ease-out;
            text-decoration: none;

        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-padding-top: 7rem;
            scroll-behavior: smooth;
        }

        section {
            padding: 2rem 9%;
            align-items: center;
        }
		section .content-table {
            padding: 2rem 9%;
            align-items: center;
			margin-left:280px;
        }
		section P {
            padding: 2rem 9%;
            align-items: center;
			margin-left:260px;
			margin-top:50px;
			font-size: 1.7rem;
        }

        section:nth-child(even) {
            background: #f5f5f5;
        }

        .heading {
            text-align: center;
            padding-bottom: 2rem;
            text-shadow: var(--text-shadow);
            text-transform: uppercase;
            color: var(--black);
            font-size: 4rem;
            letter-spacing: .2rem;
        }

        .heading span {
            text-transform: uppercase;
            color: var(--blue);
        }

        .header {
            padding: 2rem 9%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
        }

        .header .logo {
            font-size: 2.5rem;
            color: var(--black);
        }

        .header .logo i {
            color: var(--blue);
        }


        .home {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            padding-top: 10rem;
        }
		.content-table {
			margin-left: 200px;
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 1.7rem;
			min-width: 400px;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      }
	  .content-table tr th{
			background-color: var(--main-color);
			color: #ffffff;
			text-align: left;
			font-weight: bold;
      }
	  .content-table tr td{
			background-color: #d3e3ec;
			color: var(--main-color);
			text-align: left;
			font-weight: bold;
      }
	  .content-table th,
      .content-table td {
			padding: 12px 15px;
			text-align: center;
      }
      
      .content-table tbody tr {
			border-bottom: 1px solid #d3e3ec;
      }
	  .footer .credit{
			padding: 1rem;
			padding-top: 2rem;
			margin-top: 3rem;
			text-align: center;
			font-size: 1.4rem;
			color:var(--light-color);
			border-top: .1rem solid rgba(0, 0, 0, .1);
		}

		.footer .credit span{
			color:var(--blue);
		}

        @media (max-width:991px) {

            html {
                font-size: 55%;
            }

            .header {
                padding: 2rem;
            }

            section {
                padding: 2rem;
            }

        }

        @media (max-width:450px) {

            html {
                font-size: 50%;
            }


        }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> HMS </a>

    </header>
    <section class="home" id="home">

    </section>
    <section class="book" id="book">

        <h1 class="heading"> <span>Pneumonia</span> Detection <span>Using Chest X-ray</span> </h1>

        <table class="content-table">
            <tr>
                <th>Result</th>
                <td><?php echo $result['class_name'] ?></td>
            </tr>
            <tr>
                <th>Probability of Normal</th>
                <td><?php echo $result['prob_NORMAL'] ?></td>
            </tr>
            <tr>
                <th>Probability of Pneumonia</th>
                <td><?php echo $result['prob_PNEUMONIA'] ?></td>
            </tr>
        </table>
        <p>
            To return to previous page <a href="index.php">Click here</a>
        </p>
		
		</section>
	<!-- footer section starts  -->

    <section class="footer">
        <div class="credit"> created by <span>MasterMinds Team</span> | all rights reserved </div>
    </section>

    <!-- footer section ends -->
</body>

</html>