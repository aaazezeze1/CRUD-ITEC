<?php 
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'add') {
    $name = $_POST['patientName'];
    $address = $_POST['patientAddress'];

    // mysql query to add patients into database
    $sql = "INSERT INTO tbl_patient (name, address) VALUES ('$name', '$address')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}







if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'view') {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>View Patients</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Open Sans', sans-serif;
                padding: 20px;
                background-color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="mb-4">Patient List</h2>
            <?php
            $sql = "SELECT * FROM tbl_patient;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table table-bordered table-hover'>";
                echo "<thead class='table-dark'><tr><th>Patient ID</th><th>Name</th><th>Address</th></tr></thead><tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['patient_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<div class='alert alert-warning'>No patients found.</div>";
            }
            ?>
            <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
        </div>
    </body>
    </html>
    <?php
}





?>
