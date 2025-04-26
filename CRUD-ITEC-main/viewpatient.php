<?php
include("database.php");

// update database when table entry is edited
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_patient"])) {
    $id = $_POST["patient_id"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $stmt = $conn->prepare("UPDATE tbl_patient SET name = ?, address = ? WHERE patient_id = ?");
    $stmt->bind_param("ssi", $name, $address, $id);
    $stmt->execute();
}

// update database when table entry is deleted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_patient"])) {
    $id = $_POST["patient_id"];
    $stmt = $conn->prepare("DELETE FROM tbl_patient WHERE patient_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MHPMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Mental Health Case Patient Management System</h2>

        <!-- show all items in the table -->
        <?php
        $result = $conn->query("SELECT * FROM tbl_patient");

        // if the number of entrys is greater than 0 then show the table
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered table-hover align-middle text-center">';
            echo '<thead class="table-dark"><tr><th>ID</th><th>Name</th><th>Address</th><th>Actions</th></tr></thead><tbody>';
            
            // add patients button and back to home button
            echo '<div class="d-flex justify-content-center gap-2 mb-4">';
            echo '<a href="addpatient.php" class="btn btn-primary">Add a Patient</a>';
            echo '<a href="index.php" class="btn btn-secondary" style="background: #d92121;">Back to Home</a>';
            echo '</div>';

            while ($row = $result->fetch_assoc()) {
                $id = $row["patient_id"];
                $name = htmlspecialchars($row["name"]);
                $address = htmlspecialchars($row["address"]);

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$address</td>";
                // edit and delete buttons that when click show a modal or pop up to delete
                echo "<td>
                        <button class='btn btn-warning btn-sm me-2' data-bs-toggle='modal' data-bs-target='#editModal$id' style='background: rgb(32, 95, 230); outline: color: white;'>Edit</button>
                        <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal$id'>Delete</button>
                      </td>";
                echo "</tr>";

                // edit pop up/modal
                echo "
                <div class='modal fade' id='editModal$id' tabindex='-1'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <form method='POST'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Edit Patient</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                </div>
                                <div class='modal-body'>
                                    <input type='hidden' name='patient_id' value='$id'>
                                    <div class='mb-3'>
                                        <label>Name</label>
                                        <input type='text' name='name' class='form-control' value='$name' required>
                                    </div>
                                    <div class='mb-3'>
                                        <label>Address</label>
                                        <input type='text' name='address' class='form-control' value='$address' required>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' name='edit_patient' class='btn btn-success'>Save Changes</button>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";

                // delete pop up/modal
                echo "
                <div class='modal fade' id='deleteModal$id' tabindex='-1'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <form method='POST'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Confirm Deletion</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                </div>
                                <div class='modal-body'>
                                    Are you sure you want to delete <strong>$name</strong>?
                                    <input type='hidden' name='patient_id' value='$id'>
                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' name='delete_patient' class='btn btn-danger'>Delete</button>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";
            }
            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-warning text-center">No patients found.</div>';
            echo '<div class="text-center mt-3">';
            echo '<a href="index.php" class="btn btn-secondary">Back to Home</a>';
            echo '</div>';
        }
        ?>
    </div>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            text-align: center;
        }
        h2 {
            margin-top: 0%;
            font-weight: bold;  
            font-size: 60px;
            background-color: #cccccc;
            padding: 4%;
        }
    
    </style>
</body>
</html>