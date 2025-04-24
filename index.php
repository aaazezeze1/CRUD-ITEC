<?php 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHPMS</title>
    <link rel="stylesheet" href="style.css">
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
        <h3 id="subtitle">Select an Option</h3>
        <div class="options">
            <form action="viewpatient.php" method="post">
                <button type="submit" name="action" value="view" class="btn btn-primary btn-lg">View Patients</button>
            </form>
            <form action="addpatient.php" method="post">
                <button type="submit" name="action" value="add" class="btn btn-primary btn-lg">Add a Patient</button>
            </form>
        </div>
    </div>
</body>
</html>