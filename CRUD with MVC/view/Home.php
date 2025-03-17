<?php

include '../controller/userController.php';

if (isset($_POST['submit_btn'])) {
  $obj = new userController();
  $obj->insertUserData();
  $dbData = $obj->fetchUserData();
  // print_r($dbData);
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
      <span class="error"></span><br /><br />

      <lable for="lastname"> Last Name: </lable>
      <input
        id="lastname"
        name="lastname"
        type="text"
        value="<?php echo $dbData['dbSelected_lname'] ?? ''; ?>" />

      <span class="error"></span> <br />
      <br />

      <label for="email"> Email: </label>
      <input
        name="email"
        id="email"
        value=" <?php echo $dbData['dbSelected_email'] ?? ''; ?>" />
      <span class="error"></span> <br />
      <br />

      <button name="submit_btn" id="submit_btn" type="submit">Submit</button>
      <button type="submit" name="edit_btn">Submit Edit</button> <br />
      <br />
      <containor>
        <div> <span> First Name: <?php echo $dbData['dbSelected_fname']; ?> </span> </div>
        <div> <span> Last Name: <?php echo $dbData['dbSelected_lname']; ?> </span> </div>
        <div> <span> Email: <?php echo $dbData['dbSelected_email']; ?> </span> </div>
        <button type="submit" onclick=" <?php $obj->deleteUserData(); ?>" name="delete_btn">Delete</button>
      </containor>
    </form>
  </body>
</body>

</html>