<?php  

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_pms";
$conn = "";

// connect to mysql server
try 
{
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    // echo "You are connected!<br>";
}
catch(mysqli_sql_exception) {
    echo "Could not connect!<br>";
}

?>