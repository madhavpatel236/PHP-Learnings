<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['save_btn'])) {
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        // header("Location: " . $_SERVER['PHP_SELF']);
    } elseif (isset($_POST['delete_fname'])) {
        $_SESSION['firstname'] = '';
    } elseif (isset($_POST['delete_lname'])) {
        $_SESSION['lastname'] = '';
    } elseif(isset($_POST['edit_fname'])){

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
        <input type="text" name="firstname" value="<?php echo htmlspecialchars($_SESSION['firstname']); ?>" required>
        <br><br>
        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?php echo htmlspecialchars($_SESSION['lastname']); ?>" required>
        <br><br>
        <button name="save_btn" type="submit">Save</button>

        <h2>Stored Data</h2>
        <span>First Name: <strong> <?php echo htmlspecialchars($_SESSION['firstname']); ?> </strong> </span>
        <button type="submit" name="delete_fname"> Delete </button> <br /><br />

        <span>Last Name: <strong> <?php echo htmlspecialchars($_SESSION['lastname']); ?> </strong> </span>
        <button type="submit" name="delete_lname"> Delete </button>

    </form>
</body>

</html>