<?php
require 'config.php';

// Check if user is logged in
if (empty($_SESSION['id'])) {
  // Redirect to login page if not logged in
  header("Location: index.php");
  exit();
}

// Check if user is an admin
$id = $_SESSION["id"];
$result = mysqli_query($conn, "SELECT * FROM signin WHERE id = $id");
$row = mysqli_fetch_assoc($result);
if ($row['usertype'] == 'admin') {
  // Display error message in alert box and redirect to homepage
  header("Location: admin.php?error=admin_access_denied");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="css/landingpage.css">
  <meta charset="utf-8">
  <title>user</title>
</head>

<body>


<?php

if (isset($_GET["successlogin"])) {
  echo "<div class='success' id='success1'> Welcome " . $row['name'] . "!
  </div>";
  echo "<script>
          setTimeout(function() {
            document.getElementById('success1').style.display = 'none';
            history.replaceState(null, '', window.location.href.split('?')[0]);
          }, 3000);
        </script>";
}

?>



  <a href="logout.php">Logout</a>
</body>

</html>

