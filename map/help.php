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

    <link rel="stylesheet" href="../public/aboutstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
</head>

<body>

    <div class="container">
        <div class="MessageWindow">
            <?php if (isset($_GET['message'])) {
                echo $_GET['message'];
            } ?>

        </div>
        <div class="title">
            <br>
            <br>
            <h1> Thank you for contributing to </h1><br>
            <img src="../img/norvi_single.png" height="70" style="margin-bottom:4vh;" alt="logo">
            <h3>here's a little help </h3>

        </div>

        <div class="text">


            <p> First use the upload function at the top to upload your image. Wait for the Bifrøst confirmation. </p><br>
            <p> Once you received the Bifrøst confirmation, Heimdall will take care of your files.</p><br>
            <p> But, Heimdall also needs some more information, so please fill in the form accordingly. You can also click into the map to get the coordinates of your desired location.</p><br>
            <p> Please note: Currently, you can only use midgardian locations due to physical restrictions of the internet </p>



        </div>

        <div class="center">
            <a href="addMarker.php" class="loginButton" style="align-content: center; width:10vh; margin-bottom:5em;">🔙</a>

        </div>
    </div>

</body>

</html>