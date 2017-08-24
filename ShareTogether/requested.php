<?php

if(!isset($_SESSION))
    {
        session_start();
    }

include 'mysql_connect.php';

echo "<h5>Files pending your approval:</h5>";
// echo "<div class="section"></div>";

// $userID = $_SESSION["userID"];
// $userEmail = $_SESSION["userEmail"];
       $userID = $_SESSION["userID"];

       $result = mysqli_query($conn, "select groupID, groupName from groups_user, groups
       where groups.ID = groups_user.groupID and groupPosition='ADMIN' and userID='$userID' ");

       if (mysqli_num_rows($result) > 0) {

           while($row = mysqli_fetch_assoc($result)) {
               $groupID = $row["groupID"];

               $result1 = mysqli_query($conn, "select userGroupID, userID from groups_user
               where groupID = '$groupID' and groupPosition = 'MEMBER' ");

               if (mysqli_num_rows($result1) > 0) {

                   while($row1 = mysqli_fetch_assoc($result1)) {
                       $userGroupID = $row1["userGroupID"];

                       $result2 = mysqli_query($conn, "select fileID, fileName, fileDesc, filePath, dateTime
                       from file f join groups_user using (userGroupID) where f.userGroupID = '$userGroupID' and fileConfirm = '0' ")
                       or die(mysqli_error($conn));

                       if (mysqli_num_rows($result2) > 0) {

                           while($row2 = mysqli_fetch_assoc($result2)) {
                             $id = $row2["fileID"];
                         ?>

                                 <div class="card-panel">
                                   <form action="group/approveFile.php" method="post">
                                     <p><?php echo $row1["userID"]; ?> had uploaded a file in
                                     <a style="color:teal;font-weight: bold;"><?php echo strtoupper($row["groupName"]); ?></a> group
                                     on <a style="color:teal;"><?php echo $row2["dateTime"]; ?></a> and pending admin approval.<br/>
                                     File Name: <?php echo $row2["fileName"]; ?> <br/>
                                     File Description: <?php echo $row2["fileDesc"]; ?> <br/>
                                   </p>
                                   <a href="group/downloadFile.php?id=<?php echo $id ?>">Download</a>
                                   <input type="text" name="fileID" value="<?php echo $id ?>" hidden>
                                   <div class="section"></div>
                                   <div style="display:inline-block; float:right;">
                                     <button type="submit" name="btnApproveFile" class="btn waves-effect waves-light teal">Approve</button>
                                     <!-- <button type="submit" name="btnDeclineFile" class="btn waves-effect waves-light teal">Decline</button> -->
                                     <a rel="facebox" id="aa" name="aa"  href= "declineFile.php?id=<?php echo $id ?>"
                                       class="btn waves-effect waves-light teal">Decline</a>
                                   </div>
                                   <div class="section"></div>
                                   </form>
                                 </div>
                                 <br/>

                 <?php

                               }
                             }
                           }

                       }

                   }
               }

 ?>
