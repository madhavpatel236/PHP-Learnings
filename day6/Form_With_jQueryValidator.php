<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery Form Validation with Redirect</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</head>

<body>
    <form id="userForm" action="Process.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName">
        <br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br><br>

        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
            $("#userForm").validate({
                rules: {
                    firstName: {
                        required: true,
                        minlength: 3,
                    },
                    lastName: {
                        required: true,
                        minlength: 3,
                    },
                    email: {
                        required: true,
                        Custom_Email: true,
                    }
                },
                messages: {
                    firstName: {
                        required: "First Name is required",
                        minlength: "Name must be more than 3 characters",
                    },
                    lastName: {
                        required: "Last Name is required",
                        minlength: "Name must be more than 3 characters",
                    },
                    email: {
                        required: "Email is required",
                    }
                },
                    submitHandler: function(form) {
                        window.location.href = "Process.php";
                    },
            });

            jQuery.validator.addMethod("Custom_Email", function(value, element) {
                return this.optional(element) || /^.+@elsner\.com$/.test(value);
            }, "Please enter an @elsner.com email address");
        });
    </script>

</body>

</html>






<!-- 
$(document).ready(function() {

$("#userForm").submit(function(e) {
    e.preventDefault();

    let first_name = $('#f_name').val().trim();
    let last_name = $('#l_name').val().trim();
    let email = $('#email').val().trim();
    let password = $('#password').val();

    // name varification
    if(first_name == ""){
        $('#firstName_error').text('Please enter your first Name');
        return;
    }
    if(first_name.length < 3){
        $('#firstNAme_error').text('Please enter atleast 4 character')
        return;
    }

    // last name varification
    if(last_name == ''){
        $('#lastName_error').text('Please enter Your last Name' )
        return;
    } 

    // email varification

    if(email == ''){
        $('#email_error').text("Please enter the email address")
        return;
    }
})
}) -->



<!-- submitHandler: function(form) { -->
<!-- 
Redirect with form data
 var firstName = $('#firstName').val();
 var lastName = $('#lastName').val();
 var email = $('#email').val();

 var queryString = "?firstName=" + encodeURIComponent(firstName) +
 "&lastName=" + encodeURIComponent(lastName) +
 "&email=" + encodeURIComponent(email);

window.location.href = "Process.php" + queryString;}, -->