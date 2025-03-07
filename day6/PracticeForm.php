<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</head>

<body>
    <form id="userForm" action="">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName">
        <br><br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br /> <br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <div id="empty_div"> </div>
        <button class="submit_btn" type="submit">Submit</button>
    </form>


    <script>
        $(document).ready(function(e) {
            var validateRes = $("#userForm").validate({
                rules: {
                    firstName: {
                        required: true,
                        minlength: 3,
                    },
                    lastName: {
                        required: true,
                        minlength: 4,
                    },
                    email: {
                        required: true,
                        custom_email_verification: true,
                    }
                },
                messages: {
                    firstName: {
                        require: "please enter the first name",
                        minlength: "please enter the minimum 3 char",
                    },
                    lastName: {
                        require: "please enter the last name",
                        minlength: "please enter the 4 char atleast",
                    },
                    email: {
                        required: "please enter the email",
                    }
                },
                submitHandler: function(data) {
                    alert("All the field was verified, done for the next step");
                }
            });

            jQuery.validator.addMethod("custom_email_verification", function(value, action) {
                return this.optional(action) || /^.+@elsner\.com$/.test(value)
            }, "use a given organization custom email")



            // Display data on the screen and navigate to the other screen
            $('#userForm').on("submit", function(e) {
                e.preventDefault();

                // var firstName = $('#firstName').val();
                // var lastName = $('#lastName').val();
                // var email = $('#email').val();

                // let displayText = "First Name: " + firstName + "<br>" +
                //     "Last Name: " + lastName + "<br>" +
                //     "Email: " + email;
                // if (validateRes) $("#empty_div").html(`<h3> ${displayText} </h3>`);

                $.ajax({
                    url: "Process.php",
                    type: "POST",
                    data: {
                        firstName: $("#firstName").val(),
                        lastName: $("#lastName").val(),
                        email: $("#email").val()
                    },
                    success: function(res) {
                        $("#empty_div").html(`<h3>${res}</h3>`); 
                        // window.location.href = "Process.php";
                    },
                });
            })
        })
    </script>




</body>


</html>