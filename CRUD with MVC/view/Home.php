<?php

include '../controller/userController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $obj = new userController();
  $errors = $obj->validateUserData();

  if (isset($_POST['submit_btn']) && empty($errors['fname_error']) && empty($errors['lname_error']) && empty($errors['email_error'])) {
    $obj->insertUserData();
    $dbData = $obj->fetchUserData();
    // print_r($dbData);
  }

  if (isset($_POST['delete_btn'])) {
    $obj->deleteUserData();
  }

  if (isset($_POST['edit_btn'])) {
    $errors = $obj->validateUserData();
    $obj->updateUserData();
  }
}


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
    <form method="post">
      <input id="userid" type="hidden" />

      <lable for="firstname"> First Name: </lable>
      <input
        id="firstname"
        name="firstname"
        type="text"
        value="<?php echo $dbData['dbSelected_fname'] ?? ''; ?>" />
      <span class="error"> <?php echo $errors['fname_error']; ?> </span><br /><br />

      <lable for="lastname"> Last Name: </lable>
      <input
        id="lastname"
        name="lastname"
        type="text"
        value="<?php echo $dbData['dbSelected_lname'] ?? ''; ?>" />
      <span class="error"> <?php echo $errors['lname_error']; ?> </span> <br />
      <br />

      <label for="email"> Email: </label>
      <input
        name="email"
        id="email"
        value=" <?php echo $dbData['dbSelected_email'] ?? ''; ?>" />
      <span class="error"> <?php echo $errors['email_error']; ?> </span> <br />
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

</html>