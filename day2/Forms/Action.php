<!-- <?php

        echo "hello from the Action.php <br /> ";

        // var_dump($_GET);
        // $val = var_export($_GET);

        echo "<br />";

        echo "<pre>";
        print_r($_GET);
        echo "</prev>";


        ?> -->


<!-- 
// process the data
<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_GET['name'];
    $name = $_GET['name'];
}

echo $name;

?> -->






















<!-- Validate the form -->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Validate</title>
</head>

<body>
    <?php

    // var_export($_GET);

    $name = $_GET['name'];
    $nameERR  = '';

    $email = $_GET['email'];
    $emailERR  = '';

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        // validate the name
        if (empty($_GET["name"])) {
            $nameERR = "Name should not be empty";
        } else {
            $name = test_input($_GET["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameERR = 'Only Char are allowed';
            }
        }

        // validate the email
        if (empty($_GET['email'])) {
            $emailERR = "Enter a proper email";
        } else {
            $email = test_input($_GET["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
    }
}
    function test_input($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

<div> <?php echo $name; ?> </div>
<div> <?php echo $email; ?> </div>

</body>
</html>

