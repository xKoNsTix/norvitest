<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

<?php
error_reporting(E_ERROR | E_PARSE);


include "../src/functions.php";
if (isset($_SESSION['USER'])) { // wenn nicht eingeloggt, tschüss
    $username = $_SESSION['USER'];
} else {
    header('location:../public/index.php?message=fromAddMarkerNotLoggedIn');
}

if (isset($_GET['path'])) {
    $path = ($_GET['path']);
    //header("Location: ../auth/login.php?message=$path");
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['coordinates'])) {

    $motiveCoordinates = $_GET['coordinates'];
}

$section;
$key;
$section;

$exif = exif_read_data($path, 0, true);
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
    }
}
if (isset($exif["IFD0"]["Make"])) {

    $brand = $exif["IFD0"]["Make"];
} else {
    $brand = 'Not available';
}
if (isset($exif["IFD0"]["Model"])) {


    $camera = $exif["IFD0"]["Model"];
} else {
    $camera = 'Not available';
}

if (isset($exif["COMPUTED"]["ApertureFNumber"])) {
    $aperture = $exif["COMPUTED"]["ApertureFNumber"];
} else {
    $aperture = 'Not available';
}

if (isset($exif["EXIF"]["ExposureTime"])) {

    $shutter_speed = $exif["EXIF"]["ExposureTime"];
} else {
    $shutter_speed = 'Not available';
}

if (isset($exif["EXIF"]["ISOSpeedRatings"])) {
    $iso = $exif["EXIF"]["ISOSpeedRatings"];
} else {
    $iso = 'Not available';
}

if (isset($exif["EXIF"]["FocalLength"])) {
    $focal_length = $exif["EXIF"]["FocalLength"];
} else {
    $focal_length = 'Not available';
}
//check how many likes
$sth = $dbh->prepare("SELECT COUNT (*) as counter FROM likes where fk_image_id = ? ");
$sth->execute(array($id));
$result = $sth->fetch();
$likeCount = $result->counter;


//check if logged in user already liked
$sth = $dbh->prepare("SELECT COUNT (*) as counter FROM likes where fk_image_id = ? and fk_image_owner = ?");
$sth->execute(array($id, $username));
$result = $sth->fetch();
$userLiked = $result->counter;


$path = rawurldecode($path);
$pathback = rawurlencode($path);
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="http://livejs.com/live.js">
    </script> <!-- insane epic script so you can see css changes live 🤩 -->
    <link rel="stylesheet" href="displayphoto.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <title>Display</title>
</head>

<body>


    <div class="overall">


        <div class="top">
            <div class="topbuttons">
                <a href=" ../public/index.php?message=fromPhotoView" class="loginButton">🔥</a>
            </div>
            <div class="topbuttons">
                <a href="../map/map.php?&id=<?php echo $id ?>&coordinates=<?php echo $motiveCoordinates ?>" class="loginButton">🗺</a>
            </div>
            <div class="topbuttons">
                <a href="../displayphotos/display.php?id=<?php echo $id ?>" class="loginButton">🔙</a>
            </div>
        </div>
        <div class="boxes">
            <div class="top2">

                <div class="topbuttons">
                    <a href=" ../public/index.php?message=fromPhotoView" class="loginButton">🔥</a>
                </div>
                <div class="topbuttons">
                    <a href="../map/map.php?&id=<?php echo $id ?>&coordinates=<?php echo $motiveCoordinates ?>" class="loginButton">🗺</a>
                </div>
                <div class="topbuttons">
                    <a href="../displayphotos/display.php?id=<?php echo $id ?>" class="loginButton">🔙</a>
                </div>
            </div>
            <div class="container">


                <div class="content">



                    <form method=POST>
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">
                                    Shutterspeed:
                                </span>
                                <span id="shutter"><?php echo $shutter_speed ?></span>

                            </div>
                            <div class="input-box">
                                <span class="details">
                                    Aperture:
                                </span>
                                <span class="details"><?php echo $aperture ?></span>
                            </div>

                            <div class="input-box">
                                <span class="details">
                                    Focal length:
                                </span>
                                <span class="details"><?php echo $focal_length ?></span>
                            </div>
                            <div class="input-box">
                                <span class="details">
                                    ISO:
                                </span>
                                <span class="details"><?php echo $iso ?></span>
                            </div>

                            <div class="input-box">
                                <span class="details">
                                    Camera Model:
                                </span>
                                <span class="details"><?php echo $brand . ' - ' . $camera ?></span>
                            </div>
                            <div class="topbuttons2" style="margin-left:-2em; border-color: #048084;
    border-width: 1px;">

                                <a href="addLike.php?id=<?php echo $id ?>&path=<?php echo $pathback ?>&coordinates=<?php echo $motiveCoordinates ?>" class="loginButton"><?php if ($likeCount > 0) {

                                                                                                                                                                            ?><img src="../img/icons/heartfull.png" style="height: 30px"></a> <?php
                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                if ($likecount != 0) {
                                                                                                                                                                                                                                                    echo $likeCount;
                                                                                                                                                                                                                                                } ?><img src="../img/icons/heartempty.png" style="height: 30px"></a> <?php
                                                                                                                                                                                                                                                                                                                    } ?>

                            </div>
                            
                                <h3> Likes gained: <?php echo $likeCount ?> </h3>
                            
                        </div>
                    </form>
                </div>
            </div>


            <div id="picture">

                <!--HELP! CANNOT GET THIS VALID IN W3 VALIDATOR!! i have to access the file's real name to actually get it... please feedback -->
                <a href="#img">
                    <img src="<?php echo $path ?>" class="thumbnail" alt="<?php echo $path ?>">
                </a>
                <!-- full size -->
                <a href=" #_" class="lightbox" id="img">
                    <img src="<?php echo $path ?>" alt="<?php echo $path ?>">
                </a>
            </div>
        </div>
    </div>





</body>

</html>