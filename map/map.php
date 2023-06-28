<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->
<?php
session_start();
include "../src/functions.php";

if (isset($_SESSION['USER'])) { // wenn nicht eingeloggt, tschüss
    $username = $_SESSION['USER'];
} else {
    header('location:../public/index.php?message=fromAddMarkerNotLoggedIn');
}

if (isset($_GET['id'])) {
    $idx = $_GET['id'];
}

if (isset($_GET['coordinates'])) {
    $coordinates = $_GET['coordinates'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="http://livejs.com/live.js"></script>
    <script type="text/javascript" src="getCustomIcons.js"></script>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="stylesheet.css" />
    <title>Exploring...</title>
    <script>

    </script>
    <style>
        #map {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
</head>


<body>

    <div class="mapMenu">
        <div class="menuItem">
            <a href="../public/index.php?message=fromMap" class="loginButton">🔥</a>
            <a href="../map/addMarker.php" class="loginButton">✚</a>


            <!-- <a href="../auth/login.php" class="loginButton">🔳</a> -->
            <!-- DARKMODE TOGGLE FOR LATER -->

        </div>
        <div class="menuItem2" style="display:flex; flex-direction:column; font-size: 12px;">
            <img src="../img/icons/landScapeIcon.png" height="65" alt="landscapeicon">Landscape <br><br>
            <img src="../img/icons/seaScapeIcon.png" height="65" alt="seacapeicon">Seascape <br><br>
            <img src="../img/icons/urbanIcon.png" height="65" alt="urbanicon">Urban<br><br>
            <img src="../img/icons/wildlifeIcon.png" height="65" alt="wildlife">Wildlife <br><br>
            <img src="../img/icons/epicIcon.png" height="65" alt="epicIcon">Epic <br><br>
            <img src="../img/icons/mountainIcon.png" height="65" alt="mountainIcon">Mountain <br><br>
            <img src="../img/icons/vikingIcon.png" height="65" alt="vikingIcon">Viking <br><br>
        </div>
    </div>
    <?php


    // --------- GET DB COUNT FOR FOR LOOP ----------
    $sth = $dbh->query("SELECT * FROM images");
    $result = $sth->fetchAll();

    // --------- GET CREATOR COORDINATES ----------


    // --------- GET MOTIVE COORDINATES ----------
    // $sth = $dbh->query("select motive_coordinates from images;");
    // $creatorCoordinates = $sth->fetchAll(PDO::FETCH_COLUMN, 0);

    ?>
    <div id="map">
        <a href="https://www.maptiler.com" style="position:absolute;left:10px;bottom:10px;z-index:999;"><img src="https://api.maptiler.com/resources/logo.svg" alt="MapTiler logo"></a>
        <p><a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a></p>

    </div>



    <script>
        //var map = L.map('map').setView([47.941923, 13.218077], 13);

        <?php if (isset($idx)) { ?>
            var map = L.map('map').setView([<?php echo $coordinates ?>], 10);
        <?php } else { ?>
            var map = L.map('map').setView([65.8689775658954, 15.470669603211947], 4);
            map.flyTo([65.8689775658954, 15.470669603211947], 5);
        <?php } ?>
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
        var marker;
    </script>
    <?php
    foreach ($result as $results) {
        $creatorCoordinates = $results->creator_coordinates;
        $motiveCoordinates = $results->motive_coordinates;
        $fileName = $results->file_name;
        $imageTitle = $results->image_title;
        $filename = $results->file_name;
        $userName = $results->image_owner;
        $path = "../img/{$userName}/$filename";
        $photoId = $results->image_id;
        $location_type = $results->location_type;
        // header("Location: ../auth/login.php?message= $location_type");



    ?>


        <script>
            var epicIcon = L.icon({
                iconUrl: '../img/icons/epicIcon.png',


                iconSize: [50, 50], // size of the icon

                iconAnchor: [25, 50], // point of the icon which will correspond to marker's location

                popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
            });
            var mountainIcon = L.icon({
                iconUrl: '../img/icons/mountainIcon.png',


                iconSize: [50, 50], // size of the icon

                iconAnchor: [25, 50], // point of the icon which will correspond to marker's location

                popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
            });
            var wildLifeIcon = L.icon({
                iconUrl: '../img/icons/wildlifeIcon.png',


                iconSize: [60, 60], // size of the icon

                iconAnchor: [30, 60], // point of the icon which will correspond to marker's location

                popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
            });

            var landScapeIcon = L.icon({
                iconUrl: '../img/icons/landScapeIcon.png',


                iconSize: [50, 50], // size of the icon

                iconAnchor: [25, 50], // point of the icon which will correspond to marker's location

                popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
            });

            var vikingIcon = L.icon({
                iconUrl: '../img/icons/vikingIcon.png',


                iconSize: [60, 60], // size of the icon

                iconAnchor: [30, 60], // point of the icon which will correspond to marker's location

                popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
            });

            var urbanIcon = L.icon({
                iconUrl: '../img/icons/urbanIcon.png',


                iconSize: [60, 60], // size of the icon

                iconAnchor: [30, 60], // point of the icon which will correspond to marker's location

                popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
            });





            var seaScapeIcon = L.icon({
                iconUrl: '../img/icons/seaScapeIcon.png',


                iconSize: [50, 50], // size of the icon

                iconAnchor: [25, 50], // point of the icon which will correspond to marker's location

                popupAnchor: [25, 0] // point from which the popup should open relative to the iconAnchor
            });






            <?php if ($location_type == 'Landmark') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: landScapeIcon,

                    })

                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" /a>')
            <?php } ?>
            <?php if ($location_type == 'Wildlife') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: wildLifeIcon,

                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" /a>')
            <?php } ?>
            <?php if ($location_type == 'Viking') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: vikingIcon,

                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" />')
            <?php } ?>
            <?php if ($location_type == 'Landscape') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: landScapeIcon,

                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" />')
            <?php } ?>
            <?php if ($location_type == 'Mountain') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: mountainIcon,

                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" />')
            <?php } ?>

            <?php if ($location_type == 'Epic') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: epicIcon,

                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" />')
            <?php } ?>

            <?php if ($location_type == 'Seascape') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: seaScapeIcon,

                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" />')
            <?php } ?>

            <?php if ($location_type == 'Urban') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,
                        icon: urbanIcon,

                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" />')
            <?php } ?>

            <?php if ($location_type == '') { ?>
                marker = L.marker([<?php echo $motiveCoordinates ?>], {
                        title: "<?php echo $imageTitle; ?>",
                        opacity: 0.9,


                    })
                    .addTo(map)
                    .bindPopup('<h2> <?php echo $imageTitle ?> </h2> <a href="../displayphotos/display.php?id=<?php echo $photoId ?>"> <img src="<?php echo $path ?>" height="100px" style ="align-text:center" />')
            <?php } ?>
        </script>

    <?php } ?>



</body>

</html>