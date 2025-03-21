<?php
include('constants.php');
// include __APPPATH__ . '/controller/loginController.php';
echo dirname(__DIR__). '/Login/controller/loginController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <form name="userLoginForm" method="post">
        <h3>Login For the CRUD Operation: </h3>
        <label for="email"> Email: </label>
        <input id="email" name="email"  />
        <span id="email_error" name="email_error">
            <?php echo $ControllerOBJ->errors['email_error']; ?>
        </span> <br /> <br />

        <label for="password"> Password: </label>
        <input id="password" name="password" type="password"  />
        <span id="password_error" name="password_error">
            <?php echo $ControllerOBJ->errors['password_error'];  ?>
        </span> <br /><br />
        
        <span>
            <?php echo $ControllerOBJ->errors['common_error'];  ?>
        </span>
        
        <button name="submit_btn" id="submit"> Submit </button>
    </form>
</body>

</html>