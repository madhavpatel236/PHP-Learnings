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
    if (isset($_POST['submit_btn']) && !$fname_error && !$fname_error && !$email_error) {
        $info = "INSERT INTO Data (FirstName, LastName, Email) VALUES ( '$firstname', '$lastname', '$email' )";
        if ($isConnect->query($info) !== TRUE) {
            echo " <script> console.log('*ERROR: Data Not inserted into the db') </script> ";
        } else {
            $lastid = $isConnect->insert_id;
            echo " <script> console.log('Data sucessfully inserted into the db') </script> ";
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
    <form id="userForm" method="post">
        <input id="userid" type="hidden" />

        <lable for="firstname"> First Name: </lable>
        <input id="firstname" name="firstname" type="text" value="<?php echo $dbSelected_fname ?? ''; ?>" />
        <span id="firstname_error" class="error">
            <?php echo $fname_error; ?>
        </span><br /><br />

        <lable for="lastname"> Last Name: </lable>
        <input id="lastname" name="lastname" type="text" value="<?php echo $dbSelected_lname ?? ''; ?>" />
        <span id="lastname_error" class="error">
            <!-- <?php echo $lname_error; ?> -->
        </span> <br /> <br />

        <label for="email"> Email: </label>
        <input name="email" id="email" value="<?php echo $email ?? ''; ?>" />
        <span id="email_error" class="error">
            <!-- <?php echo $email_error; ?> -->
        </span> <br /> <br />

        <button name="submit_btn" id="submit_btn" type="submit">Submit</button>
        <button type="submit" name="edit_btn">Submit Edit</button> <br /> <br />
        <containor>
            <div> <?php echo "First Name: " . $dbSelected_fname ?> </div>
            <div> <?php echo "Last Name: " . $dbSelected_lname ?> </div>
            <div> <?php echo "Email: " . $dbSelected_email ?> </div>
            <button type="submit" name="delete_btn">Delete</button>
        </containor>
    </form>
</body>

<script>
    // client side validation
    document.getElementById('userForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let firstname = document.forms['userForm']['firstname'].value;
        let lastname = document.forms['userForm']['lastname'].value;
        let email = document.forms['userForm']['email'].value;


        let firstname_error = document.getElementById('firstname_error');
        let lastname_error = document.getElementById('lastname_error');
        let email_error = document.getElementById('email_error');

        let isValid = true;

        let allowed = /^[A-Za-z\s]+$/; // for the firstname and lastname

        // validate firstname 
        if (firstname == "") {
            isValid = false;
            firstname_error.innerText = "Please enter your firstname.";
        } else if (firstname.length <= 3) {
            isValid = false;
            firstname_error.innerText = " Please enter atleast 3 char in the first name.";
        } else if (!firstname.match(allowed)) {
            isValid = false;
            firstname_error.innerText = " Please enter only characters.";
        } else {
            firstname_error.innerText = "";
        }

        // validate lastname 
        if (lastname == "") {
            isValid = false;
            lastname_error.innerText = "Please enter your last name.";
        } else if (lastname.length <= 3) {
            isValid = false;
            lastname_error.innerText = "Please enter at least 3 char in the last name.";
        } else if (!lastname.match(allowed)) {
            isValid = false;
            lastname_error.innerText = " PLease enter only characters.";
        } else {
            lastname_error.innerText = "";
        }

        // validate email 
        if (email == "") {
            isValid = false;
            email_error.innerText = "Please enter your email address.";
        } else {
            email_error.innerText = "";
        }

        if (isValid) {
            const submitteer = event.submitter;
            if (submitteer.name === "submit_btn") {
                this.submit();
            } else if (submitteer.name === "edit_btn") {
                this.submit();
            }
            if (submitteer.name === "delete_btn") {
                this.submit();
            }
        }
    })
</script>


</html>