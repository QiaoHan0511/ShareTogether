<?php
session_start();
include 'mysql_connect.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style media="screen">
    .container
    {
      margin-top: 40px;
      width: 400px;
      height: 400px;
    }
    </style>
  </head>
  <body>
    <div class="section"></div>
    <center>
      <img class="responsive-img" style="width: 200px;" src="images/logo.png" /><br><br>
      <p>Reset password</p>
    </center>

<div class="container white z-depth-2">

<div class="newpwd">
  <div id="newPw" class="col s12">
		<form class="col s12" action="" method="post">
			<div class="form-container">
        <div class="section"></div>

        <div class="row">
					<div class="input-field col s12">
						<input id="newPw" type="text" name="newPw" required>
						<label for="newPw">New password</label>
					</div>
				</div>

        <div class="row">
					<div class="input-field col s12">
						<input id="newPwRt" type="text" name="newPwRt" required>
						<label for="newPwRt">Re-type new password</label>
					</div>
				</div>
				<center>
					<button class="btn waves-effect waves-light teal" type="submit" name="btnSubmitForgotPw" id="btnSubmitForgotPw">Submit</button>
				</center>
			</div>
		</form>
	</div>
</div>

</div>


<?php

$userID = $_GET['userID'];
$code = $_GET['code'];

$query = mysqli_query($conn,"select * from user where userID ='$userID'and confirmCode = '$code';");
while($row = mysqli_fetch_assoc($query))
{
    $db_code = $row['confirmCode'];
    $email = $row['userEmail'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['btnSubmitForgotPw'])) {

        if (($_POST["newPw"]) == ($_POST["newPwRt"])) {
            $newPw = $_POST["newPw"];
            $encryptedPassword = password_hash($newPw, PASSWORD_DEFAULT);

            mysqli_query($conn, "update user_login set userPassword='$encryptedPassword' where userEmail = '$email'");

            if($code == $db_code)
            {
                mysqli_query($conn, "update user set confirmCode='0' where userID = '$userID'");
            }

            echo "<script>alert('Password successfully changed! Please log in again with the new password.');
             window.location='index.html'</script>";
        }else {
          echo  "<script>alert('Password not match! Please enter again..');</script>";
        }

}
}

?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


  </body>
</html>
