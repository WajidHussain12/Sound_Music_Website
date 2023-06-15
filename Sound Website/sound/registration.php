<?php
require 'config.php';

if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $usertype = $_POST["usertype"];
  $duplicate = mysqli_query($conn, "SELECT * FROM signin WHERE username = '$username' OR email = '$email'");
  if (mysqli_num_rows($duplicate) > 0) {

    header("location:index.php?usernamealreadytaken");
  } else {
    if (strlen($password) >= 8) {
      if ($password == $confirmpassword) {

        $query = "INSERT INTO signin VALUES('','$name','$username','$email','$password','$confirmpassword','$usertype')";
        mysqli_query($conn, $query);

        header("location:index.php?success");
      } else {

        header("location:index.php?passworddonotmatch");
      }
    } else {

      header("location:index.php?passwordtooshort");
    }
  }
}
?>

<?php

if (isset($_GET["usernamealreadytaken"])) {
  echo "<div class='alreadytaken' id='usernamealreadytaken'> username already taken </div>";
  echo "<script>
          setTimeout(function() {
            document.getElementById('usernamealreadytaken').style.display = 'none';
            history.replaceState(null, '', window.location.href.split('?')[0]);
          }, 5000);
        </script>";
}

if (isset($_GET["success"])) {
  echo "<div class='success' id='success1'> Registration Successful </div>";
  echo "<script>
          setTimeout(function() {
            document.getElementById('success1').style.display = 'none';
            history.replaceState(null, '', window.location.href.split('?')[0]);
          }, 5000);
        </script>";
}

if (isset($_GET["passworddonotmatch"])) {
  echo "<div class='notmatch' id='passworddonotmatch'> password do not match </div>";
  echo "<script>
          setTimeout(function() {
            document.getElementById('passworddonotmatch').style.display = 'none';
            history.replaceState(null, '', window.location.href.split('?')[0]);
          }, 5000);
        </script>";
}

if (isset($_GET["passwordtooshort"])) {
  echo "<div class='short' id='passwordtooshort'> password too short </div>";
  echo "<script>
          setTimeout(function() {
            document.getElementById('passwordtooshort').style.display = 'none';
            history.replaceState(null, '', window.location.href.split('?')[0]);
          }, 5000);
        </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    if (window.location.href.indexOf("registration.php") != -1) {
      window.location.replace("index.php");
    }
  </script>
  <title>Registration</title>
</head>

<body>
  <div id="reg-form" class="reg-back">
    <div class="reg-form">
      <button id="close-btn" onclick="closemodal()">x</button>
      <h2>Registration</h2>
      <form class="" action="" method="post" autocomplete="off" onsubmit="return validate()">

        <input type="text" name="name" id="name" placeholder="Name" autofocus required value="" maxlength="15" required pattern="[a-zA-Z ]+" title="Please enter a valid name, using only letters and spaces"> <br>

        <input type="text" name="username" id="username" placeholder="Username" required value="" maxlength="20" required pattern="[a-zA-Z0-9_-]{4,20}" title="Please enter a valid username, using only letters, numbers, underscores, or hyphens, between 4 and 20 characters long"> <br>

        <input type="email" name="email" id="email" placeholder="Email" required value="" maxlength="50" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address, e.g. example@example.com"> <br>

        <input type="password" name="password" id="password" placeholder="Password" required value="" maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long, contain at least one digit, one lowercase letter, one uppercase letter, and one special character (!@#$%^&*)."> <br>

        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm password" required value="" maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long, contain at least one digit, one lowercase letter, one uppercase letter, and one special character (!@#$%^&*)."> <br>

        <input type="text" name="usertype" id="usertype" value="user"> <br>

        <button type="submit" name="submit">Register</button>

        <br><br><br>

        <hr>

        <p>Already have an account</p>

        <a href="#" onclick="loginmodal()">Login</a>
      </form>

    </div>
  </div>
</body>

</html>

<script src="javascript/script.js"></script>