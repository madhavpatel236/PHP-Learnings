<?php

$path = __FILE__;
include "../controller/homeController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <form method="post">
        <lable for="firstname"> First Name: </lable>
        <input name="firstname" id="firstname" />
        <span name="firstname_error">
            <?php echo $homeControllerObj->errors['firstname_error'] ?>
        </span> <br /> <br />

        <lable for="lastname"> Last Name: </lable>
        <input name="lastname" id="lastname" />
        <span name="lastname_error">
            <?php echo $homeControllerObj->errors['lastname_error'] ?>
        </span> <br /> <br />

        <lable for="age"> Age: </lable>
        <select name="age" id="age">
            <option value='' name="selectAge"> Select your age </option>
            <option value="Less then 18" name="ageLess18"> Less then 18 </option>
            <option value="18" name="18"> 18 </option>
            <option value="More then 18" name="ageMore18"> More then 18 </option>
        </select>
        <span name="age_error">
            <?php echo $homeControllerObj->errors['age_error'] ?>
        </span> <br /> <br />

        <lable for="details"> Details: </lable>
        <textarea name="details" id="details"></textarea>
        <span name="details_error">
            <?php echo $homeControllerObj->errors['details_error'] ?>
        </span> <br /> <br />
        <button name="submit_btn"> Submit </button>
    </form>
</body>

</html>