<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['save_btn'])) {
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['email'] = $_POST['email'];
        // header("Location: " . $_SERVER['PHP_SELF']);
    } elseif (isset($_POST['delete_fname'])) {
        $_SESSION['firstname'] = '';
    } elseif (isset($_POST['delete_fname'])) {
        $_SESSION['firstname'] = '';
    } elseif (isset($_POST['delete_email'])) {
        $_SESSION['email'] = '';
    } elseif (isset($_POST['edit_fname'])) {
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persistent Form with Session</title>
</head>

<body>
    <form method="post">
        <label>First Name:</label>
        <input type="text" class="firstname" name="firstname" value="<?php echo htmlspecialchars($_SESSION['firstname']); ?>"> 
        <br><br>

        <label>Last Name:</label>
        <input type="text" class="lastname" name="lastname" value="<?php echo htmlspecialchars($_SESSION['lastname']); ?>"> 
        <br><br>

        <label>Email: </label>
        <input type="email" class="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
        <br><br>

        <button name="save_btn" class="submit_btn" type="submit">Save</button>

        <h2>Stored Data</h2>
        <span>First Name: <strong> <?php echo htmlspecialchars($_SESSION['firstname']); ?> </strong> </span>
        <!-- <button type="submit" name="edit_fname">Edit</button> -->
        <button type="submit" name="delete_fname"> Delete </button> <br /><br />

        <span>Last Name: <strong> <?php echo htmlspecialchars($_SESSION['lastname']); ?> </strong> </span>
        <!-- <button type="submit" name="edit_lname">Edit</button> -->
        <button type="submit" name="delete_lname"> Delete </button> <br /><br />


        <span>Email: <strong> <?php echo htmlspecialchars($_SESSION['email']); ?> </strong> </span>
        <!-- <button type="submit" name="edit_lname">Edit</button> -->
        <button type="submit" name="delete_email"> Delete </button>

    </form>
</body>

</html>