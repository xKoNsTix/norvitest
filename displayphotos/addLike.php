<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

<?php

include "../src/functions.php";

if (isset($_SESSION['USER'])) { // wenn nicht eingeloggt, tschüss
    $username = $_SESSION['USER'];
} else {
    header('location:../public/index.php?message=fromAddMarkerNotLoggedIn');
}

$id = $_GET['id'];
$path = $_GET['path'];
$coord = $_GET['coordinates'];


//likecounter

$sth = $dbh->prepare("SELECT COUNT (*) as counter FROM likes where fk_image_owner = ?  and  fk_image_id = ? ");
$sth->execute(array($username, $id));
$result = $sth->fetch();
$likeCount = $result->counter;



if ($likeCount == 0) {

    $sth1 = $dbh->prepare('INSERT INTO likes (fk_image_owner, fk_image_id) VALUES (?,?)');
    $sth1->execute(array($username, $id));
    header("location:../displayphotos/displayphoto.php?likeadd&id=$id&path=$path&coordinates=$coord");
} else {
    $sth2 = $dbh->prepare("DELETE FROM likes WHERE fk_image_owner = ? and fk_image_id = ?");
    $sth2->execute(array($username, $id));
    header("location:../displayphotos/displayphoto.php?likegone&id=$id&path=$path&coordinates=$coord");
}





//schreib alles in die datenbank
