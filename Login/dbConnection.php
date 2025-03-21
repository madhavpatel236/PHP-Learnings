<?php

class dbConnection
{
    private $host = "";
    private $username = "root";
    private $password = "Madhav@123";
    private $dbName = "mvc_form";
    public $isConnect;

    public function __construct()
    {
        // create db if not present
        $connection = new mysqli($this->host, $this->username, $this->password);

        $createDB = " CREATE DATABASE IF NOT EXISTS mvc_form ";
        if ($connection->query($createDB) == "TRUE") {
            echo " <script> console.log('databse created sucessfully.') </script> ";
        } else {
            echo " <script> console.log('*ERROR: databse was not created .') </script> ";
        }
    }

    // connect with the db
    public function dbConnection()
    {
        return $this->isConnect = new mysqli($this->host, $this->username, $this->password, $this->dbName);
    }
}

$dbConnectionOBJ = new dbConnection(); 
