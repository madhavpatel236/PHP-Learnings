<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" />
        <button type="submit"> Enter </button>
    </form>

    <?php
    $name = $_POST['name'];
    $reversedStr = strrev($name);
    echo $reversedStr;
    ?>
</body>

</html>


<!-- <?php

        $name = "madhav";

        $reversedStr = strrev($name);

        echo $reversedStr;


        ?> -->