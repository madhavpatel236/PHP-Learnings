<?php
session_start();

if ($_SESSION['authenticated'] !== true) {
    header("Location: ../index.php");
    exit;
}

include '../controller/homeController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View</title>
</head>

<body>

    <body>
        <form id="userForm" method="post">
            <input id="userid" type="hidden" />

            <lable for="firstname"> First Name: </lable>
            <input
                id="firstname"
                name="firstname"
                type="text"
                value="<?php echo $dbData['dbSelected_fname'] ?? ''; ?>" />
            <span id="firstname_error">
                <!-- <?php echo $obj->errors['fname_error']; ?>  -->
            </span><br /><br />

            <lable for="lastname"> Last Name: </lable>
            <input
                id="lastname"
                name="lastname"
                type="text"
                value="<?php echo $dbData['dbSelected_lname'] ?? ''; ?>" />
            <span id="lastname_error">
                <!-- <?php echo $obj->errors['lname_error']; ?> -->
            </span> <br />
            <br />

            <label for="email"> Email: </label>
            <input
                name="email"
                id="email"
                value=" <?php echo $dbData['dbSelected_email'] ?? ''; ?>" />
            <span id="email_error">
                <!-- <?php echo $obj->errors['email_error']; ?> -->
            </span> <br />
            <br />
            <button name="submit_btn" id="submit_btn" type="submit">Submit</button>
            <button type="submit" name="edit_btn">Submit Edit</button> <br />

            <br />
            <containor>
                <div> <span> First Name: <?php echo $dbData['dbSelected_fname']; ?> </span> </div>
                <div> <span> Last Name: <?php echo $dbData['dbSelected_lname']; ?> </span> </div>
                <div> <span> Email: <?php echo $dbData['dbSelected_email']; ?> </span> </div>
                <button type="submit" name="delete_btn">Delete</button>
            </containor>
        </form>
    </body>
</body>


<script>
    // client side validation
    document.getElementById('userForm').addEventListener('submit', function(event) {
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
        if (email.length == 1) {
            isValid = false;
            email_error.innerText = "Please enter your email address.";
        } else {
            email_error.innerText = "";
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }

        const submitter = event.submitter;
        if (submitter.name === "submit_btn" || submitter.name === "edit_btn" || submitter.name === "delete_btn") {
            return true;
        } else {
            event.preventDefault();
        }
    })
</script>


</html>