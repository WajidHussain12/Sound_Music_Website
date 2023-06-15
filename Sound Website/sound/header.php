<?php include 'registration.php';  ?>
<?php include 'login.php';  ?>

<?php
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM signin WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
?>


<div class="button-container">
    <button id="btn-reg" onclick="btn1()">Registration</button>
    <button id="btn-login" onclick="btn2()">
        <b><?php echo !empty($row["name"]) ? $row["name"] : 'Login'; ?></b>
    </button>
    <div class="logo">
        <a href="index.php"> <img src="css/images/20230222_220650.png" width="100%" alt=""> </a>
    </div>
</div>  