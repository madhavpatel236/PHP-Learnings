<?php
// echo dirname(__DIR__);
include dirname(__DIR__) . "/model/loginModel.php";
class login_Controller
{
    public $email;
    public $password;
    public $ModelObject;
    public $errors = array("email_error" => '', "password_error" => '', "common_error" => '');

    public function __construct()
    {
        $this->ModelObject = $GLOBALS['modelObj'];
        $this->email = isset($_POST['email']) ?  $_POST['email'] : "";
        $this->password = isset($_POST['password']) ? $_POST['password'] : "";
        // echo $_POST['email'] ;

        // validation
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
        $this->ModelObject->authentication($this->email, $this->password );
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $ControllerOBJ = new login_Controller();

    if (isset($_POST['submit_btn'])) {
        // if (!$ControllerOBJ->errors['email_error'] && !$ControllerOBJ->errors['password_error'] && !$ControllerOBJ->errors['common_error']) {
            $ControllerOBJ->authStatus();
        // }
    }
}

$ControllerOBJ = new login_Controller();
