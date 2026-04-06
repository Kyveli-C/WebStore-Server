<?php
$host = 'localhost';
$db_user = 'root';      // change if needed
$db_pass = '';          // change if needed
$db_name = 'auth_demo'; // use your actual database name

$conn = mysqli_connect("localhost", "kchristoforou",
            "sNwnZnVNH5", "kchristoforou");

if (! $conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
?>
