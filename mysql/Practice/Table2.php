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
// $insert_data = "INSERT INTO Grounds (TeamId, TeamHomeGround) VALUES ( 5 , 'Rajasthan ' ) ";

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
// $limit = "SELECT * FROM Trophies LIMIT 2 OFFSET 3";
// $resNew = $isConnect->query($limit);

// if ($resNew !== FALSE) {
//     echo "Limit was put <br/>";

//     if ($resNew->num_rows >= 0) {
//         while ($row = $resNew->fetch_assoc()) {
//             echo "Team: " . $row['Team'] . " | Player: " . $row['Number'] . "<br/>";
//         }
//     } else {
//         echo "No records found.<br/>" . $isConnect->error;
//     }
// } else {
//     echo "Limit was not able to be put: " . $isConnect->error . "<br/>";
// }




// Like
// $like = "SELECT * FROM Grounds WHERE TeamHomeGround LIKE 'G%' "; // start the text with the G and then...
// $like = "SELECT * FROM Grounds WHERE TeamHomeGround LIKE '%i' "; // end of the char is need to be 'a'.
// $like = "SELECT * FROM Grounds WHERE TeamHomeGround LIKE '%an%' "; // tech which has 'an' together in any position in the selected data.
// $like = "SELECT * FROM Grounds WHERE TeamHomeGround LIKE '_u%' "; // match the word in which 'u' is in the second position.
// $like = " SELECT * FROM Grounds WHERE TeamHomeGround LIKE 'G_%'"; // match the word which is start with the G and have atleast 2 char in that word.
// $like = " SELECT * FROM Grounds WHERE TeamHomeGround LIKE '__a%' "; // match the word in which 'a' is in the 3rd poition.
// $like = "SELECT * FROM Grounds WHERE TeamHomeGround LIKE 'M__%' "; // match the word in which word should be start with the "M" and there have min 3 char in that word.
// $like = " SELECT * FROM Grounds WHERE TeamHomeGround LIKE 'G%t' "; // match the word which is start with the 'G' and end with the 't'.
// $like = "SELECT * FROM Grounds WHERE TeamHomeGround LIKE '_ujrat' "; // match the word which is start with the any char but from the follwing char is 'ujrat' there are no other char allowed at the end out of this.
$like = " SELECT * FROM Grounds WHERE TeamHomeGround LIKE 'G_j__t' ";

$find_pattern = $isConnect->query($like);
if ($find_pattern->num_rows > 0) {
    echo " find the Grounds based on the LIKE condition,  ";
    while ($row = $find_pattern->fetch_assoc()) {
        echo "Matched text is: " . $row['TeamHomeGround'] . ", ";
    }
} else {
    echo "We cannot find the ground based on the like condition: " . $isConnect->error . "<br/>";
}




// IN
$in = " SELECT * FROM Teams WHERE name IN ('RCB', 'MI') ";
$findIn = $isConnect->query($in);

if ($findIn->num_rows > 0) {
    echo "<br/> There are some players which satisfy the IN condition: <br/> ";
    while ($row = $findIn->fetch_assoc()) {
        echo "Player: " . $row['Player'] . " ID: " . $row['id'] .  "<br/> ";
    }
} else {
    echo "We cannot find the data based on the IN condition: " . $isConnect->error . "<br/>" ;
}


// BETWEEN:
// $between = "SELECT id FROM Teams WHERE id BETWEEN 1 AND 3";
// $findval = $isConnect->query($between);

// if($findval->num_rows > 0){
//     echo "We find the data based on the BETWEEN condition: " ;
//     while($row = $findval->fetch_assoc()){
//         echo "data: " . $row['Player'] . "-" . $row['name']  ;
//     }
// } else{
//     echo " We are not be able to find the data based on the BETWEEN condition: " . $isConnect->error ;
// } 













$isConnect->close();
