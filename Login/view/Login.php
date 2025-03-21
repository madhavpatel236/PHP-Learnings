<?php
include '../controller/loginController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="userLoginForm" name="userLoginForm" method="post">
        <h3>Login For the CRUD Operation: </h3>
        <label for="email"> Email: </label>
        <input id="email" name="email" type="email" />
        <span id="email_error" name="email_error">
            <?php echo $controllerObj->errors['email_error']; ?>
        </span> <br /> <br />

        <label for="password"> Password: </label>
        <input id="password" name="password" type="password" />
        <span id="password_error" name="password_error">
            <?php echo $controllerObj->errors['password_error'];  ?>
        </span> <br /> <br />
        <span>
            <?php echo $controllerObj->errors['common_error'];  ?>
        </span>
        <button name="submit" id="submit"> Submit </button>
    </form>
</body>

</html>