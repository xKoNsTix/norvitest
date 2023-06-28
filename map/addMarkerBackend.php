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






if (isset($_POST['cpol'])) {
    $cp = 'yes';
} else {
    $cp = 'no';
}

$owner = $_SESSION['USER'];


$fileName = $_SESSION['fileName'];


// hole variabeln von der form


$title = $_POST['name'];
$nd = $_POST['nd'];
$mCoordinates = $_POST['motiveCoordinates'];
$pCoordinates = $_POST['photographerCoordinates'];
$weather = $_POST['weather'];
$location = $_POST['location'];
$info = $_POST['information'];






//schreib alles in die datenbank

$sth = $dbh->prepare('INSERT INTO images (image_title, file_name, image_owner, nd_filter_used, motive_coordinates, creator_coordinates, recommended_weather, additional_information, location_type, cpol_used) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
echo "Prepare OK";
$done = $sth->execute(array($title, $fileName, $owner, $nd, $mCoordinates, $pCoordinates, $weather, $info, $location, $cp));
$_SESSION['UPLOAD'] == 0;
header("Location: ../public/index.php?message=uploadSuccess");

