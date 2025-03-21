<?php

include '../config.php';
include '../controller/loginController.php';

class loginModel
{
    public $conf_email;
    public $conf_password;
    public $errors;

    public function __construct()
    {
        $this->conf_email = $GLOBALS['email'];
        $this->conf_password = $GLOBALS['password'];
        $this->errors = $GLOBALS['errors'];
    }
    function authentication($email, $password)
    {
        if ($email === $this->conf_email && $password === $this->conf_password) {
            echo " <script> console.log('Login sucessfull.') </script> ";
            // header("Location: ../view/Home.php");
        } else {
            echo " <script> console.log('cradential error!!!!') </script> ";
        }
    }
}

// here we declare this obj because from this we can directlly access the obj at any where by simply include/require this file. 
$loginModelOBJ = new loginModel();
