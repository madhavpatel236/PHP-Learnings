<?php

$host = "localhost";
$username = "root";
$password = "Madhav@123";
$dbname = 'firstDB';

$isConnect = new mysqli($host, $username, $password, $dbname);

if ($isConnect) {
    echo "Connection sucessfully established <br/>";
} else {
    echo "Connection was not established <br/>";
}



// Create table 
$table = "CREATE TABLE IF NOT EXISTS Trophies (
    Team VARCHAR(20) NOT NULL PRIMARY KEY,
    Number INT(10) NOT NULL
) ";


if ($isConnect->query($table) === TRUE) {
    echo "Table created sucessfully <br/>";
} else {
    echo " Table was not created " . $isConnect->error . "<br/> ";
}


// prepare 
$prep = $isConnect->prepare("INSERT INTO Trophies (Team, Number) VALUES (?, ?)");
$prep->bind_param("si", $Team, $Number);  // si = srting, integer-> tell the datatype.

// set parameters and execute
$Team = "RCB";
$Number = 0;
$prep->execute();

echo "New records created sucessfully";

$prep->close();
$isConnect->close();
