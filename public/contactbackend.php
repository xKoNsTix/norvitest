
<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->
<?php

$message = $_POST['message'];
$subject = $_POST['subject'];
$email = $_POST['email'];




$headers = "From: contactform@norvi.com \r\n";
$headers .= "MIME-Version: 1.0" . "r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "r\n";

mail('konstantin.kowarsch@gmail.com', $subject, $message, $headers);

header('location:../public/index.php?message=messageSent');
