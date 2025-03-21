<?php
include '../model/loginModel.php';
class login_Controller
{
    public $email;
    public $password;
    public $ModelOBJ;
    public $errors = array("email_error" => '', "password_error" => '', "common_error" => '');

    public function __construct()
    {
        $this->ModelOBJ = $GLOBALS['modelObj'];
        $this->email = isset($_POST['email']) ?  $_POST['email'] : "";
        $this->password = isset($_POST['password']) ? $_POST['password'] : "";

        if (empty($this->email)) {
            // echo " Please enter the admin email address. ";
            $this->errors['email_error'] = "Please enter the admin email address.";
        }

        if (empty($this->password)) {
            // echo " Please enter the admin password. ";
            $this->errors['password_error'] = "Please enter the admin password.";
        }
    }

    public function authStatus()
    {
        // echo "authStatus";
        $this->ModelOBJ->authentication($this->email, $this->password);
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $ControllerOBJ = new login_Controller();

    if (isset($_POST['submit_btn'])) {
        if (!$ControllerOBJ->errors['email_error'] && !$ControllerOBJ->errors['password_error'] && !$ControllerOBJ->errors['common_error'])
            $ControllerOBJ->authStatus();
    }
}

$ControllerOBJ = new login_Controller();
