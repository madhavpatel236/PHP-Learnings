<?php

session_start();
if (!isset($_SESSION['items'])) {
    $_SESSION['items'] = [];
    $_SESSION['next_id'] = 1;
}

// for save the new details and modify/edit the existing details. 
function saveDetails($id, $fname, $lname, $phone)
{
    if ($id && isset($_SESSION['items'][$id])) {
        $_SESSION['items'][$id] = compact('id', 'fname', 'lname', 'phone');
    } else {
        $id = $_SESSION['next_id']++;
        $_SESSION['items'][$id] = compact('id', 'fname', 'lname', 'phone');
        // print_r($_SESSION['items']);
    }
    return $id;
}

// get item for editing. // editItem we will use in the html at the input field because at the time of edit we need our content at the input field.
$editItem = null; // here we set bydefault getitem to the zero.
if (isset($_GET['edit'])) { // now here we check that in the URL we have ?edit= present or not
    $editItem = $_SESSION['items'][$_GET['edit']] ?? null; // here we select the edit item from the items. // [$_GET['edit']] from this we get a id of the editable content from the $_SESSION['item'].
}

// for the delete item
    function deleteItem($id)
{
    unset($_SESSION['items'][$id]);
}
if (isset($_GET['delete'])) {
    // $_SESSION['items'][$_GET['delete']] =''  ;
    deleteItem($_GET['delete']); // ['delete'] here get the id of the delete item.
    header("Location: {$_SERVER['PHP_SELF']}"); // after the delete come to this page again.
    exit;
}

// start point if request method is post then other things are executed for the create or update.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $phone = $_POST['phone_number'];
    saveDetails($id, $fname, $lname, $phone);
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
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

    <form method="post">
        <input type="hidden" name="id" value="<?= $editItem['id']  ?? ''; ?> " />
        <label for="first_name"> First Name: </label>
        <input type="text" name="first_name" id="first_name" value=" <?= $editItem['fname'] ?? '' ?> " /> <br /> <br />


        <label for="last_name"> last Name: </label>
        <input type="text" name="last_name" id="last_name" value=" <?= $editItem['lname'] ?? '' ?> " /> <br /> <br />


        <label for="phone_number"> Phone Number: </label>
        <input name="phone_number" id="phone_number" value=" <?= $editItem['phone'] ?? '' ?> " /> <br /> <br />

        <button type="submit" name="submit_btn" id="submit_btn"> Submit </button> <br /> <br />
    </form>

    <strong> Session stored data: </strong> <br /> <br />

    <table border="1">
        <tr>
            <th> ID</th>
            <th>First Name</th>
            <th> Last Name </th>
            <th> Phone number</th>
        </tr>

        <?php foreach ($_SESSION['items'] as $id => $item): ?>
            <tr>
                <td> <?= $id ?> </td>
                <td> <?= htmlspecialchars($item['fname']) ?> </td>
                <td><?= htmlspecialchars($item['lname']) ?> </td>
                <td> <?= htmlspecialchars($item['phone']) ?> </td>
                <td>
                    <a href="?edit=<?= $id ?>">Edit</a> |
                    <a href="?delete=<?= $id ?>" onclick="return confirm('Delete this item?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>