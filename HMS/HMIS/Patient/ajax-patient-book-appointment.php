<?php

if (isset($_GET['spec'])){
    $spec=$_GET['spec'];

    $conn = new mysqli('localhost','root','','hospital');

    $qurey = "SELECT username FROM doctors WHERE specialty = '$spec'";

    $result = mysqli_query($conn,$qurey);

    $result_array = [];

    while ($row = $result->fetch_array()){
        $result_array[] = $row['username'];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result_array);
}

?>