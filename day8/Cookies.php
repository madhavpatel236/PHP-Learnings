<?php

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];

setcookie($first_name , $last_name, time() + 3600 )
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form >
        <label>First Name:</label>
        <input type="text" name="firstname"  required>
        <br><br>

        <label>Last Name:</label>
        <input type="text" name="lastname" required>
        <br><br>

        <button name="save_btn" type="submit">Save</button>
    </form>

    <strong> Cookies stored data:  </strong>

    <div>
        <span> <h3> First Name: </h3> <p> <?php   $_COOKIE[$first_name]; ?> </p>  </span> <br/> <br/>
        <span> <h3> Last Name: </h3> <p> <?php   $_COOKIE[$last_name]; ?> </p>  </span>

    </div>


</body>

</html>