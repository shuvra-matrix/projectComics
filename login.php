<?php include "templates/database.php"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";
$username= $_GET['username'];
$ciphering = "AES-256-CBC";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$encript_username = openssl_encrypt($username, $ciphering,
    $encryption_key, $options, $encryption_iv);
$token = md5(uniqid($username, true));
$otp = rand(152698,986452);
$if_exist = "SELECT * FROM users WHERE username ='$encript_username'";
$result = mysqli_query($connection,$if_exist);
$row = mysqli_num_rows($result);
if( $row === 0 )
{
    $query = "INSERT INTO users(username,token,sub,otp)";
    $query .= "VALUES ('$encript_username','$token','no','$otp')";
    $results = mysqli_query($connection,$query);
    $mail = new PHPMailer;
    ?>
    <?php include 'mail functions/mail body.php' ?>
    <?php
    $mail->addAddress("$username");
    $mail->addReplyTo("shuvratcp@gmail.com");
    $mail->isHTML(true);
    $mail->Subject = "COMICS";
    $mail->Body = "<h3>Verification Mail</h3><p><em>This is the verification mail to activate you account! Hurry! Click on verification </em></p></nr><h3><a href='https://projectcomics.herokuapp.com/templates/verify.php?username=$username&token=$token'>Verification</a></h3>";

    if (!$mail->send()) { ?>
        <?php include "templates/header.php"; ?>
        <body>
               <h3>Something went wrong!</h3>
        </body>


    <?php }  else { ?>

        <?php include "templates/header.php"; ?>
        <body class="mw">
              <h2 style="color: #2EC486">Verification Link Send to your Email</h2>
        </body>


<?php }
}
else
{
    echo "<h2 style='color: #2EC486'>Verification link already send to your mail. <br> Please check your Inbox or Spam folder</h2> <br> <p style='color: darkblue'>If you want to Unsubscribe Please check your Email</p>";
}

?>
