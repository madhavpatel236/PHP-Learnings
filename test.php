<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname_error = $lname_error = $email_error = "";

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    // $id = isset($_POST['userid']);

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
    $lastid = "";
    $dbSelected_fname = "";
    $dbSelected_lname = "";
    $dbSelected_email = "";
    $Flag = false;


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


    if (isset($_POST['submit_btn'])) {

        if ($isEditing) {
            $update = "UPDATE Data SET FirstName='$firstname', LastName='$lastname', Email='$email' WHERE Id='$editId'";
            if ($isConnect->query($update)) {
                echo "<script>console.log('Record updated successfully')</script>";
            }
        } else {
            $info = "INSERT INTO Data (FirstName, LastName, Email) VALUES ( '$firstname', '$lastname', '$email' )";
            if ($isConnect->query($info) !== TRUE) {
                echo " <script> console.log('*ERROR: Data Not inserted into the db') </script> ";
            } else {
                $lastid = $isConnect->insert_id;
                echo " <script> console.log('Data sucessfully inserted into the db') </script> ";
            }
        }

        // SELECT data
        $selectData = " SELECT * FROM Data WHERE Id = '$lastid' ";
        // $selectData = " SELECT * FROM Data ORDER BY Id DESC LIMIT 1 ";
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
    }


    // DELETE
    if (isset($_POST['delete_btn'])) {
        // delete operation
        $delete = " DELETE FROM Data WHERE Id = '$lastid' ";
        if ($isConnect->query($delete)) {
            echo " <script> console.log('data delete sucessfully'); </script> ";
        } else {
            echo " <script> console.log('data was not deleted '); </script> ";
        }
    }




    $isEditing = false;
    $editId = null;
    if (isset($_POST['edit_btn'])) {
        $isEditing = true;
        $editId = $_POST['edit_btn'];

        // Fetch the record to edit
        $selectData = "SELECT * FROM Data WHERE Id = '$editId'";
        $result = $isConnect->query($selectData);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $firstname = $row['FirstName'];
            $lastname = $row['LastName'];
            $email = $row['Email'];
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
    <title>CRUD opration in Form</title>
</head>

<body>
    <form method="post">
        <input id="userid" type="hidden" />

        <lable for="firstname"> First Name: </lable>
        <input id="firstname" name="firstname" type="text" value=" <?php if ($Flag) echo $dbSelected_fname ? $dbSelected_fname : ' ';  ?> " />
        <span class="error"> <?php echo $fname_error; ?></span><br /><br />

        <lable for="lastname"> Last Name: </lable>
        <input id="lastname" name="lastname" type="text" value=" <?php if ($Flag) echo $dbSelected_lname ? $dbSelected_lname : ' ';  ?> " />
        <span class="error"> <?php echo $lname_error; ?> </span> <br /> <br />

        <label for="email"> Email: </label>
        <input name="email" id="email" value=" <?php if ($Flag) echo $dbSelected_email ? $dbSelected_email : ' ';  ?> " />
        <span class="error"> <?php echo $email_error; ?> </span> <br /> <br />

        <button name="submit_btn" id="submit_btn" type="submit">Submit</button>

        <containor>
            <div> <?php echo "First Name: " . $dbSelected_fname ?> </div>
            <div> <?php echo "Last Name: " . $dbSelected_lname ?> </div>
            <div> <?php echo "Email: " . $dbSelected_email ?> </div>
            <button type="submit" name="edit_btn" value="<?php echo $lastid; ?>">Edit</button>
            <button type="submit" name="delete_btn">Delete</button>
        </containor>
    </form>
</body>

</html>









// Insert data into the db
// $info = "INSERT INTO Data (FirstName, LastName, Email) VALUES ( '$firstname', '$lastname', '$email' )";
// if ($isConnect->query($info) !== TRUE) {
// echo " <script>
    console.log('*ERROR: Data Not inserted into the db')
</script> ";
// } else {
// $lastid = $isConnect->insert_id;
// echo " <script>
    console.log('Data sucessfully inserted into the db')
</script> ";
// }


// edit
// if (isset($_POST['edit_btn'])) {
// $Flag = true;
// $edit = " UPDATE FROM Data SET FirstName = '$dbSelected_fname' LastName = '$dbSelected_lname' Email = '$dbSelected_email' ";
// if ($isConnect->query($edit)) {
// echo " <script>
    console.log('data was Updated sucessfully');
</script> ";
// $dbSelected_fname = "";
// $dbSelected_lname = "";
// $dbSelected_email = "";
// } else {
// echo " <script>
    console.log('*ERROR: data was not Updated');
</script> ";
// }
// }