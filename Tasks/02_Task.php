<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
</head>
<body>
    <form action="" method="post" >
        <input type="text" name="name" />
        <button type="submit" > Enter </button>
    </form>    

    <?php
        $name = $_POST['name'];

         if($name) echo "Hello ".$name;

    ?>


</body>
</html>



<!-- <?php

function greetUser($name){
    echo " Hello $name ";
}

greetUser('madhav');
?> -->