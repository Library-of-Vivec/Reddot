<?php
$host = "localhost";
$username = "root";
$dbname = "testron";
$conn = mysqli_connect($host, $username);
mysqli_select_db($conn, $dbname) or die (mysqli_error());
?>
