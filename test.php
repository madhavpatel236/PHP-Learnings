<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$name_error = $email_error = $password_error = "";
// $pas_pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" ;
$formSubmitted = "";

if (isset($_POST['submit_btn'])) {
    // // Name validation: 
    if (empty($name)) {
        $name_error = "please enter your name";
    } elseif (strlen($name) <= 3) {
        $name_error = "please enter minimum 3 character";
    } else {
        $name_error = "";
        test_data($name);
    }

    // // email validation
    if (empty($email)) {
        $email_error = "Please enter your email";
    } else {
        test_data($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "please enter valid email.";
        }
    }
    // // password validation
    if (empty($password)) {
        $password_error = "Please enter a password ";
    } else {
        test_data($password);
        // if (!preg_match($pas_pattern, $password)) {
        //     $password_error = "Please enter strong password";
        // }
    }
}
function test_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($name_error) && empty($email_error) && empty($password_error)) {
    $formSubmitted = true;
} else {
    $formSubmitted = false;
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
        <lable for=" name"> Name: </lable>
        <input id="name" name="name" type="text" />
        <span class="error"><?php echo $name_error; ?></span><br><br>

        <lable for="email"> Email: </lable>
        <input id="email" name="email" type="text" />
        <span class="error"><?php echo $email_error; ?></span><br><br>

        <lable for="password"> Password: </lable>
        <input id="password" name="password" type="password" />
        <span class="error"><?php echo $password_error; ?></span><br><br>

        <!-- if(isset(name_error) && isset(email_error) && isset(password_error)  -->
        <button name="submit_btn" type="submit"> Submit </button> <br /> <br />
    </form>

    <h4>
        <?php
        if (isset($formSubmitted) && $formSubmitted === true) {
            echo "Name: " . $_POST['name'] . "<br/>";
            echo "Email: " . $_POST['email'] . "<br/>";
        }


        // echo "Name :" .  $_POST['name'] . "<br/>";
        // echo "Email :" .  $_POST['email'] . "<br/>";
        // echo "Password :" .  $_POST['password'];
        ?>
    </h4>

</body>

</html>