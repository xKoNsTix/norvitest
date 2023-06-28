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

if (isset($_GET['fileName'])) {

    $_SESSION['fileName'] = $_GET['fileName'];
}
if(isset($_SESSION['UPLOAD'])){
$_SESSION['UPLOAD'] = $_SESSION['UPLOAD'] + 1;}
else {$_SESSION['UPLOAD'] =0;}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="http://livejs.com/live.js"></script> <!-- insane epic script so you can see css changes live 🤩 -->
    <link rel="stylesheet" href="addMarkerStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <title>Add new</title>
</head>

<body>
    <div class="boxes">
        <div class="top">
            <div class="topbuttons">
                <a href=" ../public/index.php?message=fromAddMarker" class="loginButton">🔥</a>
            </div>
            <div class="topbuttons">
                <a href="../map/map.php" class="loginButton">🗺</a>
            </div>
            <div class="topbuttons">
                <a href="../map/help.php" class="loginButton">⁉️</a>
            </div>
        </div>

        <div class="containermap">

            <div id="map">




                <script>
                    //var map = L.map('map').setView([47.941923, 13.218077], 13);
                    var map = L.map('map').setView([61.058512, 8.378414], 4);

                    // map.flyTo([61.058512, 8.378414], 6);
                    L.tileLayer(
                        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieGtvbnN0aXgiLCJhIjoiY2wyeG16bGk4MGx2YzNqbnQwN3l6eW9kNSJ9.u5ieRJz2r4Xir0OMfub2Ag', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            maxZoom: 18,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'your.mapbox.access.token'
                        }).addTo(map);


                    var theMarker = {};

                    map.on('click', function(e) {
                        lat = e.latlng.lat;
                        lon = e.latlng.lng;

                        console.log("You clicked the map at LAT: " + lat + " and LONG: " + lon);
                        //Clear existing marker, 

                        if (theMarker != undefined) {
                            map.removeLayer(theMarker);
                        };

                        //Add a marker to show where you clicked.
                        theMarker = L.marker([lat, lon]).addTo(map).bindPopup(lat + ',' + lon + '  ' + '<button onclick="myFunction()">  Copy</button>').openPopup()
                    });
                </script>
            </div>
        </div>

        <div class="container">
            <div class="MessageWindow">
                <?php if (isset($_GET['message'])) {
                    echo $_GET['message'];
                } ?>

            </div>
            <!-- <div class="title">Add a marker</div> -->
            <div class="content">

                <div>
                    <?php if ($_SESSION['UPLOAD'] != 1) { ?>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            Select image to upload:
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">

                        </form>
                    <?php } ?>
                </div>
                <?php if (isset($_SESSION['UPLOAD'])) {
                    if ($_SESSION['UPLOAD'] == 1) { ?>

                        <form action="addMarkerBackend.php" method=POST>
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Title of Image</span>
                                    <input type="text" placeholder="Enter the title of motive" name="name" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">ND filter used?</span>
                                    <input type="text" placeholder="f.e. ND 1000, ND32 etc." name="nd" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Motive Coordinates</span>
                                    <input type="text" placeholder="123.123 , 123.123" name="motiveCoordinates" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Photographer´s coordinates</span>
                                    <input type="text" placeholder="123.123 , 123.123" name="photographerCoordinates" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Recommended Weather</span>
                                    <input type="text" placeholder="Recommended Weather" name="weather" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Additional Information</span>
                                    <input type="text" placeholder="Additional Information" name="information" required>
                                </div>
                            </div>
                            <div style="display:inline-block">
                                <label for="cpol"> Polarisation Filter used?</label><br>
                                <input type="checkbox" id="cpol" name="cpol" value="cpol">

                            </div>
                            <div class="user-details">
                                <label for="location">Choose Location Type</label>
                                <select name="location" id="location">
                                    <option value="">-default-</option>
                                    <option value="Epic">Epic</option>
                                    <option value="Mountain">Mountain</option>
                                    <option value="Wildlife">Wildlife</option>
                                    <option value="Landscape">Landscape</option>
                                    <option value="Viking">Viking</option>
                                    <option value="Seascape">Seascape</option>
                                    <option value="Urban">Urban</option>
                                    <!-- ADD HERE for future -->
                                </select>
                            </div>


                            <div class="button">
                                <input type="submit" value="#SENDIT!">

                            </div>
                        </form> <?php  } else if ($_SESSION['UPLOAD'] != 1) { ?>
                        <div class="user-details">
                            <br>
                            <br>
                            <h1> Please choose image to upload first!</h1>
                        </div><?php
                            } ?>
                <?php

                } ?>

            </div>
        </div>

        <script>
            function myFunction() {


                navigator.clipboard.writeText(lat + ',' + lon);

                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
            }
        </script>
</body>

</html>