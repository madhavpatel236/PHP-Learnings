<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div id="userForm">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName">
        <br><br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br><br>
        <button class="submit_btn" type="submit">Submit</button>
    </div>

    <script>
        $(document).ready(function() {
            $('.submit_btn').on('click', function(e) {
                e.preventDefault();

                var formData = {
                    firstName: $('#firstName').val(),
                    lastName: $('#lastName').val(),
                    email: $('#email').val()
                };

                // Basic validation
                if (!formData.firstName || !formData.lastName || !formData.email) {
                    alert("Please fill in all fields");
                    return;
                }

                $.ajax({
                    url: "Process.php",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        alert(data);
                    },
                });
            });
        });
    </script>
</body>

</html>









</html>