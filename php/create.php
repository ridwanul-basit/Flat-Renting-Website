
<?php
session_start();
include "database.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

?>
<?php



if (isset(($_POST["Create_account"]))){
    $username=$_POST["name"];
    $fullname=$_POST["fullname"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $nid=$_POST["nid"];
    $password =$_POST["password"];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;     
    $mail->SMTPSecure = 'tls';                              //Enable SMTP authentication
    $mail->Username   = 'suprio362003@gmail.com';                     //SMTP username
    $mail->Password   = 'kacp lyqb vuqw tozx';   
                                //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Encryption SMTP - 465 - Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('suprio362003@gmail.com', 'Webamil');
    $mail->addAddress($email, $fullname);     //Add a recipient

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to The Flat For Rent';
    $mail->Body    = 'Thank You for chosing our Website <b>'.$fullname.'</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $insert = "INSERT INTO `user` (`user_name`,`name`,`phone_number`, `mail`,`address`,`nid`, `password`)
    VALUES ('$username','$fullname','$phone','$email','$address','$nid','$hash_password')";

try{
 if($mail->send()){
 $result = mysqli_query($con,$insert);
 $_SESSION["message"]="Account Created Succesfully";
 header("location:registration.php");
 exit(0);
 }
}

catch(mysqli_sql_exception) {
   $_SESSION["error"]="Could not created the account";
   header("location:registration.php");
   exit(0);
}


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





  }
?>