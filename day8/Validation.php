<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // $name = $email = $password = '';
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $name_error = $email_error = $password_error = "";
    // $pas_pattern = "'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'";

    // Name validation: 
    if (empty($name)) {
        $name_error = "please enter your name";
    } else {
        test_data($name);
    }

    // // email validation
    if (empty($email)) {
        $email_error = "Please enter your email";
    } else {
        test_data($email);
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
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
    function test_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <lable for=" name"> Name: </lable>
        <input id="name" name="name" type="text" />
        <span class="error"><?php echo $name_error; ?></span><br><br>

        <lable for="email"> Email: </lable>
        <input id="email" name="email" type="email" />
        <span class="error"><?php echo $email_error; ?></span><br><br>

        <lable for="password"> Password: </lable>
        <input id="password" name="password" type="password" />
        <span class="error"><?php echo $password_error; ?></span><br><br>

        <button name="submit_btn" type="submit"> Submit </button>
    </form>
</body>
</html>