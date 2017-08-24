<?php

if(!isset($_SESSION))
    {
        session_start();
    }

include 'mysql_connect.php';

echo "<h5>Your declined files:</h5>";

          $userID = $_SESSION["userID"];

          $result = mysqli_query($conn, "select fileID, userID, groupName, dateTime, fileName, fileDesc, filePath, remark, approveDate
           from file, groups_user, groups
           where groups.ID = groups_user.groupID
           and groups_user.userGroupID = file.userGroupID
           and fileConfirm = '2' and userID = '$userID' order by approveDate desc ");

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id = $row["fileID"];

              ?>

            <div class="card-panel">
              <form class="" action="" method="post">
                <p>
                File Name: <?php echo $row["fileName"]; ?> <br/>
                File Description: <?php echo $row["fileDesc"]; ?> <br/>
                <a href="group/downloadFile.php?id=<?php echo $id ?>">File Attachment</a><br/><br/>
                The above file have been declined by group admin
                <a style="color:teal;font-weight: bold;">[<?php echo strtoupper($row["groupName"]); ?>]</a>
                on <?php echo $row["approveDate"]; ?>.
                <br/><br/>Decline Remark: <a style="color:red;"><?php echo $row["remark"]; ?></a> <br/>
              </p>

              <div class="section"></div>
              </form>
            </div>
            <br/>
              <?php
            }
          }

 ?>
