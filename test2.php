<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "paymentapp";

$conn = mysqli_connect($servername, $username, $password, $db);
if ($conn) {
  echo "The DB is connected Successfully<br>";
} else {
  echo "The DB is not connected successfully<br>" . $mysqli_connect_error();
}
if (isset($_POST['user_id']) && isset($_POST['delete_user'])) {
  $id = intval($_POST['user_id']); // Ensure integer
  $stmt = $conn->prepare("DELETE FROM users WHERE User_ID = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute() && $stmt->affected_rows > 0) {
    echo "User deleted successfully!";
  } else {
    echo "Error: User not found or already deleted.";
  }

  $stmt->close();
  exit(); // Stop further execution
}

// Handle User Insertion and Editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
  $name = htmlspecialchars(trim($_POST["name"]));
  $email = htmlspecialchars(trim($_POST["email"]));
  $city = htmlspecialchars(trim($_POST["city"]));
  $user_id = isset($_POST["user_id"]) ? intval($_POST["user_id"]) : null;
  $errors = [];

  // Validation
  if (empty($name) || strlen($name) < 4) {
    $errors["name"] = "Name is required and must be at least 4 characters.";
  }
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Valid email is required.";
  } else {
    $stmt = $conn->prepare("SELECT Email FROM users WHERE Email = ? AND User_ID != ?");
    $stmt->bind_param("si", $email, $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $errors["email"] = "This email is already registered.";
    }
    $stmt->close();
  }

  if (empty($errors)) {
    if ($user_id) {
      // Update User
      $stmt = $conn->prepare("UPDATE users SET Name = ?, Email = ?, City = ? WHERE User_ID = ?");
      $stmt->bind_param("sssi", $name, $email, $city, $user_id);
      $msg = "User updated successfully!";
    } else {
      // Insert New User
      $stmt = $conn->prepare("INSERT INTO users (Name, Email, City) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $name, $email, $city);
      $msg = "User added successfully!";
    }

    if ($stmt->execute()) {
      echo "<p style='color: green;'>$msg</p>";
    } else {
      echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
    }
    $stmt->close();
  } else {
    foreach ($errors as $error) {
      echo "<p style='color: red;'>$error</p>";
    }
  }
}
?>

<html>

<head>
</head>

<body>
  <h1> Welcome To User Management System</h1>
  <button id="addUserBtn">Add Yourself From Here</button>
  <div class="overlay">
    <div class="modal">
      <h2 id="modalTitle">Add User</h2>
      <form id="userForm" method="POST">
        <input type="hidden" id="userId" name="user_id">
        <label>Name:</label> <input type="text" id="name" name="name"><br>
        <label>Email:</label> <input type="email" id="email" name="email"><br>
        <label>City:</label> <input type="text" id="city" name="city"><br>
        <button type="submit">Submit</button>
        <button type="button" id="closeModal">Close</button>
      </form>
    </div>
  </div>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>City</th>
      <th>Actions</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM users");
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['User_ID']}</td>";
      echo "<td>{$row['Name']}</td>";
      echo "<td>{$row['Email']}</td>";
      echo "<td>{$row['City']}</td>";
      echo "<td>";
      echo "<button class='btn-edit' data-id='{$row['User_ID']}' data-name='{$row['Name']}' data-email='{$row['Email']}' data-city='{$row['City']}'>Edit</button>";
      echo "<button class='btn-delete' data-id='{$row['User_ID']}'>Delete</button>";
      echo "</td>";
      echo "</tr>";
    }
    ?>
  </table>
  
</body>

</html>