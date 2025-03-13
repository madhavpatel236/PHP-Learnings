<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname_error = $lname_error = $email_error = "";

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // ---------- Validation ------------

    if (isset($_POST['submit_btn'])) {
        if (empty($firstname)) {
            $fname_error = "Please enter your first name.";
        } elseif (strlen($firstname) <= 3) {
            $fname_error = " PLease enter minimum 3 char in the firstname. ";
        } else {
            $fname_error = "";
            test_data($firstname);
        }

        if (empty($lastname)) {
            $lname_error = " Please enter your last name. ";
        } elseif (strlen($lastname) <= 3) {
            $lname_error = " Please enter minimum 3 char in lastname ";
        } else {
            $lname_error = "";
            test_data($lastname);
        }

        if (empty($email)) {
            $email_error = " Please enter your email address.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = " Please enter valid email address";
        } else {
            $email_error = "";
            test_data($email);
        }
    }


    // -------------------- Database ------------------------

    $host = "localhost";
    $username = "root";
    $password = "Madhav@123";
    $myDB = "CRUD";
    $dbSelected_fname = "";
    $dbSelected_lname = "";
    $dbSelected_email = "";
    $flag = false;
    $isEditing = false;
    $editId = null;

    $connection = new mysqli($host, $username, $password);
    $isConnect = new mysqli($host, $username, $password, $myDB);

    // create DB
    $db = "CREATE DATABASE IF NOT EXISTS CRUD";
    if ($connection->query(($db)) === TRUE) {
        echo "<script> console.log('Database created sucessfully! ');  </script>";
    } else {
        echo "<script> console.log('*ERROR: Database was not been created'); </script>";
    }


    // Create a table
    $table = "CREATE TABLE IF NOT EXISTS Data (
    Id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    Email VARCHAR(30) NOT NULL UNIQUE
    )";
    if ($isConnect->query($table) === TRUE) {
        echo " <script> console.log('Table created sucessfully'); </script> ";
    } else {
        echo " <script> console.log('*ERROR: Table was not created'); </script> ";
    }

    // Insert data into the db
    if (isset($_POST['submit_btn'])) {
        $info = "INSERT INTO Data (FirstName, LastName, Email) VALUES ( '$firstname', '$lastname', '$email' )";
        if ($isConnect->query($info) !== TRUE) {
            echo " <script> console.log('*ERROR: Data Not inserted into the db') </script> ";
        } else {
            echo " <script> console.log('Data sucessfully inserted into the db') </script> ";
        }

        // SELECT data
        $selectData = " SELECT * FROM Data ORDER BY Id DESC LIMIT 1 ";
        $val = $isConnect->query($selectData);
        if ($val->num_rows > 0) {
            echo "<script> console.log('Data selected sucessfully!') </script>";
            while ($row = $val->fetch_assoc()) {
                // echo "First Name: " . $row['FirstName'] . "<br/>" . "Last Name: " . $row['LastName'] . "<br/>" . "Email: " . $row['Email'] . "<br/>";
                $dbSelected_fname = $row['FirstName'];
                $dbSelected_lname = $row['LastName'];
                $dbSelected_email =  $row['Email'];
                $flag = true;
            }
        } else {
            echo "<script> console.log('*ERROR: Data was not selected ')</script>";
        }
    }


    // DELETE
    if (isset($_POST['delete_btn'])) {
        // // SELECT data from the database for the delete operation.
        $selectData = " SELECT * FROM Data ORDER BY Id DESC LIMIT 1 ";
        $val = $isConnect->query($selectData);
        if ($val->num_rows > 0) {
            echo "<script> console.log('Data selected sucessfully!') </script>";
            while ($row = $val->fetch_assoc()) {
                $dbSelected_fname = $row['FirstName'];
                $dbSelected_lname = $row['LastName'];
                $dbSelected_email =  $row['Email'];
            }
        } else {
            echo "<script> console.log('*ERROR: Data was not selected ')</script>";
        }

        // delete operation
        $email_to_delete = $dbSelected_email;
        $check_email = "SELECT * FROM Data WHERE Email = '$email_to_delete'";
        $result = $isConnect->query($check_email);

        if ($result->num_rows > 0) {
            $deleteVal = "DELETE FROM Data WHERE Email = '$email_to_delete'";
            if ($isConnect->query($deleteVal) === TRUE) {
                echo "<script> console.log('Record deleted successfully') </script>";
                $dbSelected_fname = "";
                $dbSelected_lname = "";
                $dbSelected_email = "";
            }
        } else {
            echo "<script> console.log('No record found to delete') </script>";
        }
    }

    // EDIT

}


function test_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD opration in Form</title>
</head>

<body>
    <form method="post">
        <lable for="firstname"> First Name: </lable>
        <input id="firstname" name="firstname" type="text" />
        <span class="error"> <?php echo $fname_error; ?></span><br /><br />

        <lable for="lastname"> Last Name: </lable>
        <input id="lastname" name="lastname" type="text" />
        <span class="error"> <?php echo $lname_error; ?> </span> <br /> <br />

        <label for="email"> Email: </label>
        <input name="email" id="email" />
        <span class="error"> <?php echo $email_error; ?> </span> <br /> <br />

        <button name="submit_btn" id="submit_btn" type="submit">Submit</button>

        <containor>
            <div> <?php echo "First Name: " . $dbSelected_fname ?> </div>
            <div> <?php echo "Last Name: " . $dbSelected_lname ?> </div>
            <div> <?php echo "Email: " . $dbSelected_email ?> </div>
            <button type="submit" name="edit_btn">Edit</button>
            <button type="submit" name="delete_btn">Delete</button>
        </containor>
    </form>
</body>

</html>