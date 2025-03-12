<?php

$host = "localhost";
$username = "root";
$password = "Madhav@123";
$dbname = "Form_Record";

$isConnect = new mysqli($host, $username, $password, $dbname);
if ($isConnect->connect_error) {
    die("Connection failed: " . $isConnect->connect_error);
} else {
    echo "<script> console.log('Connection Sucessfull ')</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // get the data from the database
    $data = "SELECT * FROM  form_data    ORDER BY id DESC LIMIT 1 ";
    $res = $isConnect->query($data);

    if ($res === FALSE) {
        echo "don't get a data" . $isConnect->error;
    } else {
        echo "get the data <br/>";
        if ($res->num_rows >= 0) {
            while ($row = $res->fetch_assoc()) {
                echo "FirstName: " . $row["firstname"] . " Last Name: " . $row["lastname"] . " Email ID: " . $row["email"] . "<br/>";
            }
        } else {
            echo "hello";
        }
    }



    // echo "Form Submitted Successfully!" . "<br />";
    // echo "First Name: " . ($firstName) . "<br>";
    // echo "Last Name: " . ($lastName) . "<br>";
    // echo "Email: " . ($email) . "<br>";
}
