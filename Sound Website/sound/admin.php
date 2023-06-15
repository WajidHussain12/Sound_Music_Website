<?php
session_start();

if (isset($_GET['success']) && $_GET['success'] == 7) {
  echo '<div id="success-message" class="success-messageupload">Uploaded successfully</div>';
}
if (isset($_SESSION['msg'])) {
  echo '<div id="message" class="alert alert-' . $_SESSION['msg_type'] . '">';
  echo $_SESSION['msg'];
  echo '</div>';
  unset($_SESSION['msg']);
}

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

<style>
  .success-messageupload {
    background-color: #dff0d8;
    color: #3c763d;
    padding: 10px;
    border-radius: 5px;
  }

  .success-messageupload {
    opacity: 1;
    transition: opacity 3s ease-in-out;
  }

  .success-messageupload.fade-out {
    opacity: 0;
  }

  #Useraccounts{
    color: white;
    display: none
  }
</style>


<script>
  setTimeout(function() {
    const successMsg = document.getElementById('success-message');
    successMsg.style.opacity = 0;
    setTimeout(function() {
      successMsg.remove();
      window.history.replaceState({}, document.title, window.location.href.split('?')[0]);
    }, 1000);
  }, 3000);
</script>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

  <title>Admin</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../sound/pproject/admin/Css/style.css" />
  <link rel="stylesheet" href="../sound/pproject/admin/Css/songmodification.css" />
  <link rel="stylesheet" href="../sound/pproject/admin/Css/song_result_bar.css" />
  <link rel="stylesheet" href="../sound/pproject/admin/Css/update.css" />
  <link rel="stylesheet" href="../sound/pproject/admin/Css/delete.css" />
  <link rel="stylesheet" href="../sound/pproject/admin/Css/admin_media.css">
  <style>
    .useraccounttitle{
      display: none;
    }
    .success {
      z-index: 50;
      position: absolute;
      top: 5%;
      left: 50%;
      transform: translateX(-50%);
      display: block;
      padding: 16px;
      background: linear-gradient(to bottom right, #ffffff, #83ff45);
      color: #333333;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      animation: fadeOut 1s ease 4s forwards;
    }

    .success:before {
      content: "✓";
      font-size: 24px;
      margin-right: 8px;
      color: #007f7f;
      text-shadow: 1px 1px #ffffff;
    }

    @media only screen and (max-width: 480px) {
      .success-message {
        font-size: 14px;
        padding: 12px;
        margin: 8px 0;
      }

      .success:before {
        font-size: 20px;
        margin-right: 4px;
      }
    }

    @keyframes fadeOut {
      from {
        opacity: 1;
        transform: translateX(-50%);
      }

      to {
        opacity: 0;
        transform: translateX(-50%) translateY(-50%);
      }
    }
  </style>

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



  <div class="container">



    <div class="nav">

      <div class="nav_info">

        <div class="song_upload_panel">
          <h1 id="upload_title" class="song_upload_title">Song Upload Panel</h1>
          <h1 id="Useraccounts" class="">User Accounts</h1>
          <h1 id="modification_title" class="song_modification_title">Song Modification</h1>
        </div>


        <div id="admin_info" class="admin_info">
          <div class="admin_icon">
            <div class="admin_ii"><i class="fa-solid fa-user-gear"></i></div>
            <div class="">
              <p>Admin</p>
            </div>
            <div class="admin_aero_down"><i class="fa-solid fa-angle-down"></i></div>

          </div>

          <div id="admin_logout" class="admin_logout">

            <div class="logout">
              <a href="logout.php">Logout</a>
            </div>

          </div>

        </div>



      </div>

    </div>



    <div class="sidebar">

      <div class="admin_panel">
        <h2>Admin Panel</h2>
      </div>
      <hr>

      <div class="upload_links">

        <div id="song_upload_panel" class="upload_links_inner_1">
          <a class="links_inner_flex" href="#">
            <div class=""><i class="icolor fa-solid fa-upload"></i></div>
            <div class="">Song Upload</div>
          </a>
        </div>

        <div id="song_modificaton_panel" class="upload_links_inner_1">



          <a class="links_inner_flex" href="#">
            <div class=""><i class="icolor fa-sharp fa-solid fa-pen-to-square"></i></div>
            <div class="">Song Modification</div>
          </a>



        </div>

        
        <div id="usershowbtn" class="upload_links_inner_1">

          <a class="links_inner_flex" href="#">
            <div class=""><i class="icolor fa-sharp fa-solid fa-pen-to-square"></i></div>
            <div class="">User's Accounts</div>
          </a>



        </div>

      </div>




    </div>

    <div class="center">

      <div id="confirmation-dialog" class="confirmation-dialog">
        <div class="confirm_box">
          <h2>Confirm Delete</h2>
          <div class="message">Are you sure you want to delete this record?</div>
          <div class="buttons">
            <button id="confirm-btn" class="btn-confirm">OK</button>
            <button id="cancel-btn" class="btn-cancel">Cancel</button>
          </div>
        </div>
      </div>
      <?php

      include '../sound/pproject/admin/audio_upload.php';
      include '../sound/pproject/admin/user_accounts.php';
      include '../sound/pproject/admin/songmodification.php';
      include '../sound/pproject/admin/update.php';
      ?>
      <div id="update-content"></div>



    </div>
  </div>
</body>



</html>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="../sound/pproject/admin/js/admin.js"></script>
<script src="../sound/pproject/js/script.js"></script>