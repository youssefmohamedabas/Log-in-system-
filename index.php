<head>
    <meta charset="utf-8">
    <title> sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script language="javascript" type="text/javascript"></script>
    <script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = "Suggestions:" + this.responseText;
                }
            }
            xmlhttp.open("GET", "gethint.php?q=" + str, true);
            xmlhttp.send();
        }
    }
    </script>

</head>

<body background="rm222batch4-mind-27.jpg">
    <?php include 'headerr.php' ; ?>
    <?php include 'DB_Ops.php' ; ?>



    <br><br>
    <article>

        <div class="container">

            <form method="POST" enctype="multipart/form-data" id="myForm">
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="FullName" required>
                </div>
                <div class="form-group">

                    <label for="user_name">Username</label>
                    <input type="text" class="form-control" id="user_name" name="Username"
                        onkeyup="showHint(this.value)" required>
                    <p> <span id="txtHint"></span></p>
                </div>


                <div class="form-group">

                    <label for="user_name">Birthdate</label>
                    <input type="date" class="form-control" id="dateInput" name="birthdate" min="1900-01-01"
                        max="2023-12-31" required>
                    <br>
                    <button type="button" id="actorsBtn" name="submit" class="IIR">Actor</button>
                    <p><span class="actors__list"></span></p>
                </div>



                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{11}"
                        minlength="11">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="Address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="8">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="passwordcheck" required
                        minlength="8">
                </div>
                <div class="form-group">
                    <label for="user_image">User Image</label>
                    <input type="file" class="form-control-file" id="my_image" name="my_image"
                        accept=".jpg, .jpeg, .png" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </article>

    <script>
    function validateForm() {
        // Get the values of the form fields
        var fullName = document.forms["myForm"]["full_name"].value;
        var userName = document.forms["myForm"]["user_name"].value;
        var phone = document.forms["myForm"]["phone"].value;
        var address = document.forms["myForm"]["address"].value;
        var password = document.forms["myForm"]["password"].value;
        var confirmPassword = document.forms["myForm"]["confirm_password"].value;
        var userImage = document.forms["myForm"]["my_image"].value;
        var email = document.forms["myForm"]["email"].value;
        var birthdate = document.forms["myForm"]["dateInput"].value;
        // Check that all fields are filled
        if (fullName == "" || userName == "" || phone == "" || birthdate == "" || address == "" || password == "" ||
            confirmPassword == "" || userImage == "" || email == "") {
            alert("All fields are required.");
            return false;
        }

        // Check that email and birthdate are valid formats
        if (!/\S+@\S+\.\S+/.test(email)) {
            alert("Invalid email format.");
            return false;

        } else if (!/^[^\d]+$/.test(fullName)) {
            alert("PLease enter Your  real FullName");
            return false;
        }


        // Check that password meets requirements and matches confirm password
        if (!/\d/.test(password) || !/[\!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:\-]/.test(password)) {
            alert("Password must be at least 8 characters and contain at least 1 number and 1 special character.");
            return false;
        } else if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }


    document.forms["myForm"].addEventListener("submit", function(event) {
        // Prevent the form from submitting if validation fails
        if (!validateForm()) {
            event.preventDefault();
        }
    });
    </script>


    <?php include 'footer.php' ; ?>
    <script src="API_Ops.js"></script>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .form-inline {
        display: flex;
        flex-flow: row wrap;
        align-items: center;
    }

    /* Add some margins for each label */
    .form-inline label {
        margin: 5px 10px 5px 0;
    }

    /* Style the input fields */
    .form-inline input {
        vertical-align: middle;
        margin: 5px 10px 5px 0;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    /* Style the submit button */
    .form-inline button {
        padding: 10px 20px;
        background-color: dodgerblue;
        border: 1px solid #ddd;
        color: white;
    }

    .form-control {
        width: 50%;
        text-align: left;

    }

    .form-control-file {
        width: 50%;
        text-align: left;
    }



    /* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
    @media (max-width: 800px) {
        .form-inline input {
            margin: 10px 0;
        }

        .form-inline {
            flex-direction: column;
            align-items: stretch;
        }
    }

    .form-inline {
        border: 0ch;

    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .IIR {
        width: 10%;
        color: azure;
        height: 7%;
        background-color: #252525;
        border-radius: 10px;
    }

    label {
        font-size: 18px;
        margin-bottom: 10px;
    }

    input[type=date] {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    #check-actors-btn {
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    #check-actors-btn:hover {
        background-color: #808080;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f1f1f1;
        position: relative;
        padding-bottom: 58px;
        min-height: 100vh;
    }

    header {

        background-color: #333;
        color: #fff;
        padding: 20px;
    }


    article {

        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;

    }

    article:last-child {
        margin-bottom: 0;
    }

    article h3 {
        margin: 10px 0 25px 0;
    }

    article p {
        margin-top: 16px;
        line-height: 24px;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active,
    .open>.dropdown-toggle.btn-primary {
        color: #fff;
        background-color: #808080;
        border-color: #0e0f0f;
        /*set the color you want here*/
    }

    .btn-primary {
        border-color: #0e0f0f;
        background-color: #0e0f0f;
    }

    footer {

        background-color: #333;
        color: #fff;
        padding: 20px;
        position: absolute;
        width: 100%;

    }

    @media(max-width:768px) {
        header {
            padding: 30px 20px;
        }

        header h1 {
            font-size: 36px;
            margin-bottom: 22px;
        }

        header p {
            font-size: 18px;
        }

        footer {
            padding: 30px 20px;
        }

        footer h1 {
            font-size: 36px;
            margin-bottom: 22px;
        }

        footer p {
            font-size: 18px;
        }

        article {
            margin-bottom: 16px;
            font-size: 14px;
        }

        article h3 {
            margin: 10px 0 20px 0;
        }

        article p {
            margin-top: 16px;
            line-height: 20px;
        }
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        position: absolute;
    }

    .nav {
        width: 100%;
        background: #222222;
        height: 80px;
    }

    ul li {
        float: left;
        margin-top: 20px;
    }

    .container {
        background-color: rgb(215, 209, 203, 0.5);
        padding: 30px;
        width: 60%;
    }

    .Copy {
        text-align: left;
    }

    ul li a {
        width: 150px;
        color: white;
        display: block;
        text-decoration: none;
        font-size: 20px;
        text-align: center;
        padding: 10px;
        border-radius: 10px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-weight: bold;
    }

    .happ:hover {
        background: #252525;
        color: #f1f1f1;
    }

    .move {
        float: right;
        position: bottom;
    }

    .nn {
        color: rgb(255, 250, 250);
    }

    .ww {
        color: black;

    }

    .sad {
        color: rgb(151, 200, 200);
    }
    </style>