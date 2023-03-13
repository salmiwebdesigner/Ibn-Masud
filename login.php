<?php
session_start();

// connect to the database
$conn = mysqli_connect("localhost", "root", "", "ibnmasud");

// check if the form has been submitted
if (isset($_POST['submit'])) {

  // retrieve the form data
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  
  // retrieve the user from the database
  $query = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

 
  // check if the user exists
  if (mysqli_num_rows($result) > 0) {
    // the user exists, so create a session
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;

    // redirect to the dashboard
    header("Location: dashboard.php");
    exit;
  } else {
    // the user does not exist, so show an error message
    $error = "Incorrect username or password";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="w3.css">
</head>
<body>
<body class="w3-light-gray">
<div class="w3-padding-64">
    <div class="w3-row-padding">
        <div class="w3-col s12 m12 l3">&nbsp;</div>
        <div class="w3-col s12 m12 l6">
            <div class="w3-border w3-padding w3-white w3-round-large w3-card-2 w3-margin-top">
                <p class="w3-center w3-large w3-wide w3-text-blue" style="font-style: italic; font-family: Roboto,sans-serif;font-weight: bolder">Register Now</p>
                <p class="w3-center w3-xlarge w3-sofia" style="font-family: 'Tangerine', serif;">Kindly Login Your Account Now</p>

                <?php if (isset($error)) { ?>
                    <p class="w3-red w3-padding w3-center w3-round-large w3-animate-zoom"><?php echo $error; ?></p>
                <?php } ?>

                
                <form action="" method="post">

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                            <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">account_circle</span>
                            <span style="margin: 5px"></span>
                            <label style="width: 100%">
                                <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Username" name="username" type="text">

                        </label>
                    </div>
                    <br>   

                    <div class="w3-container w3-panel  w3-card-2 w3-padding w3-round-large" style="display: flex; margin: 5px">
                        <span class="material-symbols-sharp w3-text-blue" style="padding-top: 5px; font-size: 35px">account_circle</span>
                        <span style="margin: 5px"></span>
                        <label style="width: 100%">
                            <input class="w3-input w3-animate-input w3-large w3-round-large  w3-border" style="width: 65%" placeholder="Password" name="password" type="password">

                        </label>
                    </div>
                    <br>   

                    <button name="submit" class="w3-btn w3-bar w3-round-large w3-blue w3-large">Login</button>
                </form>
                <br>
            </div>

        </div>
    </div>
</div>
</body>
</html>