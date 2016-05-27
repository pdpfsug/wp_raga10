<?php

$f = fopen("/tmp/shit","w+");
fwrite($f, print_r($_POST, true));
fclose($f);

//apri il database
$dbfile = "db/associazioni.db";
$database = new SQLiteDatabase($dbfile, 0666, $error);
if (!$database) {
    $error = (file_exists($dbfile)) ? "Impossible to open, check permissions" : "Impossible to create, check permissions";
    die($error);
}
$query = $database->query("SELECT * FROM associazioni WHERE is_enabled ORDER BY name");
?>

