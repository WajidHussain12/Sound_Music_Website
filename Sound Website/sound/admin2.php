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
if ($row['usertype'] == 'user') {
  // Display error message in alert box and redirect to homepage
  header("Location: user.php?error=user_access_denied");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="css/landingpage.css">
  <meta charset="utf-8">
  <title>Admin</title>
</head>

<body>

  <h2 class="success"> Welcome <?php echo $row["name"]; ?> !</h2>

  <img src="css/images/High_resolution_wallpaper_background_ID_77701915228.jpg" alt="no iimage">
  <a href="logout.php">Logout</a>
</body>

</html>

<script>
  setTimeout(function() {
    document.getElementById('name').style.display = 'none';
  }, 4000);
</script>