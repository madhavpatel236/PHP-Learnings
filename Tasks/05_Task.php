<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        First Name: <input type="text" name="first_name" /> <br /> <br />
        Last Name: <input type="text" name="last_name" /> <br /> <br />
        <button type="submit"> Enter </button> <br /><br />
    </form>

    <?php
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        if( $first_name && $last_name )  echo "Full Name: $first_name $last_name";

    ?>
</body>

</html>