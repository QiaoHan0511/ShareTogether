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

                if(isset($_POST['groupName'])){
                  $groupName = $_POST["groupName"];
                }else {
                  $groupName = $_SESSION["groupName"];
                }

                $result = mysqli_query($conn, "select * from groups where groupName= '$groupName'");
                $row = mysqli_fetch_row($result);
                $groupID = $row[0];
                $groupStatus = $row[2];
                $userID = $_SESSION["userID"];

                if ($groupStatus == 0) {
                  $groupStatus = "Closed Group";
                }else {
                  $groupStatus = "Public Group";
                }

                $result2 = mysqli_query($conn, "select groupPosition, userGroupID from groups_user where groupID = '$groupID' && userID ='$userID' ");

                if(!$result2||mysqli_num_rows($result2)==0){
                  echo "error";

                }else if(mysqli_num_rows($result2)==1){
                  $row2 = mysqli_fetch_row($result2);
                  $groupPosition = $row2[0];
                  $userGroupID = $row2[1];
                }

                $groupPosition = strtolower("$groupPosition");
                $groupPosition = ucwords("$groupPosition");

                echo strtoupper("<h4>$groupName</h4>");
                echo $groupStatus . " [ " . $groupPosition . " ] ";

        ?>


        <?php
          if ($groupPosition == 'Member') {
      ?>

                <br/><br/>
                <button onclick="myFunction()">Unfollow Group</button>
                <script>
                function myFunction() {

                    if (confirm("Are you sure want to unfollow group?") == true) {
                      window.location.href = "leaveGroup.php?id=<?php echo $groupID ?>&guid=<?php echo $userGroupID ?>";
                    }

                }
                </script>

    <?php

          }else {
    ?>
                <br/><br/>
                <button onclick="myFunction1()">Delete Group</button>
                <script>
                function myFunction1() {

                    if (confirm("Are you sure want to delete group?") == true) {
                      window.location.href = "deleteGroup.php?id=<?php echo $groupID ?>&guid=<?php echo $userGroupID ?>";
                    }

                }
                </script>

    <?php
          }

         ?>



<div class="section"></div>
<div class="section"></div>
<div class="section"></div>
<div class="section"></div>

<!-- start group content upload -->
<div class="groupContent" id="groupContent">

<div class="uploadBtn" id="uploadBtn">
  <button type="button" name="btnUploadFile" id="btnUploadFile"
  class="btn waves-effect waves-light teal">Upload Files</button>
</div>

            <div class="card-panel" id="uploadCard" style="background-color: #f2f2f2;height: 420px;">
              <form action="uploadFile.php" method="post" enctype="multipart/form-data">
                <!-- <div class="row"> -->
                  <div class="file-field input-field col s12">
                    <div class="btn">
                      <span>File</span>
                      <input type="file" name="file" required>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Choose a file or drag files here" required>
                    </div>
                  </div>
                  *only .ppt, .pptx, .pdf, .doc, .docx, .xls, .xlsx, .jpeg, .jpg, .png, .gif are allow  </br>
                  *file size cannot more than 2MB
                <!-- </div> -->
                <!-- <div class="row"> -->
                  <div class="input-field col s12">
                    <input type="text" name="fileName" id="fileName" required/>
                    <label>File Name</label>
                  </div>
                <!-- </div> -->
                  <!-- <div class="row"> -->
                    <div class="input-field col s12">
                      <textarea id="fileDesc" name="fileDesc" class="materialize-textarea" maxlength="300" required></textarea>
                      <label>File Description</label>
                    </div>
                  <!-- </div> -->
                  <div class="input-field col s4">
                    <input type="text" name="gName" id="gName" value="<?php echo $groupName ?>" hidden/>
                  </div>
                  <button type="reset" name="btnCancelU" id="btnCancelU"
                  class="btn waves-effect waves-light teal" style="float:right;">Cancel</button>
                  <button type="submit" name="btnUpload" id="btnUpload" class="btn waves-effect waves-light teal"
                  style="float:right;">Upload</button>

               </form>
            </div>

            <div class="section"></div>
</div>
<!-- end group content upload -->

  <!-- start display group file -->
<div id="groupfiles">

<?php include 'groupFile.php'; ?>


  </div>
  <!-- end display group file -->


<!--member list-->
      <div class="groupMemberList" id="groupMemberList">

<?php include 'memberList.php'; ?>
      </div>
<!-- end member list-->

       </div>


</div>
<!-- end central column -->

<!-- start right column -->
       <div class="col s12 m6 l3">



         <br><br>

         <a href="#" id="memberList" style="float:right;">Member List</a>

       </div>
<!-- end right column -->

     </div>


     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     <script type="text/javascript">
     function autoRefresh_div()
     {
       $("#groupfiles").load("groupFile.php");
       $("#groupMemberList").load("memberList.php");// a function which will load data from other file after x seconds
     }

     setInterval('autoRefresh_div()', 5000); // refresh div after 5 secs

         $(function () {
           $("#uploadCard").hide();
             $("#btnUploadFile").click(function () {
                  $("#uploadBtn").hide();
                  $("#uploadCard").show();
             });
             $("#btnCancelU").click(function () {
                  $("#uploadBtn").show();
                  $("#uploadCard").hide();
             });

             $(".groupMemberList").hide();
             $("#memberList").click(function () {
                  $(".groupContent").hide();
                  $("#groupfiles").hide();
                  $(".groupMemberList").show();
                  $("#memberList").hide();
             });
             $("#back").click(function () {
                  $(".groupContent").show();
                  $("#groupfiles").show();
                  $(".groupMemberList").hide();
                  $("#memberList").show();
             });

         });

     </script>
      <script type="text/javascript" src="../js/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

       <script type="text/javascript" src="../js/materialize.min.js"></script>
       <script type="text/javascript" src="../js/myScript.js"></script>


   </body>
 </html>
