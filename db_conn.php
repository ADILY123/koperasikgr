<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "koperasi";
$conn = mysqli_connect($sname, $uname, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

?>
