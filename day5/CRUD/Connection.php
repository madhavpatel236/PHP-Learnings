<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "Learning CRUD";


$isConnect = mysqli_connect($host, $username, $password, $database);

if ($isConnect) {
    echo " Database sucessfully connected";
}
else{
    echo "Database Not Connected";
}
?>