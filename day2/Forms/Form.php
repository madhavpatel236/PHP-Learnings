<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
</head>

<body>
    <form action="Action.php" method="get">
        Name: <input name="name" type="text" value="<?php echo $name; ?>" /> <br/> <br/>
        Email: <input name="email" type="email"  value="<?php echo $email; ?>"  /> <br/> <br/>
        Password: <input name="password" type="password" /> <br/> <br/>
        <!-- <input type="submit" name="Save" /> -->
         <button type="submit"> submit </button>
    </form>
</body>

</html>