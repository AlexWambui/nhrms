<?php
// ini_set('SMTP','myserver');
// ini_set('smtp_port',25);
// $to = "alexdequantes@gmail.com";
// $headers  = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
// $headers  .= "From: NO-REPLY<no-reply@mydomain.com>" . "\r\n";
// $subject = "Confirmation For Request";
// $message = 'ho';
// if(mail($to, $subject, $message, $headers)){
//     echo "email sent to $to";
// }else{
//     echo "not sent hommie";
// }

// $to = "eulexkienjeku@gmail.com";
// $subject = "My subject";
// $message = "Hello world!";
// // $headers = "From: alexwambuik@gmail.com" . "\r\n" .
// // "CC: eulexkienjeku@gmail.com";
// $header = "From : alexwambuik@gmail.com";
// if(mail($to,$subject,$message,$header)){
//     echo "email sent to $to";
// }else{
//     echo "not sent";
// }

// require '../../PHPMailer-master/src/PHPMailer.php';
// $mail = new PHPMailer;
// $mail->isSMTP();
// $mail->SMTPSecure = 'ssl';
// $mail->SMTPAuth = true;
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = 465;
// $mail->Username = 'alexwambuik@gmail.com';
// $mail->Password = 'MercyWanjiku46...';
// $mail->setFrom('alexwambuik@email-address.com');
// $mail->addAddress('alexdequantes@email-address.com');
// $mail->Subject = 'Hello from PHPMailer!';
// $mail->Body = 'This is a test.';
// //send the message, check for errors
// if (!$mail->send()) {
//     echo "ERROR: " . $mail->ErrorInfo;
// } else {
//     echo "SUCCESS";
// }

$to = "alexdequantes@gmail.com";
$subject = 'Test Mail';
$message = "Hello There \n\n This is my first email";
$header = "From : alexwambuik@gmail.com";
$mail_sent = mail($to, $subject, $message, $header);
if($mail_sent == true){
    echo "mail sent";
}else{
    echo "not sent";
}