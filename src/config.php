<?php
$DB_NAME = getenv('DB_NAME');
$DB_USER = getenv('DB_USER');
$DB_PASS = getenv('DB_PASS');
$DB_HOST = getenv('DB_HOST');

$DSN = "pgsql:dbname=$DB_NAME;host=$DB_HOST";
try {
    $db = new PDO($DSN, $DB_USER, $DB_PASS);
    $currentDir = getcwd();
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
