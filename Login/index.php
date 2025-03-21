<?php
// include('constants.php');
include dirname(__DIR__) . '/Login/controller/loginController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <form id="userLoginForm" method="post">
        <h3>Login For the CRUD Operation: </h3>
        <label for="email"> Email: </label>
        <input id="email" name="email" />
        <span id="email_error" name="email_error">
            <!-- <?php echo $ControllerOBJ->errors['email_error']; ?> -->
        </span> <br /> <br />

        <label for="password"> Password: </label>
        <input id="password" name="password" type="password" />
        <span id="password_error" name="password_error">
            <!-- <?php echo $ControllerOBJ->errors['password_error'];  ?> -->
        </span> <br /><br />

        <span>
            <!-- <?php echo $ControllerOBJ->errors['common_error'];  ?> -->
        </span>

        <button name="submit_btn" id="submit"> Submit </button>
    </form>
</body>


<script>
    document.getElementById('userLoginForm').addEventListener('submit', function(event) {

        let email = document.forms['userLoginForm']['email'].value;
        let password = document.forms['userLoginForm']['password'].value;

        let email_error = document.getElementById('email_error');
        let password_error = document.getElementById('password_error');

        let isValid = true;

        if (email == '') {
            isValid = false;
            email_error.innerText = "Please enter admin email address.";
        } else {
            email_error.innerText = "";
        }

        if (password == '') {
            isValid = false;
            password_error.innerText = "Please enter admin password.";
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }

        const submitter = event.submitter;
        if (submitter.name === "submit_btn") {
            return true;
        } else {
            event.preventDefault();
        }



    });
</script>


</html>