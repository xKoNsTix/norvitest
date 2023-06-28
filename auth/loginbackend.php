<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

<?php

include "../src/functions.php";




$username =   $_POST['username'];
$givenPassword = $_POST['password'];

// --- SEARCH FOR USER
$sth = $dbh->prepare("SELECT * from users where username = ?;");
$sth->execute(array($username));
$test = $sth->fetchAll(PDO::FETCH_COLUMN, 4);
$retrieved = $test[0];






if (!$test) {
    header("Location: login.php?message=User does not exist!  ");
} else {
    if (password_verify($givenPassword, $retrieved)) {

        // --- SEARCH FOR USER
        $sth2 = $dbh->prepare("SELECT * from users where username = ?;");
        $sth2->execute(array($username));
        $test2 = $sth2->fetchAll(PDO::FETCH_COLUMN, 6);
        $retrieved2 = $test2[0];

        echo "retrieved: " . $retrieved2;
        // $retrieved = $test[0];
        if ($retrieved2 == TRUE) {

            $_SESSION['USER'] = $username;

            if (isset($_SESSION['USER'])) {


                header("Location: ../public/index.php");
            }
        } else {
            $sth3 = $dbh->prepare("SELECT created_at from users where username = ?;");

            $sth3 = $dbh->prepare("SELECT * from users where username = ?;");
            $sth3->execute(array($username));
            $test3 = $sth3->fetchAll(PDO::FETCH_COLUMN, 7);
            $time = $test3[0];

            $end_date =  $time;
            date_default_timezone_set('Europe/Vienna');
            $now = date('Y-m-d H:i:s');

            $diff = strtotime($now) - strtotime($end_date);
            $fullMinutes = floor(($diff - ($fullDays * 60 * 60 * 24) - ($fullHours * 60 * 60)) / 60);
            $timeLeft = 30 - $fullMinutes;






            header("Location: ../auth/login.php?message= This user has not been verified yet. Please check your Email, it has been sent to you at $time! You have left $timeLeft Minutes!");
        }
    } else {
        echo 'Invalid password.';
        header("Location: login.php?message=Invalid Password");
    }
}
