<?php
session_start();


// Handle all form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check which form was submitted based on the submit button
    if (isset($_POST['save'])) {
        // Regular save operation
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
    } 
    elseif (isset($_POST['delete_fname'])) {
        // Delete first name
        $_SESSION['firstname'] = '';
    }
    elseif (isset($_POST['delete_lname'])) {
        // Delete last name
        $_SESSION['lastname'] = '';
    }
    
    // Redirect to prevent form resubmission
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
    <!-- Main form for data entry -->
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="firstname" value="<?php echo htmlspecialchars($_SESSION['firstname']); ?>" required>
        <br><br>
        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?php echo htmlspecialchars($_SESSION['lastname']); ?>" required>
        <br><br>
        <button type="submit" name="save">Save</button>
    </form>
    
    <h2>Stored Data</h2>
    
    <!-- Display and manage first name -->
    <div>
        <span>First Name: <strong><?php echo htmlspecialchars($_SESSION['firstname']); ?></strong></span>
        
        <!-- Edit button (redirects to the form) -->
        <form method="get" style="display: inline;">
            <button type="submit">Edit</button>
        </form>
        
        <!-- Delete button for first name -->
        <form method="post" style="display: inline;">
            <button type="submit" name="delete_fname">Delete</button>
        </form>
    </div>
    <br>
    
    <!-- Display and manage last name -->
    <div>
        <span>Last Name: <strong><?php echo htmlspecialchars($_SESSION['lastname']); ?></strong></span>
        
        <!-- Edit button (redirects to the form) -->
        <form method="get" style="display: inline;">
            <button type="submit">Edit</button>
        </form>
        
        <!-- Delete button for last name -->
        <form method="post" style="display: inline;">
            <button type="submit" name="delete_lname">Delete</button>
        </form>
    </div>
</body>
</html>