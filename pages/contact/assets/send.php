<?php
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtMessage = $_POST['txtMessage'];

$from= "eric@ericbeltran.com";
$to = "eric@ericbeltran.com";
$subject = "design request";
$message = "Name: " . $txtName;
$message .= "\nEmail: " . $txtEmail;
$message .= "\n\nMessage: " . $txtMessage;
$headers = "From: ericbeltran.com";
$headers .= "\nReply-To: $txtEmail";

$sentOk = mail ($to,$subject,$message,$headers);
echo "sentOk=" . $sentOk;
?>
