<?php
$fname_error = $lname_error = $email_error = "";
$firstname = $lastname = $email = "";
$lastid = "";
$dbSelected_id = "";
$dbSelected_fname = "";
$dbSelected_lname = "";
$dbSelected_email = "";
$Flag = false;
$isEditing = false;
$editId = null;
$showLastRecord = false;

// Database 
$host = "localhost";
$username = "root";
$password = "Madhav@123";
$myDB = "CRUD";

function test_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



// Process form validation and submission
if (isset($_POST['submit_btn'])) {
  $isValid = true;

  // Get form data and validate
  $firstname = isset($_POST['firstname']) ? test_data($_POST['firstname']) : "";
  $lastname = isset($_POST['lastname']) ? test_data($_POST['lastname']) : "";
  $email = isset($_POST['email']) ? test_data($_POST['email']) : "";

  // Validate first name
  if (empty($firstname)) {
    $fname_error = "Please enter your first name.";
    $isValid = false;
  } elseif (strlen($firstname) < 3) {
    $fname_error = "Please enter minimum 3 characters in the first name.";
    $isValid = false;
  }

  // Validate last name
  if (empty($lastname)) {
    $lname_error = "Please enter your last name.";
    $isValid = false;
  } elseif (strlen($lastname) < 3) {
    $lname_error = "Please enter minimum 3 characters in the last name.";
    $isValid = false;
  }

  // Validate email
  if (empty($email)) {
    $email_error = "Please enter your email address.";
    $isValid = false;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Please enter a valid email address.";
    $isValid = false;
  }

  if ($isValid) {
    if ($isEditing && !empty($_POST['edit_id'])) {
      // Update
      $updateId = $_POST['edit_id'];
      $update = "UPDATE Data SET FirstName=?, LastName=?, Email=? WHERE Id=?";
      $stmt = $isConnect->prepare($update);
      $stmt->bind_param("sssi", $firstname, $lastname, $email, $updateId);

      if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully!');</script>";
        $lastid = $updateId;
        $isEditing = false;
        $showLastRecord = true;
      } else {
        echo "<script>alert('Error updating record: " . $stmt->error . "');</script>";
      }
      $stmt->close();
    } else {
      // Insert
      $info = "INSERT INTO Data (FirstName, LastName, Email) VALUES (?, ?, ?)";
      $stmt = $isConnect->prepare($info);
      $stmt->bind_param("sss", $firstname, $lastname, $email);

      if ($stmt->execute()) {
        $lastid = $isConnect->insert_id;
        echo "<script>console.log('Data successfully inserted into the db');</script>";
        $showLastRecord = true;
      } else {
        echo "<script>alert('Error inserting record: " . $stmt->error . "');</script>";
      }
      $stmt->close();
    }

    if (!empty($lastid)) {
      $selectData = "SELECT * FROM Data WHERE Id = ?";
      $stmt = $isConnect->prepare($selectData);
      $stmt->bind_param("i", $lastid);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbSelected_id = $row['Id'];
        $dbSelected_fname = $row['FirstName'];
        $dbSelected_lname = $row['LastName'];
        $dbSelected_email = $row['Email'];
      }
      $stmt->close();
    }
  }
}


// Connect database
$connection = new mysqli($host, $username, $password);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

// Create database 
$db = "CREATE DATABASE IF NOT EXISTS CRUD";
if ($connection->query($db) === TRUE) {
  echo "<script>console.log('Database created successfully!');</script>";
} else {
  echo "<script>console.log('ERROR: Database was not created: " . $connection->error . "');</script>";
}

$isConnect = new mysqli($host, $username, $password, $myDB);
if ($isConnect->connect_error) {
  die("Connection to database failed: " . $isConnect->connect_error);
}

// Create table 
$table = "CREATE TABLE IF NOT EXISTS Data (
Id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
FirstName VARCHAR(30) NOT NULL,
LastName VARCHAR(30) NOT NULL,
Email VARCHAR(30) NOT NULL UNIQUE
)";
if ($isConnect->query($table) === TRUE) {
  echo "<script>console.log('Table created successfully');</script>";
} else {
  echo "<script>console.log('ERROR: Table was not created: " . $isConnect->error . "');</script>";
}

// Edit 
if (isset($_POST['edit_btn']) && !empty($_POST['edit_btn'])) {
  $editId = $_POST['edit_btn'];
  $selectData = "SELECT * FROM Data WHERE Id = ?";
  $stmt = $isConnect->prepare($selectData);
  $stmt->bind_param("i", $editId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstname = $row['FirstName'];
    $lastname = $row['LastName'];
    $email = $row['Email'];
    $isEditing = true;
    $Flag = true;
  }
  $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // DELETE 
  if (isset($_POST['delete_btn']) && !empty($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $delete = "DELETE FROM Data WHERE Id = ?";
    $stmt = $isConnect->prepare($delete);
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
      echo "<script>alert('Record deleted successfully!');</script>";
      $firstname = $lastname = $email = "";
      $dbSelected_fname = $dbSelected_lname = $dbSelected_email = "";
      $showLastRecord = false;
    } else {
      echo "<script>alert('Error deleting record: " . $stmt->error . "');</script>";
    }
    $stmt->close();
  }
}


$isConnect->close();
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>CRUD Operation in Form</title>
</head>

<body>
  <div class="form-container">
    <h2><?php echo $isEditing ? 'Edit Record' : 'Add New Record'; ?></h2>

    <form method="post">
      <input type="hidden" name="edit_id" value="<?php echo $isEditing ? $editId : ''; ?>" />

      <div class="form-group">
        <label for="firstname">First Name:</label>
        <input id="firstname" name="firstname" type="text" value="<?php echo htmlspecialchars($firstname); ?>" />
        <span class="error"><?php echo $fname_error; ?></span>
      </div>

      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input id="lastname" name="lastname" type="text" value="<?php echo htmlspecialchars($lastname); ?>" />
        <span class="error"><?php echo $lname_error; ?></span>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($email); ?>" />
        <span class="error"><?php echo $email_error; ?></span>
      </div>

      <div class="form-group">
        <button name="submit_btn" type="submit">
          <?php echo $isEditing ? 'Update' : 'Submit'; ?>
        </button>
        <?php if ($isEditing): ?>
          <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><button type="button">Cancel</button></a>
        <?php endif; ?>
      </div>
    </form>

    <?php if ($showLastRecord && !empty($dbSelected_fname)): ?>
      <div class="record-display">
        <h3>Last Added/Updated Record</h3>
        <div class="record-item">
          <div class="record-row">
            <span class="record-label">ID:</span>
            <span><?php echo $dbSelected_id; ?></span>
          </div>
          <div class="record-row">
            <span class="record-label">First Name:</span>
            <span><?php echo htmlspecialchars($dbSelected_fname); ?></span>
          </div>
          <div class="record-row">
            <span class="record-label">Last Name:</span>
            <span><?php echo htmlspecialchars($dbSelected_lname); ?></span>
          </div>
          <div class="record-row">
            <span class="record-label">Email:</span>
            <span><?php echo htmlspecialchars($dbSelected_email); ?></span>
          </div>
          <div class="action-buttons">
            <form method="post" style="display:inline;">
              <button type="submit" name="edit_btn" value="<?php echo $dbSelected_id; ?>" class="edit-btn">Edit</button>
            </form>
            <form method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this record?');">
              <input type="hidden" name="delete_id" value="<?php echo $dbSelected_id; ?>">
              <button type="submit" name="delete_btn" class="delete-btn">Delete</button>
            </form>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>