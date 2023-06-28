<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->


<?php
session_start();
$userName = urlencode($_SESSION['USER']);
// Löschen aller Session-Variablen.
$_SESSION = array();

// Löscht das Session-Cookie.
if (isset($_COOKIE[session_name()])) {
    setcookie(
        session_name(),  // Cookie-Name war gleich Name der Session 
        '',             // Cookie-Daten. Achtung! Leerer String hier hilft nicht!
        time() - 42000,  // Ablaufdatum in der Vergangenheit. Erst das löscht!
        '/'           // Wirkungsbereich des Cookies: der ganze Server
    );
}
session_destroy();
header("Location: ../public/index.php?message=fromLogout&id={$userName}");
