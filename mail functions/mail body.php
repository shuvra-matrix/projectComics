<?php
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = "";
$mail->Password = "";
$mail->setFrom("shuvratcp@gmail.com");
?>
