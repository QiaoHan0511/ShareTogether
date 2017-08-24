<?php
 session_start();
 include 'mysql_connect.php';

 require 'PHPMailer-master/PHPMailerAutoload.php';
 $mail = new PHPMailer();
 $mail->IsSMTP();
 $mail->Mailer = 'smtp';
 $mail->SMTPAuth = true;
 $mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
 $mail->Port = 587;
 $mail->SMTPSecure = "tls";

 $errorM = "";

if(isset($_POST['btnforgotPw'])){
 $valid = false;
 $ID = $_POST['ID'];

      $result = mysqli_query($conn,"select userEmail, fullName, confirmCode, activated from user where userID = '$ID'");


      if(mysqli_num_rows($result)==1){
        $valid = true;
        $row = mysqli_fetch_row($result);
        $email = $row[0];
        $name = $row[1];
        $oldConfirmCode = $row[2];
        $activated = $row[3];

        if($activated == 1){
          $confirmCode = rand(111111,999999);
          mysqli_query($conn, "update user set confirmCode='$confirmCode' where userID = '$ID'");

          $mail->Username = "sharetogether2017@gmail.com";
          $mail->Password = "fyp2017share";

          $mail->IsHTML(true); // if you are going to send HTML formatted emails
          $mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

          $mail->From = "sharetogether2017@gmail.com";
          $mail->FromName = "Share Together";

          $mail->addAddress($email,$name);

          $mail->Subject = "Share Together Reset Password Request";
          $mail->Body ="$name"
                  . "Click the link below to reset password"
                  // . "\nhttp://sharetogether.16mb.com/resetPassword.php?userID=$ID&code=$confirmCode";;
                  . "\nhttp://localhost/fyp/materialize/resetPassword.php?userID=$ID&code=$confirmCode";;

          $_SESSION['Email'] = $email;
           $_SESSION['ID'] = $ID;

          if(!$mail->Send())
              echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
          else
          {
            echo "<script>
            alert('Please check your email to reset password.');
            window.location.href='index.html';
            </script>";
          }

        }else {
          echo "<script>
          alert('Please activate your account first.');
          window.location.href='index.html';
          </script>";
        }

      }else {
        echo "<script>
        alert('ID not found!');
        window.location.href='index.html';
        </script>";
      }


    }



  ?>
