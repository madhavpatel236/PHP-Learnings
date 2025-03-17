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
            $fname_error = " Please enter minimum 3 char in the firstname. ";
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
    $lastid = "";
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
            $lastid = $isConnect->insert_id;
            echo "Insert: " . $lastid . " <script> console.log('Data sucessfully inserted into the db') </script> ";
        }

        // SELECT data
        // $selectData = " SELECT * FROM Data ORDER BY Id DESC LIMIT 1 ";
        $selectData = " SELECT * FROM Data WHERE Id = '$lastid' ";
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


    // delete
    if (isset($_POST['delete_btn'])) {

        if (isset($_POST['delete_btn'])) {
            $selectLatest = "SELECT * FROM Data ORDER BY Id DESC LIMIT 1";
            $result = $isConnect->query($selectLatest);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $lastid = $row['Id'];

                $delete = $isConnect->prepare("DELETE FROM Data WHERE Id = ?");
                $delete->bind_param("i", $lastid);

                if ($delete->execute()) {
                    $dbSelected_fname = "";
                    $dbSelected_lname = "";
                    $dbSelected_email = "";
                    echo "<script>console.log('Record deleted successfully')</script>";
                }
            }
        }
    }


    // EDIT
    if (isset($_POST['edit_btn'])) {
        $selectLatest = "SELECT * FROM Data ORDER BY Id DESC LIMIT 1";
        $result = $isConnect->query($selectLatest);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastid = $row['Id'];

            // Update 
            $update = $isConnect->prepare("UPDATE Data SET FirstName = ?, LastName = ?, Email = ? WHERE Id = ?");
            $update->bind_param("sssi", $firstname, $lastname, $email, $lastid);

            if ($update->execute()) {
                $dbSelected_fname = $firstname;
                $dbSelected_lname = $lastname;
                $dbSelected_email = $email;
                echo "<script>console.log('Record updated successfully')</script>";
            }
        }
    }
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input id="userid" type="hidden" />

        <lable for="firstname"> First Name: </lable>
        <input id="firstname" name="firstname" type="text" value="<?php echo $dbSelected_fname ?? '' ;?>" />
        <span class="error"> <?php echo $fname_error; ?></span><br /><br />

        <lable for="lastname"> Last Name: </lable>
        <input id="lastname" name="lastname" type="text" value="<?php echo $dbSelected_lname ?? '' ;?>" />
        <span class="error"> <?php echo $lname_error; ?> </span> <br /> <br />

        <label for="email"> Email: </label>
        <input name="email" id="email" value="<?php echo $email ?? '' ;?>" />
        <span class="error"> <?php echo $email_error; ?> </span> <br /> <br />

        <button name="submit_btn" id="submit_btn" type="submit">Submit</button>
        <button type="submit" name="edit_btn">Submit Edit</button> <br/> <br/>
        <containor>
            <div> <?php echo "First Name: " . $dbSelected_fname ?> </div>
            <div> <?php echo "Last Name: " . $dbSelected_lname ?> </div>
            <div> <?php echo "Email: " . $dbSelected_email ?> </div>
            <button type="submit" name="delete_btn">Delete</button>
        </containor>
    </form>
</body>

</html>