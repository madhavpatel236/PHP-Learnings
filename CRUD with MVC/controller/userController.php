<?php

require '../model/userModel.php';

class userController
{
  public $firstname = '';
  public $lastname = '';
  public $email = '';
  public $user;

  //set the value of the variables.
  public function __construct()
  {
    $this->firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $this->lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $this->email = isset($_POST['email']) ? $_POST['email'] : '';
    
    $this->user = new UserModel();
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
  public function updateUserData(){
    $this -> user -> UpdateData();
  }

}
