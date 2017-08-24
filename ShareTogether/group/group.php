<?php
session_start();
include '../mysql_connect.php';
include 'checkName.php';
include 'validName.php';

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
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
     <link rel="stylesheet" type="text/css" href="../css/materialize.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <!-- <link rel="stylesheet" type="text/css" href="groupStyle.css"> -->

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
       <div class="col s12 m12 l6">
<br><br>
<!-- start create group modal -->
         <!-- <a class="waves-effect waves-light btn" data-target="modal1">Create New Group</a> -->
         <a class="btn waves-effect waves-light teal" data-target="modal1">Create New Group</a>

         <div id="modal1" class="modal">
           <div class="modal-content">
             <img src="../images/closelabel.png" style="float:right;" id="close">
             <h4>Create New Group</h4>
             <!-- <form class="col s12" action="" method="post"> -->
               <div class="row">
                 <div class="col s12">
                 </div>
               </div>


               <div class="row">
                 <div class="input-field col s12">
                   <input type="text" name="gName" id="gName" onfocusin="clearStatus()" onfocusout="checkplate()"/>
                   <span class="spanValid" id='plateStatusV'></span><span class="spanError" id="plateStatus"></span>
                   <label>Group Name</label>
                 </div>
               </div>

               <div class="row">
                 <div class="input-field col s12">
                     <select class="gStatus" name="gStatus" id="gStatus" onclick="checkStatus(this)" onblur="checkStatus()">
                       <option value="noselect" disabled selected>Select the status of group.</option>
                       <option value="Public">Public</option>
                       <option value="Closed">Closed</option>
                     </select><span class="spanValid" id='positionStatusV' ></span><span class="spanError" id='positionStatus' ></span>
                   </div>
               </div>

              <div class="groupKey" id="groupKey">
               <div class="row">
                 <div class="input-field col s12">
                   <input type="text" name="gKey" id="gKey" onclick="clearStatus(this)" onblur="keyValid()" maxlength="20" required/>
                   <span class="spanValid" id='keyStatusV' ></span><span class="spanError" id='keyStatus' ></span>
                   <label>Group Key</label>
                 </div>
               </div>
             </div>

           </div>
           <div class="modal-footer">

              <button type="submit" name="btnCreateG" id="btnCreateG" onclick="checkAll()"
              class="btn waves-effect waves-light teal">Create</button>
             <!-- <form class="" action="" method="post">
               <button type="reset" name="close" id="close" class="btn waves-effect waves-light teal">Cancel</button>
             </form> -->
           </div>
           <!-- </form> -->
         </div>
<!-- end create group modal -->
<br><br>
<!-- start search group -->

<div class="row">
  <div class="nav-wrapper">
    <form method="post">
      <div class="input-field teal">
      <div class="input-field col s6">
          <input id="searchTxt" name="searchTxt" type="text" placeholder="search group name">
          <!-- <label class="label-icon" for="search"><i class="material-icons">search</i></label> -->
          <!-- <i class="material-icons">close</i> -->
       </div>
       <div class="input-field col s6">
         <button type="submit" name="btnSearch" id="btnSearch" class="btn waves-effect waves-light teal">Search</button>
       </div>
     </div>
    </form>
  </div>
  </div>



<?php
// session_start();
// include '../mysql_connect.php';
// $valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST['btnSearch'])){
  $searchTxt = $_POST["searchTxt"];

  $result = mysqli_query($conn,"select * from groups where groupName='$searchTxt' ");

  if(!$result||mysqli_num_rows($result)==0){
    // mysqli_free_result($result);
    echo "No group found.";
    // $valid= false;
    // header("Location: group.php");
  }
  else if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_row($result);
    $groupID = $row[0];
    $groupName = $row[1];
    $groupStatus = $row[2];
    $userID = $_SESSION["userID"];



    if ($groupStatus == 0){
      $groupStatus = "Closed" ;
    }else {
      $groupStatus = "Public";
    }



    $result2 = mysqli_query($conn, "select groupPosition from groups_user where groupID = '$groupID' && userID = '$userID' ");

    if(!$result2||mysqli_num_rows($result2)==0){

      ?>
      <form class="" action="groupContent.php" method="post">
      <table>
              <thead>
                <tr>
                  <th>Group Name</th>
                  <th>Status</th>
                  <th>Position</th>
                </tr>
              </thead>

                    <tbody>
                      <tr>
                        <td><button type="text" name="groupName" class="modal-action modal-close waves-effect waves-green btn-flat"
                          value="<?php echo $groupName ?>"><?php echo $groupName ?></button></td>
                        <td><?php echo $groupStatus ?></td>
                        <td>None
                          <!-- <form method="post"> -->
                            <!-- <button id="btnJoin" type="button" name="btnJoin"
                            class="waves-effect waves-light btn">Join</button> -->
                          <!-- </form> -->
                        </td>
                      </tr>
                    </tbody>
        </table>
      </form>
      <?php
    }
    else if(mysqli_num_rows($result2)==1){
      $row2 = mysqli_fetch_row($result2);
      $groupPosition = $row2[0];
      ?>

      <form class="" action="groupContent.php" method="post">
        <table>
                <thead>
                  <tr>
                    <th>Group Name</th>
                    <th>Status</th>
                    <th>Position</th>
                  </tr>
                </thead>

                      <tbody>
                        <tr>
                          <td><button type="text" name="groupName" class="modal-action modal-close waves-effect waves-green btn-flat"
                            value="<?php echo $groupName ?>"><?php echo $groupName ?></button></td>
                          <td><?php echo $groupStatus ?></td>
                          <td><?php echo $groupPosition ?></td>
                        </tr>
                      </tbody>
          </table>
      </form>

      <?php

    }
  }
}
}

 ?>



<!-- end search group -->


         <!-- <br><br><h5>My Group List:</h5> -->

       </div>
<!-- end central column -->

<!-- start right column -->
       <div class="col s12 m6 l3">

       </div>
<!-- end right column -->

     </div>


     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     <script type="text/javascript">
         $(function () {
           $("#groupKey").hide();
             $("#gStatus").change(function () {
                 if ($(this).val() == "Closed") {
                     $("#groupKey").show();
                 } else {
                     $("#groupKey").hide();
                 }
             });
         });
     </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
       <script type="text/javascript" src="../js/jquery.js"></script>
       <script type="text/javascript" src="../js/materialize.min.js"></script>
       <script type="text/javascript" src="../js/myScript.js"></script>
       <script type="text/javascript">
       $(document).ready(function(){
         $("#close").click(function () {
                $('#modal1').modal('close');
         });


        });
       </script>

   </body>

 </html>
