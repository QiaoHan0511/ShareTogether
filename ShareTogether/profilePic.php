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
     <title>Edit Profile Photo</title>

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
       .container
       {
       	margin-top: 20px;
        padding:20px;
       	width: 700px;
       	height: 250px;
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
         <h4>Edit Profile Photo</h4>

<div class="section"></div>
<div class="section"></div>
<div class="section"></div>

<div class="container white z-depth-2">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="file-field input-field col s12">
        <div class="btn">
          <span>Photo</span>
          <input type="file" name="file" required>
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload your profile photo.">
        </div>
      </div>
    </div>
    <div class="section"></div>

      <button type="submit" name="btnUploadPic" id="btnUploadPic" class="btn waves-effect waves-light teal"
      style="float:right;">Upload</button>

   </form>
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

 if(isset($_POST["btnUploadPic"])){

   $pname = $_FILES["file"]["name"];
   $pname = mt_rand(100000,999999).$pname;
   $picPath = "./images/".$pname;
   move_uploaded_file($_FILES["file"]["tmp_name"], $picPath);

   mysqli_query($conn, "update user set picPath='$picPath' where userID = '$userID'");
   echo "<script>alert('Profile photo successfully changed!');window.location='profilePic.php'</script>";

 }

  ?>
