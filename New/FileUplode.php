<?php

$target_dir = '/New/Uploads';
$target_file = $target_dir . basename($_FILES["fileToUpload  d"]["name"]);
$uploadok = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $checkSize = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($checkSize !== false) {
        echo "file is an image: " . $checkSize["mime"];
        $uploadok = 1;
    } else {
        echo "Your file is not an image";
        $uploadok = 0;
    }

    // Check if file already exists
    if(file_exists($target_file)){
        echo "File already exists.";
        $uploadok = 0;
    }

    // Check file size
    if($_FILES["fileToUpload"]["size"] > 5000000){
        echo "Your file is to large.";
        $uploadok = 0;  
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        File: <input type="file" name="fileToUpload"  />
        <input type="submit" name="submit" value="Upload" />
    </form>
</body>

</html>