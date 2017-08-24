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
          $groupName = $_POST["groupName"];
          // $groupName = strtoupper($groupName);

          echo strtoupper("<h4>$groupName</h4>");
          // echo "$groupName";

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

          // echo strtoupper("$groupName") . " " . $groupStatus;
          echo "$groupStatus";

          $result1 = mysqli_query($conn, "select * from groups_user where groupID= '$groupID' && userID='$userID'");

          if(!$result1||mysqli_num_rows($result1)==0){

    ?>
              <form action="joinGroup.php" method="post">
                <div class="input-field col s6">
                  <button id="btnJoin" type="submit" name="btnJoin"
                  class="waves-effect waves-light btn">Join</button>
                </div>
                <div class="input-field col s6">
                  <input type="text" name="groupName" value="<?php echo $groupName ?>" hidden>
                </div>
              </form>
    <?php




          }else if (mysqli_num_rows($result1)==1) {

                $_SESSION["groupName"] = $groupName;
                header("Location: shareGroup.php");

          }


           ?>

<div class="section"></div>
<div class="section"></div>
<div class="section"></div>
<div class="section"></div>
<div class="section"></div>

<!-- start display group file -->
    <?php
              $result3 = mysqli_query($conn, "select * from groups where groupName= '$groupName'");
              $row3 = mysqli_fetch_row($result3);
              $groupStatus = $row3[2];
              $userID = $_SESSION["userID"];

              if ($groupStatus == 1) {

                              $result = mysqli_query($conn, "select fileID, userID, groupName, dateTime, fileName, fileDesc, filePath
                              from file, groups_user, groups
                              where groups.ID = groups_user.groupID
                              and groups_user.userGroupID = file.userGroupID
                              and fileConfirm = '1' and groupName = '$groupName' ");

                              if (mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                      $id = $row["fileID"];

                          ?>

                                      <div class="card-panel" id="uploadCard">
                                        <form class="" action="" method="post">
                                          <p>
                                          File Name: <?php echo $row["fileName"]; ?> <br/>
                                          File Description: <?php echo $row["fileDesc"]; ?> <br/>
                                          </p>
                                          <a href="downloadFile.php?id=<?php echo $id ?>">Download1</a>

                                        </form>
                                      </div>
                                      <br/>
                        <?php
                                  }
                              }

              }


    ?>
<!-- end display group file -->







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
