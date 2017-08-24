<?php
session_start();
include 'mysql_connect.php';

$valid = true;

  if(isset($_POST['btnLogin'])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result1 = mysqli_query($conn,"select * from user where userEmail = '$email'");


if(!$result1||mysqli_num_rows($result1)==0){
  echo "<script>
  alert('Email not exist!');
  window.location.href='index.html';
  </script>";

}else {

  $row1 = mysqli_fetch_row($result1);
  $activated = $row1[4];

  if($activated == 0){

    echo "<script>
    alert('Please activate your account through your email.');
    window.location.href='index.html';
    </script>";

  }else{

    $result0 = mysqli_query($conn,"select * from user_login where userEmail = '$email'");
    $row0 = mysqli_fetch_row($result0);
    $hashPassword = $row0[1];
    $hash = password_verify($password, $hashPassword);

    if ($hash == 1) {
      $result = mysqli_query($conn,"select * from user_login where userEmail = '$email' ");

      if(mysqli_num_rows($result)==1){
        $_SESSION["userEmail"] =$email;
        $result2 = mysqli_query($conn, "select userID, position from user where userEmail= '$email'");
        $row = mysqli_fetch_row($result2);
        $_SESSION["userID"]=$row[0];
        $_SESSION["position"]=$row[1];
        header("Location: home.php");
      }

    }
    else {
      echo "<script>
      alert('Password is incorrect!');
      window.location.href='index.html';
      </script>";
    }

  }

}

}

 ?>
