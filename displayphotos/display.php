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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sth = $dbh->prepare("SELECT * FROM images WHERE image_id = ?");
$sth->execute(array($id));
$results = $sth->fetch();


$creatorCoordinates = $results->creator_coordinates;
$motiveCoordinates = $results->motive_coordinates;
$fileName = $results->file_name;
$imageTitle = $results->image_title;
$filename = $results->file_name;
$userName = $results->image_owner;
$newFileName = rawurlencode($filename);
$path = "../img/{$userName}/$newFileName";
$photoId = $results->image_id;
$nd = $results->nd_filter_used;
$cpol = $results->cpol_used;
$info = $results->additional_information;
$loc = $results->location_type;

//header("Location: ../auth/login.php?message=$path");

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="http://livejs.com/live.js"></script> <!-- insane epic script so you can see css changes live 🤩 -->
    <link rel="stylesheet" href="display.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <title> Details </title>
</head>

<body>
    <div class="overall">


        <div class="top">
            <div class="topbuttons">
                <a href=" ../public/index.php?message=fromDetails" class="loginButton">🔥</a>
            </div>
            <div class="topbuttons">
                <a href="../map/map.php?&id=<?php echo $id ?>&coordinates=<?php echo $motiveCoordinates ?>" class="loginButton">🗺</a>
            </div>
            <div class="topbuttons">
                <a href="../displayphotos/displayphoto.php?path=<?php echo $path ?>&id=<?php echo $id ?>&coordinates=<?php echo $motiveCoordinates ?>" class="loginButton">📸</a>
            </div>
        </div>
        <div class="boxes">
            <div class="top2">
                <div class="topbuttons">
                    <a href=" ../public/index.php?message=fromDetails" class="loginButton">🔥</a>
                </div>
                <div class="topbuttons">
                    <a href="../map/map.php?&id=<?php echo $id ?>&coordinates=<?php echo $motiveCoordinates ?>" class="loginButton">🗺</a>
                </div>
                <div class="topbuttons">
                    <a href="../displayphotos/displayphoto.php?path=<?php echo $path ?>&id=<?php echo $id ?>" class="loginButton">📸</a>
                </div>
            </div>
            <div class="container">


                <div class="content">



                    <form action="" method=POST>
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">
                                    <h3>Title of Image:</h3>
                                </span>
                                <span class="details"><?php echo $imageTitle ?></span>

                            </div>
                            <div class="input-box">
                                <span class="details">
                                    <h3>Uploaded by:</h3>
                                </span>
                                <span class="details"><?php echo $userName ?></span>
                            </div>

                            <div class="input-box">
                                <span class="details">
                                    <h3>Creators Location:</h3>
                                </span>
                                <span class="details"><?php echo substr($creatorCoordinates, 0, 33) ?></span>
                            </div>
                            <div class="input-box">
                                <span class="details">
                                    <h3>Motive Location: </h3>
                                </span>
                                <span class="details"><?php echo substr($motiveCoordinates, 0, 33) ?></span>
                            </div>

                            <div class="input-box">
                                <span class="details">
                                    <h3>ND-Filter used:</h3>
                                </span>
                                <span class="details"><?php echo $nd ?></span>
                            </div>

                            <div class="input-box">
                                <span class="details">
                                    <h3>CPOL Filter used:</h3>
                                </span>
                                <span class="details"><?php echo $cpol ?></span>
                            </div>

                            <div class="input-box">
                                <span class="details">
                                    <h3>Additional Information:</h3>
                                </span>
                                <span class="details"><?php echo $info ?></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div id="map">


                <script>
                    //var map = L.map('map').setView([47.941923, 13.218077], 13);
                    var map = L.map('map').setView([<?php echo $motiveCoordinates ?>], 10);

                    map.flyTo([<?php echo $motiveCoordinates ?>], 14);
                    L.tileLayer(
                        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieGtvbnN0aXgiLCJhIjoiY2wyeG16bGk4MGx2YzNqbnQwN3l6eW9kNSJ9.u5ieRJz2r4Xir0OMfub2Ag', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            maxZoom: 18,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'your.mapbox.access.token'
                        }).addTo(map);
                </script>
                <script>
                    var CameraIcon = L.icon({
                        iconUrl: '../img/icons/cameraicon.png',


                        iconSize: [30, 25], // size of the icon

                        iconAnchor: [15, 15], // point of the icon which will correspond to marker's location

                        popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
                    });

                    var MotiveIcon = L.icon({
                        iconUrl: '../img/icons/motiveIcon.png',


                        iconSize: [50, 50], // size of the icon

                        iconAnchor: [25, 24], // point of the icon which will correspond to marker's location

                        popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
                    });
                    var marker;
                    var marker2;

                    var marker1 = L.marker([<?php echo $motiveCoordinates ?>], {
                        icon: MotiveIcon
                    });
                    marker1.addTo(map)

                    marker1.bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/displayphoto.php?path=<?php echo $path ?>&id=<?php echo $id ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" /a>');

                    var marker2 = L.marker([<?php echo $creatorCoordinates ?>], {
                        icon: CameraIcon
                    });
                    marker2.addTo(map)
                    marker2.bindPopup('Photographer`s Location');

                    var latlngs = Array();

                    //Get latlng from first marker
                    latlngs.push(marker1.getLatLng());

                    //Get latlng from first marker
                    latlngs.push(marker2.getLatLng());

                    //You can just keep adding markers

                    //From documentation http://leafletjs.com/reference.html#polyline
                    // create a CI-colored polyline from an arrays of LatLng points
                    var polyline = L.polyline(latlngs, {
                        color: '#048084'
                    }).addTo(map);

                    // zoom the map to the polyline
                    map.fitBounds(polyline.getBounds());
                </script>

            </div>


        </div>





</body>

</html>