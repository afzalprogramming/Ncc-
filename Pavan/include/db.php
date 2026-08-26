<?php
$host = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "ncc_registration";

$conn = new mysqli($host, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>