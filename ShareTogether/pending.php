<?php

if(!isset($_SESSION))
    {
        session_start();
    }

include 'mysql_connect.php';

echo "<h5>Your pending file:</h5>";

          $userID = $_SESSION["userID"];

          $result = mysqli_query($conn, "select fileID, userID, groupName, dateTime, fileName, fileDesc, filePath
           from file, groups_user, groups
           where groups.ID = groups_user.groupID
           and groups_user.userGroupID = file.userGroupID
           and fileConfirm = '0' and userID = '$userID' ");

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id = $row["fileID"];

              ?>

            <div class="card-panel">
              <form class="" action="" method="post">
                <p>You had uploaded a file in
                <a style="color:teal;font-weight: bold;"><?php echo strtoupper($row["groupName"]); ?></a> group
                on <a style="color:teal;"><?php echo $row["dateTime"]; ?></a> and pending admin approval.<br/>
                File Name: <?php echo $row["fileName"]; ?> <br/>
                File Description: <?php echo $row["fileDesc"]; ?> <br/>
              </p>
              <a href="group/downloadFile.php?id=<?php echo $id ?>">Download</a>
              <!-- <button type="submit" name="btnDeleteFile" style="float:right;"
              class="btn waves-effect waves-light teal">Delete</button> -->
              <div class="section"></div>
              </form>
            </div>
            <br/>
              <?php
            }
          }

 ?>
