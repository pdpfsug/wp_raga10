<html>
<head>
<title>Vetrina delle associazioni</title>
<style type="text/css">
.associazione-scheda h1 {
	font-size: 1.5em;
	font-weight: bold;
}
.associazione-scheda {
	border-bottom : 1px solid grey;
	padding : 0.2em;
}

.associazioni-vetrina {
	border : 1px solid grey;
	
}

	
.associazione-attrs-label {
	font-weight: bold;
	font-size: 0.9em;
}
</style>
</head>
<body>
<?php
//apri il database
$dbfile = "db/associazioni.db";
$database = new SQLiteDatabase($dbfile, 0666, $error);
if (!$database) {
    $error = (file_exists($dbfile)) ? "Impossible to open, check permissions" : "Impossible to create, check permissions";
    die($error);
}
$query = $database->query("SELECT * FROM associazioni WHERE is_enabled ORDER BY name");
?>
<h2>Totale associazioni iscritte <?php $query->numRows(); ?></h2>

<table class="associazioni-vetrina">
<?php
//recupera i dati e fai i riquadri
while ($row = $query->fetch()) {
?>

<tr><td class="associazione-scheda">
	<h1><? echo $row['name']; ?></h1>
	<p> <? echo $row['description']; ?></p>
	<table>
	<tr><td class="associazione-attrs-label">Contatti:</td><td> 
	<? if ($row["email"]) 
		echo $row["email"];
	else
		echo $row["referrer_name"]." ".$row["referrer_email"]; 
	?>
	</td></tr>
	<tr><td class="associazione-attrs-label">Sito web:</td><td> 
	<? if ($row["web"])
		echo '<a href="'.$row["web"].'" target="_blank">'.$row["web"].'</a>';
	else
		echo "Non ha un sito web";
	?>
	</td></tr>
	</table>
</td></tr>

<?
}

?>
</table>
</body>
</html>
