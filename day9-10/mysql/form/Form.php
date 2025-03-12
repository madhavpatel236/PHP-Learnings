<!--  Database -->
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

// create table
$create_table = " CREATE TABLE IF NOT EXISTS form_data(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    email VARCHAR(30) UNIQUE NOT NULL  
)";
if ($isConnect->query($create_table) === FALSE) {
    echo " <script> console.log('Table was not created, There are some issue please cheack the query.') </script> ";
} else {
    echo "<script> console.log('Table was created sucessfully'); </script>";
}

// Insert the details in the database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    if (isset($_POST['save_btn'])) {
        // Insert data into the database
        $insert_data = " INSERT INTO form_data (firstname, lastname, email) VALUES ('$firstname', '$lastname' , '$email' )";
        if ($isConnect->query($insert_data) !== TRUE) {
            echo " <script> console.log('There are some issue for insert the data into database:') </script> ";
        } else {
            echo " <script> console.log( 'data inserted into the database sucessfully.' ); </script> ";
        }
    }
}
$isConnect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</head>

<body>
    <form id="user_form" action="" method="post">
        <label>First Name:</label>
        <input type="text" class="firstname" name="firstname">
        <br><br>

        <label>Last Name:</label>
        <input type="text" class="lastname" name="lastname">
        <br><br>

        <label>Email: </label>
        <input type="email" class="email" name="email">
        <br><br>

        <button name="save_btn" class="submit_btn" type="submit">Save</button>
    </form>
</body>


<!-- validation using jquery -->
<script>
    $(document).ready(function() {
        $("#user_form").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3
                },
                lastname: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true,
                }
            },
            messages: {
                firstname: {
                    required: "Please enter your firstname.",
                    minlength: "Please enter the 3 charecter minimum in your firstname."
                },
                lastname: {
                    required: "Please enter your lastname.",
                    minlength: "Please enter the 3 charecter minimum in your lastname."
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address."
                }
            }
        })
    })
</script>



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

    if (isset($_POST['save_btn'])) {
        // get the data from the database
        $data = "SELECT * FROM  form_data    ORDER BY id DESC LIMIT 1 ";
        $res = $isConnect->query($data);

        if ($res === FALSE) {
            echo "don't get a data" . $isConnect->error;
        } else {
            echo " <script> console.log('get the data') </script>";
            if ($res->num_rows >= 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "FirstName: " . $row["firstname"] . "<br/>" . " Last Name: " . $row["lastname"] . "<br/>" . " Email ID: " . $row["email"] . "<br/>";
                }
            } else {
                echo "hello";
            }
        }
    }
}
?>

</html>