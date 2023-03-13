<?php

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "ibnmasud");

// Check if the form has been submitted
if (isset($_POST['register'])) {
    // Store the user input in variables
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone_number'];

    // Validate the user input
    $errors = array();

    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (empty($username)) {
        $errors[] = 'Username is required';
    }

    if (empty($email)) {
        $errors[] = 'Email is required';
    } else {
        // Check if email already exists in the database
        $check_email_query = "SELECT email FROM registration WHERE email = ?";
        $stmt = mysqli_prepare($conn, $check_email_query);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = 'Email already exists';
        }
    }

    if (empty($password)) {
        $errors[] = 'Password is required';
    } elseif ($password != $confirm_password) {
        $errors[] = 'Passwords do not match';
    }

    if (empty($phone_number)) {
        $errors[] = 'Phone number is required';
    }

    if(strlen($phone_number) > 11){
        $errors [] = "Invalid Phone number";
    }





    // If there are no errors, insert the data into the database
    if (empty($errors)) {
        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the insert statement
        $insert_query = "INSERT INTO registration (name, username, email, password, phone_number) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sssss', $name, $username, $email, $password, $phone_number);
        mysqli_stmt_execute($stmt);

        // Redirect to the login page
        header('Location: login.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="w3.css">
</head>
<body class="w3-light-gray">
<div class="w3-padding-64">
    <div class="w3-row-padding">
        <div class="w3-col s12 m12 l3">&nbsp;</div>
        <div class="w3-col s12 m12 l6">
            <div class="w3-border w3-padding w3-white w3-round-large w3-card-2 w3-margin-top">
                <p class="w3-center w3-large w3-wide w3-text-blue" style="font-style: italic; font-family: Roboto,sans-serif;font-weight: bolder">Register Now</p>
                <p class="w3-center w3-xlarge w3-sofia" style="font-family: 'Tangerine', serif;">Kindly Register Your Account Now</p>

            
                <form action="" method="post">
                    <!-- Display the sign up form -->
                    <?php
                        // Display any input errors
                    if (!empty($errors)) {
                        echo '<ul>';
                        foreach ($errors as $error) {
                            echo "<li class='w3-padding w3-red w3-round-large w3-animate-zoom'>" . $error . '</li> <br>';
                        }
                        echo '</ul>';
                    }?>

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                        <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">account_circle</span>
                        <span style="margin: 5px"></span>
                        <label style="width: 100%">
                            <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Name" name="name" type="text">
                        </label>
                    </div>
                    <br>

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                        <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">person</span>
                        <span style="margin: 5px"></span>
                        <label style="width: 100%">
                            <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Username" name="username" type="text">
                        </label>
                    </div>
                    <br>

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                        <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">mail</span>
                        <span style="margin: 5px"></span>
                        <label style="width: 100%">
                            <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Email" name="email" type="email">
                        </label>
                    </div>
                    <br>

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                        <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">password</span>
                        <span style="margin: 5px"></span>
                        <label style="width: 100%">
                            <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Password" name="password" type="password">
                        </label>
                    </div>
                    <br>

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                        <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">password</span>
                        <span style="margin: 5px"></span>
                        <label style="width: 100%">
                            <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Confirm Password" name="confirm_password" type="password">
                        </label>
                    </div>
                    <br>

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                        <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">phone</span>
                        <span style="margin: 5px"></span>
                        <label style="width: 100%">
                            <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Phone" name="phone_number" type="number">
                        </label>
                    </div>
                    <br>

                    <button name="register" class="w3-btn w3-bar w3-round-large w3-blue w3-large">Register</button>
                </form>        
                <br>
            </div>
            
        </div>
    </div>

</div>
</body>
</html>