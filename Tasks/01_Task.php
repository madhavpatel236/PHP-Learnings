<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input name="number" type="number" />
        <button type="submit"> Enter</button>
    </form>


    <?php
    $NumType = $_POST['number'];

    if ($NumType % 2 == 0) {
        echo " $NumType is Even";
    } else {
        echo " $NumType is Odd";
    }
    ?>

</body>

</html>