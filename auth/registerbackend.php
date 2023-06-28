<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->



<?php

include "../src/functions.php";

session_start();










$name = $_POST['name'];
$user = $_POST['user'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];



// echo "Beginning!" . " ";
// echo $name . " ";
// echo $user . " ";
// echo $email . " ";
// echo $password1 . " ";
if (($password1 == $password2)) {

    //------------- EMAIL -------------


    $sth = $dbh->prepare("SELECT COUNT (*) as anzahl FROM users WHERE email = ? ");
    $sth->execute(array($email));
    $count = $sth->fetch();
    $isEmail = $count->anzahl;
    echo ("Email cnt is" . $isEmail);


    if ($isEmail < 1) { // email passt

        // ------------ USER -------------

        $sth = $dbh->prepare("SELECT COUNT (*) as anzahl FROM users WHERE username = ? ");
        $sth->execute(array($user));
        $count = $sth->fetch();
        $isUser = $count->anzahl;
        echo ("User cnt is" . $isUser);
        if ($isUser < 1) { //username

            // ------------ Write -------------

            $newPw = password_hash($password1, PASSWORD_DEFAULT);
            $vkey = md5(time() . $user);

            $sth1 = $dbh->prepare('INSERT INTO users (name, username, email, password, vkey) VALUES (?, ?, ?, ?, ?)');
            echo "Prepare OK";
            $done = $sth1->execute(array($name, $user, $email, $newPw, $vkey));

            // ------------ EMAIL VERIFICATION -------------           
            echo "done";



            $to = $email;
            $subject = "Welcome to Norvi!";
            $message = " Thank you for using Norvi. Please klick the link below to confirm your account: <br>
                            <a href='https://users.multimediatechnology.at/~fhs44559/MMP1/auth/verify.php?vkey=$vkey'> Verify Account </a>";
            $headers = "From: norvi@tokowa.at \r\n";
            $headers .= "MIME-Version: 1.0" . "r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "r\n";

            mail($to, $subject, $message, $headers);

            header('location:login.php?message= Success! ⚔️ Now raid your mails for the activation link! ⚔️');



            //  header("Location: login.php?message=Account successfully created!");
        } else {
            header("Location: register.php?message=Username is already taken!");
        }
    } else {
        header("Location: register.php?message=email is already registered!");

        echo "Email is already registered";
    }
} else {
    header("Location: register.php?message=Password is not the same!");
}
