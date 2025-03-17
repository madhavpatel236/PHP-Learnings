<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "No firstName present";
    $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "No last name present";
    $email = isset($_POST["email"]) ? $_POST["email"] : "No email present";

    echo "Form Submitted Successfully!" . "<br />" ;
    echo "First Name: " . ($firstName) . "<br>";
    echo "Last Name: " . ($lastName) . "<br>";
    echo "Email: " . ($email) . "<br>";
}
?>


