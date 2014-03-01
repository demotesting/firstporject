<?php
//phpinfo();

$to      = 'demotesting92@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: demotesting91@gmail.com' . "\r\n" .
    'Reply-To: demotesting91@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
