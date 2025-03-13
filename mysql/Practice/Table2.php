<?php

$host = "localhost";
$username = "root";
$password = "Madhav@123";
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
if ($isConnect->query($create_table) === TRUE) {
    echo "Table Created sucessfully <br/>";
} else {
    echo "Table was not created!" . $isConnect->error . "<br/>";
}


// insert a table data
// $insert_data = "INSERT INTO Grounds (TeamId, TeamHomeGround) VALUES ( 3 , 'Banglore' ) ";

// if ($isConnect->query($insert_data)) {
//     echo "data sucessfully entered in the table <br/>";
// } else {
//     echo "Data was not added in the Table." . $isConnect->error . "<br/>";
// }



// Insert multiple data
// $insert_multiple_data = " INSERT INTO Grounds (TeamId, TeamHomeGround) VALUES ( 1, 'Banglore');";
// $insert_multiple_data .= " INSERT INTO Grounds (TeamId, TeamHomeGround) VALUES ( 2, 'Channai');";
// $insert_multiple_data .= " INSERT INTO Grounds (TeamId, TeamHomeGround) VALUES ( 3, 'Mumbai')";
// if ($isConnect->multi_query($insert_multiple_data) === TRUE) {
//     echo " Inserted multiple data in the database. <br/> ";
// } else {
//     echo " Don't inserted multiple data in the table" . $isConnect->error . "<br/>";
// }

// add a FOREIGN KEY on ALTER TABLE:
// $addForKey = "ALTER TABLE Grounds 
//     ADD COLUMN team_id INT(10) UNSIGNED,
//     ADD FOREIGN KEY (team_id) REFERENCES Teams(id)";

// if ($isConnect->query($addForKey) === TRUE) {
//     echo "FOREIGN KEY add sucessfullt with the help of the ALTER TABLE. <br/>";
// } else {
//     echo " FOREIGN KEY was not added: " . $isConnect->error . "<br/>";
// }




// Select data (column/table)
// $selectData = " SELECT * FROM Grounds ";
$selectData = "SELECT TeamHomeGround FROM Grounds";
$res = $isConnect->query($selectData);
if ($res->num_rows > 0) { // num_rows => find the number of rows of the result.
    echo "data Selected " . "<br/>";
    while ($row = $res->fetch_assoc()) {  // fetch_assoc => fetches a single row from a result set and returns it as an associative array, where the keys are the column names from the database table.
        // The function returns each row as an associative array, meaning that each element in the array has a key-value pair, where the key is the column name (e.g., "id", "name") and the value is the data in that column for the current row
        echo "TeamHomeGround: " . $row["TeamHomeGround"] . "<br/>";
    }
} else {
    echo "Error for select the data: " . $isConnect->error . "<br/>";
}

// WHERE
$selectData2 = "SELECT name FROM Teams WHERE id = 1";
$res2 = $isConnect->query($selectData2);
if ($res2->num_rows >= 0) {
    echo "Select data based on the WHERE.";
    while ($row = $res2->fetch_assoc()) {
        echo "Team name: " . $row['name'];
    }
}

// ORDER BY
// $selectData3 = "SELECT name FROM Teams WHERE id >= 1 ORDER BY Player DESC ";
$selectData3 = "SELECT name FROM Teams WHERE id >= 1 ORDER BY Player ";
$res3 = $isConnect->query($selectData3);
if ($res3->num_rows >= 0) {
    echo "Select data based on the WHERE. <br/>";
    while ($row = $res3->fetch_assoc()) {
        echo "Team name: " . $row['name'] . "<br/>";
    }
}



// Delete the data

$delete = " DELETE FROM Teams WHERE name = 'CSK'";

if ($isConnect->query($delete) === TRUE) {
    echo " Data deleted sucessfully <br/>";
} else {
    echo " Data was not delete: " . $isConnect->error . "<br/>";
}


// Update the data
$update = " UPDATE Trophies SET Number = 1 WHERE Team = 'RCB' ";
if ($isConnect->query($update) === TRUE) {
    echo " Data updated sucessfully <br/> ";
} else {
    echo " Data was not be able to update: " . $isConnect->error . "<br/>";
}





// limit the data section
// Assuming $isConnect is your MySQLi connection
$limit = "SELECT * FROM Trophies LIMIT 2 OFFSET 3";
$resNew = $isConnect->query($limit);

if ($resNew !== FALSE) { 
    echo "Limit was put <br/>";

    if ($resNew->num_rows >= 0) {
        while ($row = $resNew->fetch_assoc()) {
            echo "Team: " . $row['Team'] . " | Player: " . $row['Number'] . "<br/>";
        }
    } else {
        echo "No records found.<br/>" . $isConnect -> error ;
    }
} else {
    echo "Limit was not able to be put: " . $isConnect->error . "<br/>";
}







$isConnect->close();
