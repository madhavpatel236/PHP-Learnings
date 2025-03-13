<?php

$host = "localhost";
$username = "root";
$password = "Madhav@123";

$isConnect = new mysqli($host, $username, $password);

// create DB
$createDB = "CREATE DATABASE IF NOT EXISTS Form_Record";
$dbConnection = $isConnect->query($createDB);
if ($dbConnection !== TRUE) {
    echo "Database not create, there are some problems: " . $isConnect->error . "<br/>";
} else {
    echo " <script> console.log( 'database sucessfully created '); </script> ";
}



$isConnect->close();
?>