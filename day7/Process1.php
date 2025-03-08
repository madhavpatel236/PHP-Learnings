<?php
session_start();

$fname = $_POST["firstName"];
$_SESSION["first_name"] = $fname;

$lname = $_POST["lastName"];
$_SESSION["last_name"] = $lname;


// $_SESSION["first_name"] = $_REQUEST["firstName"];
// $_SESSION["last_name"] = $_REQUEST["lastName"];
