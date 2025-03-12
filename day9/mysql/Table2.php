<?php

$host = "localhost";
$username = "root";
$password = "Root@123456";
$dbname = "firstDB";

$isConnect = new mysqli($host, $username, $password, $dbname);

if ($isConnect->connect_error) {
    echo "Connection failed <br/>";
} else {
    echo "Connection Sucessfull <br/>";
}

// Create a table
$create_table = "CREATE TABLE IF NOT EXISTS Grounds ( 
    TeamId INT(20) NOT NULL   ,
    TeamHomeGround VARCHAR(20) NOT NULL,
    PRIMARY KEY (TeamId)
)";
if ($isConnect->query($create_table)) {
    echo "Table Created sucessfully <br/>";
} else {
    echo "Table was not created!" . $isConnect->error . "<br/>";
}


// insert a table data
$insert_data = "INSERT INTO Grounds (TeamId, TeamHomeGround) VALUES ( 2 , 'Banglore' ) ";

if ($isConnect->query($insert_data)) {
    echo "data sucessfully entered in the table <br/>";
} else {
    echo "Data was not added in the Table." . $isConnect->error . "<br/>";
}


// add a FOREIGN KEY on ALTER TABLE:
$addForKey = "ALTER TABLE Grounds 
    ADD COLUMN team_id INT(10) UNSIGNED,
    ADD FOREIGN KEY (team_id) REFERENCES Teams(id)";

if ($isConnect->query($addForKey)) {
    echo "FOREIGN KEY add sucessfullt with the help of the ALTER TABLE. <br/>";
} else {
    echo " FOREIGN KEY was not added: " . $isConnect->error . "<br/>";
}
