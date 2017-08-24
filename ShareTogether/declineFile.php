<?php
session_start();
include 'mysql_connect.php';

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

  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

<?php
$fileID=$_GET['id'];
 ?>

<h5>Remark</h5>
  <form class="col s12" action="declineHandler.php" method="post">

    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="fileID" value="<?php echo $fileID ?>" hidden>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <textarea id="reason" name="reason" class="materialize-textarea" required></textarea>
        <label>Please state the decline reason</label>
      </div>
    </div>

  </div>

     <button type="submit" name="btnDeclineR" id="btnDeclineR" style="float:right;"
     class="btn waves-effect waves-light teal">Submit</button>

  </form>
