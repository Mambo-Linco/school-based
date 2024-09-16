<?php
// database configuration
$dbHost ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbName ="mambolinco";

//create database connection
$db = mysqli_Connect($dbHost, $dbUsername,"", $dbName);
// check connection
if($db->connect_error) {
    die("connection failed:" . $db->connect_error);
}
echo "connected successfully"
?>