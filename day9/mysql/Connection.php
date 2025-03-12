<?php
$host = "localhost";
$username = "root";
$password = "Root@123456"; // Root@123456

// Creating connection
$isConnect = new mysqli($host, $username, $password);

// // Checking connection
if ($isConnect->connect_error) {
    die("Connection failed: " . $isConnect->connect_error);
}
echo "Connected successfully <br/>";

// // Create database
$sql = "CREATE DATABASE IF NOT EXISTS firstDB";
if ($isConnect->query($sql) === TRUE) {
    echo "database created sucessfully";
} else {
    echo "error in creating database." . $isConnect->error;
}
$isConnect->close();
