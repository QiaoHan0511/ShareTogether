<?php
session_start();
include '../mysql_connect.php';


// if(isset($_POST['btnCreateG'])){
  $userID = $_SESSION["userID"];
  $groupName = $_POST["gName"];
  $groupKey = $_POST["gKey"];

  if ($_POST["gStatus"]=='Closed'){
    $gStatus = '0';
  }else {
    $gStatus = '1';
  }

  $query = "INSERT INTO groups (groupName, groupStatus, groupKey) VALUES('$groupName', '$gStatus', '$groupKey')";

if ($conn->query($query) === TRUE)
{
		// echo "New record created successfully";

    $result = mysqli_query($conn, "select ID from groups where groupName= '$groupName'");
    $row = mysqli_fetch_row($result);
    $groupID = $row[0];
    $query2 = "INSERT INTO groups_user (userID, groupID, groupPosition) VALUES('$userID', '$groupID', 'ADMIN')";
    if ($conn->query($query2) === TRUE)
    {
        // $_SESSION["groupName"] = $groupName;
        echo "New group created successfully";
        // header("Location: group.php");
        // echo  "<script>alert('New group created successfully');
        // window.location='group.php'</script>";
    }else {
      echo "Error: " . $query2 . "<br>" . $conn->error;
    }

}else{
		echo "Error: " . $query . "<br>" . $conn->error;
}

// }

?>
