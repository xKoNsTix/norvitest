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


$sth = $dbh->prepare("SELECT * from users where username = ?");
$sth->execute(array($username));
$result = $sth->fetchAll(PDO::FETCH_COLUMN, 1); // SO GEHTS!!!
$userName = $result[0];



if (!file_exists("../img/$userName")) {         // erstelle ordner für user falls noch nicht vorhanden
    mkdir("../img/$userName", 0777, true);
}




$target_dir = "../img/$userName/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


echo $target_dir;
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header("Location: addMarker.php?message=File is not an image.");

        $uploadOk = 0;
    }
}
$filename = basename($_FILES["fileToUpload"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {

    header("Location: addMarker.php?message=Sorry, file already exists.");
    $target_file;
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    header("Location: addMarker.php?message=Sorry, file is too big for norvi 🥹");
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    header("Location: addMarker.php?message=😲... this doesn´t look like an image. What r u up to??");
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("Location: addMarker.php?message=Photo was not uploaded!");
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: addMarker.php?message= 🌈 Bifrøst transfer: ✅ &fileName={$filename}");
        $_SESSION['UPLOAD'] = 0;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
