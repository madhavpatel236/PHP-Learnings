<?php

class configuration
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'Madhav@123';
    private $dbname = 'mvc_form';
    public $isConnect;

    public function __construct()
    {
        // create db:
        $connect = new mysqli($this->host, $this->username, $this->password);
        $db = "CREATE DATABASE IF NOT EXISTS mvc_form";
        if ($connect->query($db) === TRUE) {
            echo " <script> console.log('DB created sucessfully.'); </script> ";
        } else {
            echo " <script> console.log('*ERROR: DB was not created.'); </script> ";
        }
    }

    public function dbConnection()
    {
        // connect db
        return $this->isConnect = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    }
}
