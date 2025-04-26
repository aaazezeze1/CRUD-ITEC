<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['patientName'] ?? '';
    $address = $_POST['patientAddress'] ?? '';

    // validate
    if (!empty($name) && !empty($address)) {
        $sql = "INSERT INTO tbl_patient (name, address) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $address);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Patient added successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding patient: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        // warning if no input in input fields
        echo "<div class='alert alert-warning'>Both fields are required.</div>";
    }
}
?>

<!-- HTML form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
    <h1 class="mb-4">Mental Health Case Patient Management System</h1>
        <h2 class="mb-4">Add New Patient</h2>
        <form action="addpatient.php" method="POST">
            <div class="mb-3 w-50 mx-auto text-start">
                <label for="name" class="form-label">Patient Name</label>
                <input type="text" class="form-control" name="patientName" placeholder="e.g. Juan Dela Cruz" required>
            </div>
            <div class="mb-3 w-50 mx-auto text-start">
                <label for="address" class="form-label">Patient Address</label  >
                <input type="text" class="form-control" name="patientAddress" placeholder="e.g. San Pablo City" required>
            </div>
            <!-- view patient and back button -->
            <button type="submit" class="btn btn-success">Add Patient</button>
            <a href="viewpatient.php" class="btn btn-primary">View Patients</a>
            <a href="index.php" class="btn btn-secondary" style="background: #d92121;">Back to Home</a>
        </form>
    </div>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            text-align: center;
        }
        h1 {
            margin-top: 0%;
            font-weight: bold;  
            font-size: 30px;
            background-color: #cccccc;
            padding: 4%;
        }
    </style>
</body>
</html>