<?php
session_start();
include 'mysql_connect.php';

$userID = $_SESSION["userID"];
$userEmail = $_SESSION["userEmail"];

$result = mysqli_query($conn, "select * from user where userID='$userID' ");

if(!$result||mysqli_num_rows($result)==0){

  echo "Error";

}
else if(mysqli_num_rows($result)==1){
  $row = mysqli_fetch_row($result);
  $userID = $row[0];
  $fullName = $row[1];
  $position = $row[2];
  $faculty = $row[3];
  $userEmail = $row[6];
  $university = $row[7];
  $picPath = $row[8];
}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Change Password</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
     <link rel="stylesheet" type="text/css" href="../css/materialize.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <style media="screen">
       .title{
         height:120px;
         width:100%;
         background-color: teal;
         /*color:white;*/
         margin:0;
         padding:0;
       }
       h4{
         color:white;
       }

     </style>
   </head>
   <body>

     <div class="row">

<!-- start side nav -->
       <div class="col s12 m3 l3">
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul id="slide-out" class="side-nav fixed">
           <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img src="<?php echo $picPath?>" width="150px" height="300px">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?php echo $_SESSION["userID"] ?><i class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?php echo $fullName ?><i class="material-icons right">close</i></span>
                <h6><label>ID:</label><br> <?php echo $_SESSION["userID"] ?></h6>
                <h6><label>Position:</label><br> <?php echo $position ?></h6>
                <h6><label>University:</label><br> <?php echo $university ?></h6>
                <h6><label>Faculty:</label><br> <?php echo $faculty ?></h6>
                <h6><label>Email:</label><br> <?php echo $userEmail ?></h6>
                <a href="profilePic.php" style="color:teal;text-align:center;">Edit Profile Photo</a>
                <a href="changePassword.php" style="color:teal;text-align:center;">Change Password</a>
              </div>
            </div>
           <li><a href="home.php"><i class="material-icons">home</i>Home</a></li>
           <li><a href="group/groupList.php"><i class="material-icons">assignment</i>My Group List</a></li>
           <li><a href="group/group.php"><i class="material-icons">people</i>Group</a></li>
           <li><a href="logout.php"><i class="material-icons">logout</i>Logout</a></li>
         </ul>

         <ul class="side-nav" id="mobile-demo">
           <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img src="<?php echo $picPath?>" width="150px" height="300px">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?php echo $_SESSION["userID"] ?><i class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?php echo $fullName ?><i class="material-icons right">close</i></span>
                <h6><label>ID:</label><br> <?php echo $_SESSION["userID"] ?></h6>
                <h6><label>Position:</label><br> <?php echo $position ?></h6>
                <h6><label>University:</label><br> <?php echo $university ?></h6>
                <h6><label>Faculty:</label><br> <?php echo $faculty ?></h6>
                <h6><label>Email:</label><br> <?php echo $userEmail ?></h6>
                <a href="profilePic.php" style="color:teal;text-align:center;">Edit Profile Photo</a>
                <a href="changePassword.php" style="color:teal;text-align:center;">Change Password</a>
              </div>
            </div>
           <li><a href="home.php"><i class="material-icons">home</i>Home</a></li>
           <li><a href="group/groupList.php"><i class="material-icons">assignment</i>My Group List</a></li>
           <li><a href="group/group.php"><i class="material-icons">people</i>Group</a></li>
           <li><a href="logout.php"><i class="material-icons">logout</i>Logout</a></li>
         </ul>
       </div>
<!-- end side nav -->

<!-- start central column -->
<div class="title">
       <div class="col s12 m12 l6">
         <div class="section"></div>
         <h4>Change Pasword</h4>

<div class="section"></div>
<div class="section"></div>
<div class="section"></div>

<div class="container white z-depth-2">
<div class="newpwd">
  <div id="newPw" class="col s12">
    <form class="col s12" action="" method="post">
      <div class="form-container">
        <div class="section"></div>

        <div class="row">
          <div class="input-field col s12">
            <input id="oldPassword" type="text" name="oldPassword" required>
            <label>Old password</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="newPassword" type="text" name="newPassword" required>
            <label for="newPassword">New password</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="newPasswordRe" type="text" name="newPasswordRe" required>
            <label for="newPasswordRe">Re-type new password:</label>
          </div>
        </div>
        <div class="section"></div>
        <center>
          <button class="btn waves-effect waves-light teal" type="submit" name="btnChangePassword">Submit</button>
        </center>
      </div>
    </form>
  </div>
</div>
</div>


       </div>


</div>
<!-- end central column -->

<!-- start right column -->
       <div class="col s12 m6 l3">



       </div>
<!-- end right column -->

     </div>


     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

     </script>
      <script type="text/javascript" src="../js/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

       <script type="text/javascript" src="../js/materialize.min.js"></script>
       <script type="text/javascript" src="../js/myScript.js"></script>

   </body>
 </html>

 <?php

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (isset($_POST['btnChangePassword'])) {
   $old = $_POST["oldPassword"];
   $new = $_POST["newPassword"];
   $newre = $_POST["newPasswordRe"];
   $encryptedNew = password_hash($new, PASSWORD_DEFAULT);
   $encryptedNewRe = password_hash($newre, PASSWORD_DEFAULT);

   $result = mysqli_query($conn, "select userPassword from user_login where userEmail='$userEmail' ");
   $row = mysqli_fetch_row($result);
   $userPassword = $row[0];
   $hash = password_verify($old, $userPassword);

   if ($hash == 1) {
      $hash1 = password_verify($new, $userPassword);
      $hash2 = password_verify($newre, $encryptedNew);
      if ($hash1 == 1) {
        echo "<script>alert('Old password cannot same as new password!');</script>";
      }else if ($hash2 ==1) {
        mysqli_query($conn, "update user_login set userPassword='$encryptedNew' where userEmail = '$userEmail'");
        echo "<script>alert('Password successfully changed!');window.location='home.php'</script>";
      }else {
        echo  "<script>alert('Re-type password not match! Please enter again..');</script>";
      }
   }else {
      echo  "<script>alert('Incorrect password! Please enter again..');</script>";
   }

 }
 }

  ?>
