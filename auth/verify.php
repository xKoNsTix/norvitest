<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

<?php

include "../src/header.php";



if (isset($_GET['vkey'])) {

    $vkey = $_GET['vkey'];


    $sth = $dbh->prepare("SELECT verified, vkey FROM users WHERE verified = FALSE and vkey = ? ");

    $sth->execute(array($vkey));

    $count = $sth->fetch();




    if ($count) {



        $sth = $dbh->prepare("UPDATE users SET verified = 'TRUE' where vkey = ? ");
        $sth->execute(array($vkey));
        header('location:login.php?message= You may log in now 🥰&green=true');
    } else {
        header('location:login.php?message=Something went really, really wrong! 🤯');
    }
}
