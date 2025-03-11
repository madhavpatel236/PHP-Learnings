<?php
//  setcookie(name, value, expire, path, domain, secure, httponly);

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

setcookie('firstname', $first_name, time() + 3600);
setcookie('lastname', $last_name,  time() + 3600);
setcookie('email', $email, time() + 3600);
setcookie('phone', $phone, time() + 3600);

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
        <label>First Name:</label>
        <input type="text" name="firstname" required>
        <br><br>

        <label>Last Name:</label>
        <input type="text" name="lastname" required>
        <br><br>

        <label>Email :</label>
        <input type="email" name="email" required>
        <br><br>

        <label>phone Number:</label>
        <input type="number" name="phone" required>
        <br><br>

        <button name="save_btn" type="submit">Save</button> <br /><br />
    </form>

    <strong> Cookies stored data: </strong>

    <div>
        <p> First Name: <span> <?php echo $_COOKIE["firstname"]; ?> </span> </p>
        <p> Last Name: <span> <?php echo $_COOKIE["lastname"]; ?> </span> </p>
        <p> Email: <span> <?php echo $_COOKIE["email"]; ?> </span> </p>
        <p> Phone Number : <span> <?php echo $_COOKIE["phone"]; ?> </span> </p>

    </div>


</body>

</html>