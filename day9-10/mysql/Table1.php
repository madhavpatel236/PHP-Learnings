<?php

$host = "localhost";
$username = "root";
$password = "Madhav@123";  
$dbname = "firstDB";


// Creating connection
$isConnect = new mysqli($host, $username, $password, $dbname);

// Checking connection
if ($isConnect->connect_error) {
    die("Connection failed: " . $isConnect->connect_error);
}
echo "Connected successfully <br/>";


// create the table:
$sql = "CREATE TABLE IF NOT EXISTS Teams (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    Player VARCHAR(30) NOT NULL
)";

if ($isConnect->query($sql) === TRUE) {
    echo "Table created sucessfully <br/>";
} else {
    echo "Error in creating table: " . $isConnect->error . "<br/>";
}

// Insert the data into the database:
$insertData = " INSERT INTO Teams (id, name, player ) VALUES (3, 'MI', 'Rohit Sharma')";
if ($isConnect->query($insertData) === TRUE) {
    $last_id = $isConnect->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id . "<br/>" ;
} else {
    echo "Data not entered in the Table" . $isConnect->error . "<br/>";
}




// // Add FOREIGN KEY
// $addForKey = " ALTER TABLE Teams
// ADD FOREIGN KEY (TeamId) REFERENCES Grounds(TeamId);
// ";
// if ($isConnect->query($addForKey) === TRUE) {
//     echo "FOREIGN KEY added successfully <br/>";
// } else {
//     echo "FOREIGN KEY was not added " . $isConnect->error . "<br/>" ;
// }



$isConnect->close();












$isConnect->close();
