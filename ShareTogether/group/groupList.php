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
     <title>Group List</title>
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
<div class="title">
       <div class="col s12 m12 l6">
         <div class="section"></div>

         <h4>My Group List</h4>
         <div class="section"></div>
         <div class="section"></div>

<form action="shareGroup.php" method="post">





<?php
          $userID = $_SESSION["userID"];
          $i = 1;

          $result = mysqli_query($conn, "select groupName, groupPosition from groups, groups_user
          where groups.ID = groups_user.groupID and userID= '$userID'");


          if (mysqli_num_rows($result) > 0) {
?>
<table>
  <thead>
    <tr>
      <th>No.</th>
      <th>Group Name</th>
      <th>Position</th>
    </tr>
  </thead>

<?php

		          while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tbody>
                    <tr>
              				<td><?php echo $i++; ?></td>
              				<td><button type="text" name="groupName" class="modal-action modal-close waves-effect waves-green btn-flat"
                        value="<?php echo $row["groupName"]; ?>"><?php echo $row["groupName"]; ?></button></td>
              				<td><?php echo $row["groupPosition"]; ?></td>
              			</tr>
                  </tbody>

                <?php

              }

          }else {
            echo "You did not join any group yet.";
          }

 ?>
</table>
  </form>


       </div>
      </div>
<!-- end central column -->

<!-- start right column -->
       <div class="col s12 m6 l3">

       </div>
<!-- end right column -->

     </div>



       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
       <script type="text/javascript" src="../js/jquery.js"></script>
       <script type="text/javascript" src="../js/materialize.min.js"></script>

       <script type="text/javascript" src="../js/myScript.js"></script>

   </body>
 </html>
