<?php
include "../config.php";
// include "../controller/loginController.php";

class login_Model
{
    public $conf_email;
    public $conf_password;
    public $ControllerObj;

    public function __construct()
    {
        $this->ControllerObj = $GLOBALS['ControllerOBJ'];
        $this->conf_email = $GLOBALS['email'];
        $this->conf_password = $GLOBALS['password'];
    }

    public function authentication($email, $password)
    {
        // echo $this->conf_email . "  , " .$this->conf_password. "<br/>";
        // echo $email ." , " . $password;
        if ($email == $this->conf_email && $password == $this->conf_password) {
            echo " <script> console.log( 'Login sucessfull!!' ); </script> ";
            header("Location: ./Home.php");
            exit;
        } else {
            // $this->ControllerObj->errors['common_error'] = "Please enter valid email address";
            echo " <script> console.log('*ERROR: credentials error!!');  </script> ";
        }
    }
}

$modelObj = new login_Model();
