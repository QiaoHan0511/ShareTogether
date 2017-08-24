<?php
session_start();
include '../mysql_connect.php';

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
     <title>Group</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
     <link rel="stylesheet" type="text/css" href="../css/materialize.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" type="text/css" href="groupStyle.css">
   </head>
   <body>

     <div class="row">

<!-- start side nav -->
       <div class="col s12 m3 l3">
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul id="slide-out" class="side-nav fixed">
           <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img src="../<?php echo $picPath ?>" width="150px" height="300px">
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
                <a href="../profilePic.php" style="color:teal;text-align:center;">Edit Profile Photo</a>
                <a href="../changePassword.php" style="color:teal;text-align:center;">Change Password</a>
              </div>
            </div>
           <li><a href="../home.php"><i class="material-icons">home</i>Home</a></li>
           <li><a href="groupList.php"><i class="material-icons">assignment</i>My Group List</a></li>
           <li><a href="group.php"><i class="material-icons">people</i>Group</a></li>
           <li><a href="../logout.php"><i class="material-icons">logout</i>Logout</a></li>
         </ul>

         <ul class="side-nav" id="mobile-demo">
           <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img src="../<?php echo $picPath ?>" width="150px" height="300px">
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
                <a href="../profilePic.php" style="color:teal;text-align:center;">Edit Profile Photo</a>
                <a href="../changePassword.php" style="color:teal;text-align:center;">Change Password</a>
              </div>
            </div>
           <li><a href="../home.php"><i class="material-icons">home</i>Home</a></li>
           <li><a href="groupList.php"><i class="material-icons">assignment</i>My Group List</a></li>
           <li><a href="group.php"><i class="material-icons">people</i>Group</a></li>
           <li><a href="../logout.php"><i class="material-icons">logout</i>Logout</a></li>
         </ul>
       </div>
<!-- end side nav -->

<!-- start central column -->
<div class="groupTitle">
       <div class="col s12 m12 l6">

    <?php

          if(isset($_POST['btnJoin'])){
            $groupName = $_POST["groupName"];
          }else {
            $groupName = $_SESSION["groupName"];
          }

          $result = mysqli_query($conn, "select * from groups where groupName= '$groupName'");
          $row = mysqli_fetch_row($result);
          $groupID = $row[0];
          $groupStatus = $row[2];
          $groupKey = $row[3];
          $userID = $_SESSION["userID"];

          if ($groupStatus == 0) {
            $groupStatus = "Closed Group";
          }else {
            $groupStatus = "Public Group";
          }

          echo strtoupper("<h4>$groupName</h4>");
          echo "$groupStatus";

          if ($groupStatus == "Closed Group") {
    ?>

            <form method="post">
              <div class="input-field col s6">
                <input type="text" name="groupKey" placeholder="Please Insert Group Key" required>
              </div>
              <div class="input-field col s6">
                <button id="btnSubmitKey" type="submit" name="btnSubmitKey"
                class="waves-effect waves-light btn">Submit</button>
              </div>
              <input type="text" name="gName" value="<?php echo $groupName ?>" hidden>
            </form>

    <?php
          }else {

            $query = "INSERT INTO groups_user (userID, groupID, groupPosition) VALUES('$userID', '$groupID', 'MEMBER')";
            if ($conn->query($query) === TRUE)
            {
                $_SESSION["groupName"] = $groupName;
                echo "New record created successfully";
                header("Location: shareGroup.php");
            }else {
              echo "Error: " . $query . "<br>" . $conn->error;
            }

          }

    ?>

     <?php
           if($_SERVER["REQUEST_METHOD"] == "POST"){

             if(isset($_POST['btnSubmitKey'])){
               $groupName = $_POST["gName"];
               $groupKey = $_POST["groupKey"];
               $_SESSION["groupName"] = $groupName;

               $result2 = mysqli_query($conn,"select * from groups where groupName='$groupName' && groupKey='$groupKey'");


               if(!$result2||mysqli_num_rows($result2)==0){
                 $_SESSION["groupName"] = $groupName;
                 $message = "Group key not match!";
                 echo "<script type='text/javascript'>
                 alert('$message');
                 window.location.href='joinGroup.php';
                 </script>";

               }
               else if(mysqli_num_rows($result2)==1){
                 $row2 = mysqli_fetch_row($result2);
                 $groupID = $row2[0];
                 $userID = $_SESSION["userID"];

                 $query1 = "INSERT INTO groups_user (userID, groupID, groupPosition) VALUES('$userID', '$groupID', 'MEMBER')";
                 if ($conn->query($query1) === TRUE)
                 {
                    //  $_SESSION["groupName"] = $groupName;
                    //  echo "New record created successfully";
                    //  header("Location: shareGroup.php");
                    echo "<script>
                    alert('Successfully join group!');
                    window.location.href='shareGroup.php';
                    </script>";
                 }else {
                   echo "Error: " . $query1 . "<br>" . $conn->error;
                 }

               }

             }
           }

    ?>


<div class="section"></div>


       </div>
</div>
<!-- end central column -->

<!-- start right column -->
       <div class="col s12 m6 l3">

       </div>
<!-- end right column -->

     </div>

        <script type="text/javascript" src="../js/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

       <script type="text/javascript" src="../js/materialize.min.js"></script>
       <script type="text/javascript" src="../js/myScript.js"></script>

   </body>
 </html>
