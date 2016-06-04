
<?

$dbfile = "db/associazioni.db";
$database = new SQLiteDatabase($dbfile, 0666, $error);

$options = getopt("x:");
$name = $options["x"];
if ($name) {
	$database->query("UPDATE associazioni SET is_enabled=1 WHERE name='".$name."'");
	echo "Associazione $name abilitata";
} else {
	echo "Uso abilita.php -x<nomeassociazione>\nAssociazioni da abilitare\n\n";
	$q = $database->query("SELECT name FROM associazioni WHERE NOT is_enabled");
	while ($row = $q->fetch()) {
		echo $row["name"]."\n";
	}
	
}


?>

