<?php
session_start();
include 'mysql_connect.php';
include 'utem_mysql_connect.php';

require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 587;
$mail->SMTPSecure = "tls";

$errorM = "";

if(isset($_POST['btnRegister'])){
    // $university = $_POST['university'];
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $emailC = $_POST['emailC'];
    $passwordC = $_POST['passwordC'];

    if ($email!=$emailC) {
      echo "<script>
      alert('Email not match!');
      window.location.href='index.html';
      </script>";

    }elseif ($password!=$passwordC) {
      echo "<script>
      alert('Password not match!');
      window.location.href='index.html';
      </script>";
    }else {

      $result = mysqli_query($conn,"select * from  user where userID = '$userID'");
      $row = mysqli_num_rows($result);
      $Uemail = $row["userEmail"];

      if ($Uemail!=$email) {
        if($row == 0)
        {

              $result1 = mysqli_query($connU,"select * from  lecturer where lecID = '$userID'");
              $row1 = mysqli_num_rows($result1);
              $result2 = mysqli_query($connU,"select * from  student where sID = '$userID'");
              $row2 = mysqli_num_rows($result2);

              if($row1 == 1){

                $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

                mysqli_query($conn, "INSERT INTO user_login (userEmail, userPassword) VALUES ('$email','$encryptedPassword')");

                  while($row1 = mysqli_fetch_assoc($result1))
                  {
                      $name = $row1['lecName'];
                      $faculty = $row1['lecFaculty'];
                      $university = $row1['lecUni'];
                  }
                  $confirmCode = rand(111111,999999);

                  mysqli_query($conn, "INSERT INTO user (userID, fullName, position, faculty, activated, confirmCode, userEmail, university, picPath)
                       VALUES ('$userID','$name','Lecturer','$faculty','0','$confirmCode','$email','$university','./images/profileIcon.png')");


                  $mail->Username = "sharetogether2017@gmail.com";
                  $mail->Password = "fyp2017share";

                  $mail->IsHTML(true); // if you are going to send HTML formatted emails
                  $mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

                  $mail->From = "sharetogether2017@gmail.com";
                  $mail->FromName = "Share Together";

                  $mail->addAddress($email,$name);

                  $mail->Subject = "Share Together Confirmation Letter";
                  $mail->Body ="$name,"
                          . " please click the link below to verify your account"
                          // . "\nhttp://sharetogether.16mb.com/emailconfirm.php?userID=$userID&code=$confirmCode";;
                          . "\nhttp://localhost/fyp/materialize/emailconfirm.php?userID=$userID&code=$confirmCode";;


                  if(!$mail->Send())
                      echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
                  else
                  {
                    echo "<script>
                    alert('Please check your email to make a confirmation!');
                    window.location.href='index.html';
                    </script>";

                  }

              }else if ($row2 == 1) {

                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_query($conn, "INSERT INTO user_login (userEmail, userPassword) VALUES ('$email','$encryptedPassword')");
                      while($row2 = mysqli_fetch_assoc($result2))
                      {
                          $name = $row2['sName'];
                          $faculty = $row2['sFaculty'];
                          $university1 = $row2['sUni'];
                      }
                      $confirmCode = rand(111111,999999);

                      mysqli_query($conn, "INSERT INTO user (userID, fullName, position, faculty, activated, confirmCode, userEmail, university, picPath)
                           VALUES ('$userID','$name','Student','$faculty','0','$confirmCode','$email','$university1','./images/profileIcon.png')");


                      $mail->Username = "sharetogether2017@gmail.com";
                      $mail->Password = "fyp2017share";

                      $mail->IsHTML(true); // if you are going to send HTML formatted emails
                      $mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

                      $mail->From = "sharetogether2017@gmail.com";
                      $mail->FromName = "Share Together";

                      $mail->addAddress($email,$name);

                      $mail->Subject = "Share Together Confirmation Letter";
                      $mail->Body ="$name,"
                              . " please click the link below to verify your account"
                              // . "\nhttp://sharetogether.16mb.com/emailconfirm.php?userID=$userID&code=$confirmCode";;
                              . "\nhttp://localhost/fyp/materialize/emailconfirm.php?userID=$userID&code=$confirmCode";;

                      if(!$mail->Send())
                          echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
                      else
                      {
                          echo "Message has been sent";
                          echo "<script>
                          alert('Please check your email to make a confirmation!');
                          window.location.href='index.html';
                          </script>";

                      }
              }else{
                echo "<script>
                alert('UserID is not exist');
                window.location.href='index.html';
                </script>";

              }



    }else{

              echo "<script>
              alert('User ID is registered.');
              window.location.href='index.html';
              </script>";


      }

    }else {
      echo "<script>
      alert('Email is registered by other ID.');
      window.location.href='index.html';
      </script>";
    }


    }





    mysqli_close($connU);
}

 ?>
