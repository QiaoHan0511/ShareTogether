<?php
if(!isset($_SESSION))
    {
        session_start();
    }

include '../mysql_connect.php';

$userID = $_SESSION["userID"];
$userEmail = $_SESSION["userEmail"];

if(!isset($_POST['groupName'])){
  $groupName = $_SESSION["groupName"];
}else {
  $groupName = $_POST["groupName"];
}


          // $userID = $_SESSION["userID"];


          $result = mysqli_query($conn, "select fileID, userID, groupName, dateTime, fileName, fileDesc, filePath
          from file, groups_user, groups
          where groups.ID = groups_user.groupID
          and groups_user.userGroupID = file.userGroupID
          and fileConfirm = '1' and groupName = '$groupName'
          order by dateTime desc");

          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                  $id = $row["fileID"];

      ?>

                  <div class="card-panel" id="uploadCard">
                    <form class="" action="" method="post">
                      <p><a style="color:teal;font-weight: bold;"><?php echo $row["userID"]; ?></a> had uploaded a file
                      on <a style="color:teal;"><?php echo $row["dateTime"]; ?></a> <br/>
                      File Name: <?php echo $row["fileName"]; ?> <br/>
                      File Description: <?php echo $row["fileDesc"]; ?> <br/>
                      </p>
                      <a href="downloadFile.php?id=<?php echo $id ?>">Download</a>
                      <div class="section"></div>
                    </form>
                  </div>
                  <br/>
    <?php
    $_SESSION["groupName"] = $groupName;
              }
          }
?>
