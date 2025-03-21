<?php

include "../dbConnection.php";
class home_model
{
    public $isConnect;
    public function __construct()
    {
        $this->isConnect = $GLOBALS['dbConnectionOBJ'];
        $this->isConnect->dbConnection();
        // var_dump($this->isConnect->dbConnection());
    }

    public function create()
    {
        $table = " CREATE TABLE IF NOT EXISTS Details (
        Id INT(10) NOT NULL UNIQUE AUTO INCREMENT PRIMARY KEY ,
        firstName VARCHAR(20) NOT NULL,
        lastName VARCHAR(30)  NOT NULL,
        age VARCHAR(10) NOT NULL,
        details VARCHAR(100) NOT NULL
        ) ";

        if ($this->isConnect->query($table) == 'TRUE') {
            echo " <script> console.log('table was created sucessfully!') </script> ";
        } else {
            echo " <script> console.log('*ERROR: table was not created.') </script> ";
        }
    }
}


$homeModelObj = new home_model();
