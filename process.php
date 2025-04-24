<?php 

include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'add') {
    // use variables for processing input form on index.php
    $name = $_POST['patientName'];
    $address = $_POST['patientAddress'];

    $sql = "INSERT INTO tbl_patient (name, address) VALUES ('$name', '$address')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}




?>