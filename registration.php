<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost', 'root', '', 'accounts');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] == $_POST['confirmpassword']) {
		
		
        //define other variables with submitted values from $_POST
        $firstname = $mysqli->real_escape_string($_POST['firstname']);
        $lastname = $mysqli->real_escape_string($_POST['lastname']);
		$period = $mysqli->real_escape_string($_POST['period']);

        //md5 hash password for security
        $password = md5($_POST['password']);
		
	$sql = "INSERT INTO users (firstname, lastname, period, password) "
    . "VALUES ('$firstname', '$lastname', '$period', '$password')";
        if ($mysqli->query($sql) === true)
{
    $_SESSION[ 'message' ] = "Registration succesful! Added $username to the database!";
    //redirect the user to welcome.php
    header( "location: welcome.php" );
}
    }
}
?>
<html>
<title>Safety Tests</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>Create an Account</b></h1>
  
</header>

<!-- Grid -->


<!-- Blog entries -->

  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3 style="text-align:center;"><b>Enter Your Information Below</b></h3>
    </div>
<form class="form" style= "text-align:center;" action="registration.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input class= "w3-input" type="text" placeholder="First Name" name="firstname" required />
      <input class= "w3-input" type="text" placeholder="Last Name" name="lastname" required />
	  <input class= "w3-input" type="number_format" placeholder="Period" name="period" required />
      <input class= "w3-input" type="password" placeholder="ID Number" name="password" autocomplete="new-password" required />
      <input class= "w3-input" type="password" placeholder="Confirm ID Number" name="confirmpassword" autocomplete="new-password" required />
      <input class= "w3-button w3-black w3-margin-top"  type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>


    <div class="w3-container">
      <div class="w3-row">
       
      </div>


  <hr>

<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

</body>
</html>