// server side validation

elseif (strlen($_POST['name']) < 3) {
            $name_error = " Please enter minimum 3 character. ";
        }