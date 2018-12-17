<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PHPMailer - SMTP test</title>
</head>
<body>
<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require './PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//PARADEIGMA 1 
//DIMIOURGIA HTML 
/*
$msg = "<html>";
$msg .= "<head>";
$msg .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
$msg .= "</head>";
$msg .= "<body>";
$msg .= "<b>Συγχαρητήρια, <br><br>\n";
$msg .= "Συνολικά έχετε ανεβάσει με επιτυχία ".$subject."<br>\n";
$msg .= "Τα οποία είναι άμεσα διαθέσιμα απο το κανάλι σας προς όλο τον κόσμο.<br><br></b>\n";
$msg .= "Το παραπάνω μήνυμα αποστέλεται κάθε μήνα αυτόματα απο την iarts | RealStatus<br>\n";
$msg .= "</body>";
$msg .= "</html>";
*/


$mail->CharSet = 'UTF-8';

//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.iarts.gr";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "c.heitas@iarts.gr";
//Password to use for SMTP authentication
$mail->Password = "kodikas0";
//Set who the message is to be sent from
$mail->setFrom('c.heitas@iarts.gr', 'Χρήστος Χείτας');
//Set an alternative reply-to address
$mail->addReplyTo('c.heitas@iarts.gr', 'Χρήστος Χείτας');
//Set who the message is to be sent to
$mail->addAddress('e.heitas@iarts.gr', 'Ηλίας Χείτας');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test from iarts ΤΕΣΤ ΕΛΛΗΝΙΚΑ';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//PARADEIGMA 2
//HTML APO ARXEIO 
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

//PARADEIGMA 1
//HTML POU DIMIOURGITHIKE PIO PANW
//$mail->msgHTML($msg);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.gif');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
</body>
</html>
