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
 ?>

<h5>Member List</h5>
<table>
<thead>
  <tr>
    <th>No.</th>
    <th>ID</th>
    <th>Name</th>
    <th>University</th>
  </tr>
</thead>

<?php
   $i=1;
   $result4 = mysqli_query($conn, "select ID from groups where groupName = '$groupName' ");
   $row4 = mysqli_fetch_row($result4);
   $groupID = $row4[0];

   $result5 = mysqli_query($conn, "select user.userID id, fullName, university, groupPosition from groups_user, user where
   user.userID = groups_user.userID and groupID = '$groupID' ");

   if (mysqli_num_rows($result5) > 0) {

       while($row5 = mysqli_fetch_assoc($result5)) {
         $position = $row5["groupPosition"];
         if ($position == "MEMBER") {
           ?>
             <tbody>
               <tr>
                 <td><?php echo $i++; ?></td>
                 <td><?php echo $row5["id"]; ?></td>
                 <td><?php echo $row5["fullName"]; ?></td>
                 <td><?php echo $row5["university"]; ?></td>
                 <!-- <td><a href="#"></a></td> -->
               </tr>
             </tbody>

           <?php
         }else {
           ?>
             <tbody>
               <tr>
                 <td><?php echo $i++; ?></td>
                 <td><?php echo $row5["id"]; ?></td>
                 <td><?php echo $row5["fullName"]; ?><?php echo " [Admin]"; ?></td>
                 <td><?php echo $row5["university"]; ?></td>
               </tr>
             </tbody>

           <?php
         }


       }

   }else {
     echo "No member.";
   }
$_SESSION["groupName"] = $groupName;

?>
</table>
<div class="section"></div>
  <a href="#" id="back" style="float:right;">Back</a>

  <script type="text/javascript">
  $(function () {

      $("#back").click(function () {
           $(".groupContent").show();
           $("#groupfiles").show();
           $(".groupMemberList").hide();
           $("#memberList").show();
      });

  });

  </script>
