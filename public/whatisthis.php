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

    <title>WTH</title>
    <link rel="stylesheet" href="aboutstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h1> This is </h1><br>
            <img src="../img/norvi_single.png" height="70" style="margin-bottom:4vh;" alt="logo">
            <h2>an MMP1 Project </h2>
            <h3>by Konstantin Kowarsch</h3>
            <h4>Salzburg University of Applied Sciences</h4><br> <br> <br>
        </div>

        <div class="text">


            <p> People often asked me questions like: "Oh wow, where did you take this photo", or "I haven´t seen this motive from this angle." </p><br>
            <p> Norvi makes these questions obsolete. Whether you´re an ongoing professional photographer, or just a road-tripper, norvi will be there for you! </p><br>
            <p> Check out the markers on the map and see how the photo was created.</p>



        </div>

        <div class="center">
            <a href=" ../public/index.php?message=fromwhatisthis" class="loginButton" style="align-content: center; width:80%;">Back to the camp, pls!</a>

        </div>
    </div>

</body>

</html>