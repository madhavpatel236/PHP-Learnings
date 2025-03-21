<?php

include '../config.php';
include '../model/loginModel.php';

class loginController
{
    public $modelObj;
    public $email = '';
    public $password = '';
    public $errors = array("email_error" => '', "password_error" => '', "common_error" => '');

    public function __construct()
    {
        echo " <script> console.log('hiiiiiii);</script>  " . $this->email;
        $this->modelObj = $GLOBALS['loginModelOBJ'];
        $this->email = isset($_POST['email']) ? $_POST['email'] : " ";
        $this->password = isset($_POST['password']) ? $_POST['password'] : "";

        if ($this->email == '') {
            echo "Please enter a email address for the login.";
            $this->errors['email_error'] = "Please enter a email address for the login.";
        }
        if ($this->password == '') {
            $this->errors['password_error'] = 'Please enter a password for the login. ';
        }
    }

    public function checkAuth()
    {
        $this->modelObj->authentication($this->email, $this->password);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controllerObj = new loginController();
    if (isset($_POST['submit']) && empty($controllerObj->errors['email_error']) && empty($controllerObj->errors['password_error'])) {
        $controllerObj->checkAuth();
    }
}
