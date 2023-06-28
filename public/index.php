<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

<?php include "../src/functions.php";

if (isset($_SESSION['USER'])) {

    $session = $_SESSION['USER'];
    date_default_timezone_set("Europe/Vienna");
    $time = date("H:i:s");
    if ($time >= '22:00:00' && $time <= '23:59:59' || $time >= '00:00:00' && $time <= '05:00:00') {
        $message = 'Late night session,';
    }

    if ($time >= '05:00:01' && $time <= '10:59:59') {
        $message = 'God morgen,';
    }

    if ($time >= '11:00:00' && $time <= '11:59:59' || $time >= '12:00:00' && $time <= '12:59:59') {
        $message = 'Måltid,';
    }

    if ($time >= '13:00:00' && $time <= '17:59:59') {
        $message = 'Hei Hei,';
    }

    if ($time >= '18:00:00' && $time <= '21:59:59') {
        $message = 'God kveld,';
    }
} else {
    $message = '';
}

if (isset($_GET['message'])) {
    $code = $_GET['message'];
}


if (isset($_GET['id'])) {
    $seeYouId = $_GET['id'];
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Warm up!</title>
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!-- INDIVIDUAL GREETINGS ON MAINPAGE -->

<div class="welcome">
    <?php if (isset($code)) {
        if ($code == 'fromMap') { ?>
            <h1>Did you find a cool spot, <?php echo $session ?> ?</h1> <?php } ?>
        <?php if ($code == 'fromAddMarker') { ?>
            <h1>Not sure yet what to upload, <?php echo $session ?> ?</h1><br>
            <h2> .. no hurries 😇 </h2> <?php } ?>

        <?php if ($code == 'fromAbout') { ?>
            <h1>Now that you know more, shall we get started?</h1><br>
        <?php } ?>

        <?php if ($code == 'fromPhotoView') { ?>
            <h1>Did you like that one, <?php echo $_SESSION['USER'] ?>? </h1><br>
        <?php } ?>
        <?php if ($code == 'fromwhatisthis') { ?>
            <h1>Now you know it all, let's get started!</h1><br>
        <?php } ?>

        <?php if ($code == 'messageSent') { ?>
            <h1>I received your ✉️, i will try to answer shortly!</h1><br>
        <?php } ?>

        <?php if ($code == 'fromAddMarkerNotLoggedIn') { ?>
            <h1>You might not go there yet, instead try to register!</h1><br>
        <?php } ?>

        <?php if ($code == 'fromContact') { ?>
            <h1>Or don't text me, that's also okay! 😚</h1><br>
        <?php } ?>

        <?php if ($code == 'fromDetails') { ?>
            <h1>Already finished exploring the north?</h1><br>
        <?php } ?>
        <?php if ($code == 'fromLogout') { ?>
            <h1>See you soon, <?php echo $seeYouId ?> !</h1><br>
            <h2> .. i already miss you 🥺 </h2> <?php } ?>

        <?php if ($code == 'uploadSuccess') { ?>
            <h1>Thank you for your contribution to Norvi, <?php echo $_SESSION['USER'] ?> !</h1><br> <?php } ?>

        <?php if ($code == 'fromLogin') { ?>
            <h1>One day you can do it, stranger.</h1>



</div>
<div style="display:flex; justify-content:center; align-content:center; margin-top: 4vh;  "> <a href="../auth/login.php?message=Are you sure? 😋" class="loginButton">I am ready now!</a>
</div>
<?php } ?>
<?php if ($code == 'fromRegister') { ?>
    <h1>Well... warm up and try again.</h1>

    </div>
    <div style="display:flex; justify-content:center; align-content:center; margin-top: 4vh;  "> <a href="../auth/register.php" class="loginButton">Ok, but now i am ready!</a>
    </div>
<?php } ?>

<?php } else {
?>

    <?php if (!isset($_SESSION['USER']) && (!isset($code))) { ?>

        <h1> Welcome to </h1> <img src="../img/norvi_single.png" height="50px"> <br>
        <h2>Please, enjoy the campfire ! </h2><?php } else { ?>
        <h1><?php echo $message . ' ' . $session ?> <?php if ($message == 'Late night session,') { ?> ? <?php } else { ?> !<?php } ?> </h1> <br>
        <h2>Please,<?php if ($message == 'Late night session,') { ?> warm up at <?php } else { ?> enjoy<?php } ?> the campfire ! </h2>
<?php }
                                        } ?>


</div>
<div class="overall">

    <div class="container">
        <div class="flame" id="flame-2"></div>
        <div class="flame" id="flame-1"></div>
        <div class="flame" id="flame-3"></div>
        <div class="small-element" id="small-element-1"></div>
        <div class="small-element" id="small-element-2"></div>
        <div class="fire-bottom">
            <div class="main-fire"></div>
        </div>
        <div class="wood" id="wood-1"></div>
        <div class="wood" id="wood-2"></div>
    </div>
    <div class="orLogin">
        <?php

        if (isset($seeYouId)) { ?>
            <p style="font-size:24px; font-weight:1000;"> ... yet the fire continues to burn ... </p>
            <p>
                <a href="../auth/login.php" class="loginButton2">Login</a>
            </p>
    </div>

    <?php } else {
            if (!isset($_SESSION['USER'])) { ?>


        <p>
            <a href="../auth/login.php" class="loginButton2">Login</a>
        </p>
    </div>
<?php } else { ?>


    <p>

        <a href="../map/map.php" class="loginButton2">Explore</a>

    </p>

    </div>

<?php }
        } ?>

<div class="bottom">
    <div class="lowerButton">
        <a href="../public/whatisthis.php" class="loginButton">WTH is this?</a>
    </div>
    <div class="lowerButton">
        <a href="../public/contact.php" class="loginButton">Text me!</a>
    </div>
    <div class="lowerButton">
        <a href="../public/about.php" class="loginButton">About..</a>
    </div>
    <?php if (isset($_SESSION['USER'])) { ?>
        <div class="lowerButton">
            <a href="../auth/logout.php" class="loginButton">Logout</a>
        </div>
    <?php } ?>
</div>
</div>

</body>

</html>
