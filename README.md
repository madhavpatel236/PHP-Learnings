



// Insert data into the db
// $info = "INSERT INTO Data (FirstName, LastName, Email) VALUES ( '$firstname', '$lastname', '$email' )";
// if ($isConnect->query($info) !== TRUE) {
// echo " <script>
    console.log('*ERROR: Data Not inserted into the db')
</script> ";
// } else {
// $lastid = $isConnect->insert_id;
// echo " <script>
    console.log('Data sucessfully inserted into the db')
</script> ";
// }


// edit
// if (isset($_POST['edit_btn'])) {
// $Flag = true;
// $edit = " UPDATE FROM Data SET FirstName = '$dbSelected_fname' LastName = '$dbSelected_lname' Email = '$dbSelected_email' ";
// if ($isConnect->query($edit)) {
// echo " <script>
    console.log('data was Updated sucessfully');
</script> ";
// $dbSelected_fname = "";
// $dbSelected_lname = "";
// $dbSelected_email = "";
// } else {
// echo " <script>
    console.log('*ERROR: data was not Updated');
</script> ";
// }
// }