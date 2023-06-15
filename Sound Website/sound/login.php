<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM signin WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            if ($row["usertype"] == "admin") {
                header("Location: admin.php?successlogin");
            } else if ($row["usertype"] == "user") {
                header("Location: user.php?successlogin");
            } else {
                header("location:index.php?usernameandpasswordincorrect");
            }
        } else {
            header("location:index.php?wrongpassword");
        }
    } else {
        echo "<div class='usernotregistered' id='passwordtooshort'> User not registered </div>";
    }
}

?>

<?php


if (isset($_GET["usernameandpasswordincorrect"])) {
    echo "<div class='usernameandpasswordincorrect' id='success1'> Username and Password Incorrect </div>";
    echo "<script>
            setTimeout(function() {
              document.getElementById('success1').style.display = 'none';
              history.replaceState(null, '', window.location.href.split('?')[0]);
            }, 5000);
          </script>";
}

if (isset($_GET["wrongpassword"])) {
    echo "<div class='wrongpassword' id='passworddonotmatch'> Password do not match </div>";
    echo "<script>
            setTimeout(function() {
              document.getElementById('passworddonotmatch').style.display = 'none';
              history.replaceState(null, '', window.location.href.split('?')[0]);
        }, 5000);
          </script>";
}

if (isset($_GET["usernotregistered"])) {
    echo "<div class='usernotregistered' id='passwordtooshort'> User not registered </div>";
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
        if (window.location.href.indexOf("login.php") != -1) {
            window.location.replace("index.php");
        }
    </script>
    <title>Document</title>
</head>

<body>
    <div id="login" class="login-back">
        <div class="login-form">
            <button id="close-btn1" onclick="closemodal1()">x</button>
            <h2>Login</h2>
            <form class="" action="" method="post" autocomplete="off">

                <input type="text" name="usernameemail" id="usernameemail" placeholder="Username or Email" autofocus required value=""> <br>

                <input type="password" name="password" id="password" placeholder="Password" autofocus required value=""> <br>

                <button type="submit" name="submit">Login</button>

                <br><br><br><br><br>
                <hr>
                <p>Don't have an account? </p>
                <a href="#" onclick="regmodal()">Registration</a>
            </form>

        </div>
    </div>
</body>

</html>


<script src="javascript/script.js"></script>