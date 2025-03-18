<?php

require '../model/userModel.php';

class userController
{
  public $user;
  protected $firstname = '';
  protected $lastname = '';
  private $email = '';
  public $errors = array("fname_error" => '', "lname_error" => '', "email_error" => '');

  public function __construct()
  {
    $this->firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $this->lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $this->email = isset($_POST['email']) ? $_POST['email'] : '';
    $this->user = new UserModel();

    $spaces = "/\W/";
    $digits = "/\d/";


    if (strlen($this->firstname) <= 3) {
      $this->errors['fname_error'] = "Please enter atleast 3 char in the first name.";
    }
    if (preg_match_all($spaces, $this->firstname)) {
      $this->errors['fname_error'] = "non-alphabetical character are not allowed";
    }
    if (preg_match_all($digits, $this->firstname)) {
      $this->errors['fname_error'] = " Digits are not allowed";
    }
    if (empty($this->firstname)) {
      $this->errors['fname_error'] = " Please enter a first name.";
    }


    if (strlen($this->lastname) <= 3) {
      $this->errors['lname_error'] = "Please enter atleast 3 char in the lastname";
    }
    if (preg_match_all($spaces, $this->lastname)) {
      $this->errors['lname_error'] = "non-alphabetical and non-digit character are not allowed";
    }
    if (preg_match_all($digits, $this->lastname)) {
      $this->errors['lname_error'] = " Digits are not allowed";
    }
    if (empty($this->lastname)) {
      $this->errors['lname_error'] = " Please enter a last name.";
    }

    if (empty($this->email)) {
      $this->errors['email_error'] = " Please enter a email address.";
    }
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->errors['email_error'] = " Please enter valid email address. ";
    }

    // return $this->errors;
  }

  public function insertUserData()
  {
    $this->user->InsertData($this->firstname, $this->lastname, $this->email);
  }

  public function fetchUserData()
  {
    return $this->user->SelectData();
  }

  public function deleteUserData()
  {
    $this->user->DeleteData();
  }

  public function updateUserData()
  {
    $this->user->UpdateData();
  }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $obj = new userController();

  if (isset($_POST['submit_btn']) && empty($obj->errors['fname_error']) && empty($obj->errors['lname_error']) && empty($obj->errors['email_error'])) {
    $obj->insertUserData();
    $dbData = $obj->fetchUserData();
    // print_r($dbData);
  }

  if (isset($_POST['delete_btn'])) {
    $obj->deleteUserData();
  }

  if (isset($_POST['edit_btn'])) {
    $obj->updateUserData();
  }
}