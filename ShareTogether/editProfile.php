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
     <title>Home</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
     <link rel="stylesheet" type="text/css" href="css/materialize.css">
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

       <div class="col s12 m12 l3">
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul id="slide-out" class="side-nav fixed">
           <!-- <img src="images/logo.png" alt="Share Together" style="width:120px;height:40px;"> -->
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
                <p><?php echo $_SESSION["position"] ?></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?php echo $fullName ?><i class="material-icons right">close</i></span>
                <br>
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

<!-- start central column -->
<div class="title">
       <div class="col s12 m12 l6">
<div class="section"></div>
         <h4>Edit Profile</h4>
<div class="section"></div>
<div class="section"></div>



       </div>

     </div>
<!-- end central column -->

       <div class="col s12 m6 l3">

       </div>

     </div>



       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
       <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
       <script type="text/javascript" src="js/materialize.min.js"></script>
       <script type="text/javascript" src="js/myScript.js"></script>
   </body>
 </html>
