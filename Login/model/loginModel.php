<?php
include $__APPPATH__ . "/view/Home.php";
include $__APPPATH__ . "./config.php";
class login_Model
{
    public $conf_email;
    public $conf_password;

    public function __construct()
    {
        $this->conf_email = $GLOBALS['email'];
        $this->conf_password = $GLOBALS['password'];
    }

    public function authentication($email, $password)
    {
        if ($email == $this->conf_email && $password == $this->conf_password) {
            echo " <script> console.log( 'Login sucessfull!!' ); </script> ";
            header("Location: " . __APPPATH__ . "/view/Home.php");
            exit;
        } else {
            // $this->ControllerObj->errors['common_error'] = "Please enter valid email address";
            echo " <script> console.log('*ERROR: credentials error!!');  </script> ";
        }
    }
}

global $modelObj;
$modelObj = new login_Model();
// echo "<pre>mmm"; print_r($modelObj); exit;