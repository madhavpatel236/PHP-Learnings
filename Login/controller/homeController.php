<?php

include '../model/homeModel.php';


class home_controller
{
    public $firstname;
    public $lastname;
    public $age;
    public $details;
    public $homeModelOBJ;
    public $errors = array("firstname_error" => "", "lastname_error" => "", "age_error" => "", "details_error" => "");

    public function __construct()
    {
        $this->homeModelOBJ = $GLOBALS['homeModelObj'];
        $this->firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $this->lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $this->age = isset($_POST['age']) ? $_POST['age'] : '';
        $this->details = isset($_POST['details']) ? $_POST['details'] : '';
        // var_dump($this->age);


        // validation of all the fields.
        $digits =  '/\d/';
        if (empty($this->firstname)) {
            $this->errors['firstname_error'] = ' Please enter your first name. ';
        }
        if (preg_match_all($digits, $this->firstname)) {
            $this->errors['firstname_error'] = " Digits are not allowed";
        }
        if (empty($this->lastname)) {
            $this->errors['lastname_error'] = ' Please enter your last name. ';
        }
        if (preg_match_all($digits, $this->lastname)) {
            $this->errors['lastname_error'] = " Digits are not allowed";
        }

        if ($this->age === NULL) {
            $this->errors['age_error'] = " Please enter your age. ";
        }
        if (empty($this->details)) {
            $this->errors['details_error'] = "Please enter the details about your self.";
        }
    }

    public function createtable() {
        return $this->homeModelOBJ->create();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $homeControllerObj = new home_controller();

    if (isset($_POST['submit_btn']) && !$homeControllerObj->errors['firstname_error'] && !$homeControllerObj->errors['lastname_error'] && !$homeControllerObj->errors['age_error'] && !$homeControllerObj->errors['details_error']) {
        $homeControllerObj->createtable();
    }
}

$homeControllerObj = new home_controller();
