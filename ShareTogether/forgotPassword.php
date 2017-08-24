<?php
session_start();
include 'mysql_connect.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Account Help</title>

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
      <p>Please enter your ID below. We will send you email with instructions on how to reset your password.</p>
    </center>

<div class="container white z-depth-2">
	<div id="submitID" class="col s12">
		<form class="col s12" action="forgotPasswordHandler.php" method="post">
			<div class="form-container">
        <div class="section"></div>

				<div class="row">
					<div class="input-field col s12">
						<input id="ID" type="text" name="ID" required>
						<label for="ID">ID</label>
					</div>
				</div>
				<center>
					<button class="btn waves-effect waves-light teal" type="submit" name="btnforgotPw" id="btnforgotPw">Submit</button>
				</center>
			</div>
		</form>
	</div>


</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


  </body>
</html>
