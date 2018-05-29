<?php 
/* welcome.php */

//$_SESSION variables become available on this page
session_start(); 
?>
<div class="body content">
<div class="welcome">
<div class="alert alert-success"><?= $_SESSION['message'] ?></div>
    <img src="<?= $_SESSION['avatar'] ?>"><br />
    Welcome <span class="user"><?= $_SESSION['username'] ?></span>
    <?php
    $mysqli = new mysqli("localhost", "root",  "accounts");
    $sql = "SELECT username FROM users";
    //$result = mysqli_result object
    $result = $mysqli->query( $sql ); 
    ?>