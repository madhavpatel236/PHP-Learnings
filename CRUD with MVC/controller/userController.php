<?php

require '../model/userModel.php';

class userController
{
  public $firstname = '';
  public $lastname = '';
  public $email = '';
  public $user;

  public function __construct()
  {
    $this->firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $this->lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $this->email = isset($_POST['email']) ? $_POST['email'] : '';
    $this->user = new UserModel();
  }

  // validation
  public function validateUserData()
  {
    $spaces = "/\W/";
    $digits = "/\d/";

    $errors = array("fname_error" => '', "lname_error" => '', "email_error" => '');

    if (strlen($this->firstname) <= 3) {
      $errors['fname_error'] = "Please enter atleast 3 char in the first name.";
    }
    if (preg_match_all($spaces, $this->firstname)) {
      $errors['fname_error'] = "non-alphabetical character are not allowed";
    }
    if (preg_match_all($digits, $this->firstname)) {
      $errors['fname_error'] = " Digits are not allowed";
    }
    if (empty($this->firstname)) {
      $errors['fname_error'] = " Please enter a first name.";
    }
    else {
      $errors['fname_error'] = '';
      test_data($this->firstname);
    }

    if (strlen($this->lastname) <= 3) {
      $errors['lname_error'] = "Please enter atleast 3 char in the lastname";
    } if (preg_match_all($spaces, $this->lastname)) {
      $errors['lname_error'] = "non-alphabetical and non-digit character are not allowed";
    } if (preg_match_all($digits, $this->lastname)) {
      $errors['lname_error'] = " Digits are not allowed";
    } if (empty($this->lastname)) {
      $errors['lname_error'] = " Please enter a last name.";
    } else {
      $errors['lname_error'] = '';
      test_data($this->lastname);
    }

    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $errors['email_error'] = " Please enter valid email address. ";
    } if (empty($this->email)) {
      $errors['email_error'] = " Please enter a email address.";
    } else {
      $errors['email_error'] = '';
      test_data($this->email);
    }
    return $errors;
  }

  public function test_data($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
