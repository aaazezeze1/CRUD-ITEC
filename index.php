<?php 
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- bootstrap cdn links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="home">
        <h1 id="title">Mental Health Patient Management System</h1>
        <form action="process.php" method="post">
            <h4>Patient Name (ex. Juan Dela Cruz)</h4>
            <div class="input-group">
                <div class="w-50 p-3">
                    <input type="text" name="patientName" placeholder="Patient Name" class="form-control">
                </div>
            </div>

            <h4>Patient Address (ex. San Pablo City)</h4>
            <div class="input-group">
                <div class="w-50 p-3">
                    <input type="text" name="patientAddress" placeholder="Patient Address" class="form-control">
                </div>
            </div>

            <!-- <button type="submit" name="action" value="view" class="btn btn-primary">View Patients</button> -->
            <button type="submit" name="action" value="add" class="btn btn-primary">Add Patient</button>
            <!-- <button type="submit" name="action" value="update" class="btn btn-primary">Update Patient</button>
            <button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button> -->
        </form>
    </div>
    <style>
        body {
            font-family: "Open Sans", sans-serif;
        }
        #title {
            margin-bottom: 3%;
            font-weight: bolder;
        }
        .home {
            margin-top: 5%;
            text-align: center;
        }
        .home h4{
            text-align: left;
            margin-left: 25%;
        }
        .form-control {
            margin-left: 50%;
        }
    </style>
</body>
</html>