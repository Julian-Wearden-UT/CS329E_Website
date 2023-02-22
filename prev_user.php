<?php
$prevuser = $_REQUEST["prevuser"];

// CONNECT TO DB
$server = "spring-2022.cs.utexas.edu";
$dbName = "cs329e_bulko_maxkret";
$user = "cs329e_bulko_maxkret";
$mysqli = new mysqli($server, $user, "warsaw7mortar&canvas", $dbName);
if ($mysqli->connect_errno) {
	echo "Error: connection failed";
	die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
}

$queryText = "SELECT * FROM users WHERE userName = \"$prevuser\";";
$query = $mysqli->query($queryText);

if (!$query) {
	echo "Error: query failed";
	die("Query failed: ($mysqli->error <br> SQL command = $query");
}
else {
	$_match = false;
	while ($record = $query->fetch_row()) {
		$_match = true;
	}
	if ($_match) {
		echo "false";
	}
	else {
		echo "true";
	}
}
?>