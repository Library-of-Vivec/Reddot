<?php
$host = "localhost";
$username = "root";
$dbname = "reddot";
$conn = mysqli_connect($host, $username);
mysqli_select_db($conn, $dbname) or die (mysqli_error());
?>
