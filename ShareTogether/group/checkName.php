<?php

include '../mysql_connect.php';


if(isset($_POST['gName']))
{
 $gName =$_POST['gName'];

 $checkdata =" SELECT groupName FROM groups WHERE groupName='$gName' ";

 $query=mysqli_query($conn, $checkdata);

 if(mysqli_num_rows($query)>0)
 {
  echo "Invalid";
 }
 else
 {
  echo "Valid";
 }
 exit();
}

?>
