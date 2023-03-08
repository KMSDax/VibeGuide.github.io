<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = 'mysql';
$mysql_db = 'vibeguide';


$conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>