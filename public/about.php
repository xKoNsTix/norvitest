<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->
<?php include "../src/functions.php"; ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="aboutstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About</title>
</head>

<body>

    <div class="container">
        <div class="MessageWindow">
            <?php if (isset($_GET['message'])) {
                echo $_GET['message'];
            } ?>

        </div>
        <div class="title">
            <h1> </h1> <img src="../img/norvi_single.png" height="75" style="margin-bottom:4vh;" alt="logo">
            <h2>an MMP1 Project </h2>
            <h3>by Konstantin Kowarsch</h3>
            <h4>Salzburg University of Applied Sciences</h4><br> <br> <br>
        </div>

        <div class="text">


            <p> Rightful owner of the 🔥:<a href="https://codepen.io/keshav929/pen/PpEVOv" target="_blank" class="ownerButton">KESHAV KUNDAL</a> </p><br>
            <p> Rightful owner of the 🗺: <a href="https://leafletjs.com/" target="_blank" class="ownerButton">Leaflet</a> </p><br>
            <p> Graphics obtained via <a href="https://support.vecteezy.com/en_us/what-is-a-pro-license-SknqDgswt" target="_blank" class="ownerButton">Vecteezy Pro Licence</a> </p><br>
            <p> <a href="https://www.instagram.com/tokowarenorth/" target="_blank" class="ownerButton">Follow the north</a> </p><br>
            <p> <a href="https://www.etsy.com/shop/TokoWareNorth" target="_blank" class="ownerButton">Nordic Shopping</a> </p><br>
            <p> All 📸 are taken by me (currently).</p><br>



        </div>

        <a href="../public/index.php?message=fromAbout" class="loginButton" style="align-content: center; width:80%;">Back to the camp, pls!</a>

    </div>


</body>

</html>