<?php
class UserModel
{
  private $lastId = '';
  private $host = 'localhost';
  private $username = 'root';
  private $password = 'Madhav@123';
  private $dbname = 'mvc_form';
  private $isConnect;

  public $dbSelected_Data = array(
    'dbSelected_fname' => '',
    'dbSelected_lname' => '',
    'dbSelected_email' => ''
  );

  public function __construct()
  {
    // create db:
    $connect = new mysqli($this->host, $this->username, $this->password);
    $db = "CREATE DATABASE IF NOT EXISTS mvc_form";
    if ($connect->query($db) === TRUE) {
      echo " <script> console.log('DB created sucessfully.'); </script> ";
    } else {
      echo " <script> console.log('*ERROR: DB was not created.'); </script> ";
    }

    // connect db
    $this->isConnect = new mysqli($this->host, $this->username, $this->password, $this->dbname);
  }

  // add data
  public function InsertData($f_name, $l_name, $email_id)
  {
    $fname = $f_name;
    $lname = $l_name;
    $email = $email_id;

    // create table if not exists:
    $table = " CREATE TABLE IF NOT EXISTS Data(
            Id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            FirstName VARCHAR(30) NOT NULL,
            LastName VARCHAR(30) NOT NULL,
            Email VARCHAR(30) NOT NULL UNIQUE
        ); ";

    if ($this->isConnect->query($table) === TRUE) {
      echo " <script> console.log('Table created sucessfully.'); </script> ";
    } else {
      echo " <script> console.log('*ERROR: Table was not created.'); </script> ";
    }

    // Insert the data in db
    $insert = " INSERT INTO Data (FirstName, LastName, Email) VALUES ( '$fname' , '$lname' , '$email')";
    if ($this->isConnect->query($insert) !== TRUE) {
      echo " <script> console.log('*ERROR: data was not added in the db.'); </script> ";
    } else {
      $this->lastId = $this->isConnect->insert_id;
      echo " <script> console.log('Data added into the db sucessfully.'); </script> ";
    }
  }

  // select/read data
  public function SelectData()
  {
    $select = " SELECT * FROM Data WHERE Id = '$this->lastId'";
    $res = $this->isConnect->query($select);
    if ($res->num_rows > 0) {
      echo "<script> console.log('Data selected sucessfully!') </script>";
      while ($row = $res->fetch_assoc()) {
        $this->dbSelected_Data['dbSelected_fname'] = $row['FirstName'];
        $this->dbSelected_Data['dbSelected_lname'] = $row['LastName'];
        $this->dbSelected_Data['dbSelected_email'] = $row['Email'];
      }
      return $this->dbSelected_Data;
    } else {
      echo "<script> console.log('*ERROR: Data was not selected ') </script>";
      // echo $this->isConnect->error ;
    }
  }

  // delete
  public function DeleteData()
  {
    $selectLatest = "SELECT * FROM Data ORDER BY Id DESC LIMIT 1";
    $result = $this->isConnect->query($selectLatest);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $lastid = $row['Id'];

      $deleteval = "DELETE FROM Data WHERE Id = '$lastid' ";

      if ($this->isConnect->query($deleteval)) {
        $this->dbSelected_Data['dbSelected_fname'] = "";
        $this->dbSelected_Data['dbSelected_lname'] = "";
        $this->dbSelected_Data['dbSelected_email'] = "";
        echo "<script>console.log('Record deleted successfully')</script>";
      }
    }
  }

  // update
  public function UpdateData()
  {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];

    $selectLatest = "SELECT * FROM Data ORDER BY Id DESC LIMIT 1";
    $result = $this->isConnect->query($selectLatest);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $lastid = $row['Id'];

      $update = "UPDATE Data SET FirstName = '$fname', LastName = '$lname', Email = '$email' WHERE Id = '$lastid' ";

      if ($this->isConnect->query($update)) {
        echo " <script> console.log('data updated sucessfully!'); </script> ";
      } else {
        echo " <script> console.log('*ERROR: data was not updated' ); </script> ";
      }
    }
  }
}

// $obj = new UserModel();
// $obj -> InsertData('parth', 'patel', 'parth@karavadiya.com');
// print_r( $obj -> SelectData());




// Improvements:  make a abstact class and make a saperate classes for the each functionallity.

// abstract class Main{
    //     abstract function InsertData($fname, $lname, $email);
    //     abstract function SelectData();
    //     abstract function DeleteData();
    //     abstract function UpdateData();
    // }