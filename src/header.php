<?php 
session_start();
include "../src/functions.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Explore now! </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="menuscript.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="../public/stylesheet">
    <style>
        body,
        h1,
        h2 {
            font-family: 'Arimo', sans-serif;
            text-align: justify;
        }
    </style>

</head>

<body>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <section class="top-nav">
        <div class="logo">
            <img src="../img/logo---norvi.png" height="91px" alt="logo" style="padding-left: 10px ;" style="z-index: 100;">
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
<?php if (!isset($_SESSION['USER'])) { ?>        

            <li><a href="../auth/login.php"> Login</li>
            <li><a href="../auth/register.php">Register</a></li>
            <li><a href="contact.php">Contact</li>
            <li><a href="about.php">About</a>
 <?php
} else { ?>
            <li><?php echo "Active User: " . $_SESSION['USER'];?></li>
            <li><a href="../auth/logout.php"> Logout</li>
            <li><a href="../map/map.php">Explore!</a></li>
            <li><a href="../public/contact.php">Contact</li>
            <li><a href="../publuc/about.php">About</a>
        </ul>
    </section>
<?php } ?>


