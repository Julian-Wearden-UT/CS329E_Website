<?php
// CONNECT TO DB
$server = "spring-2022.cs.utexas.edu";
$dbName = "cs329e_bulko_maxkret";
$user = "cs329e_bulko_maxkret";
$mysqli = new mysqli($server, $user, "warsaw7mortar&canvas", $dbName);
if ($mysqli->connect_errno) {
	echo "Error: connection failed";
	die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
}
// VARS
$s_user = $mysqli->real_escape_string($_POST["user"]);
$s_pass = $mysqli->real_escape_string($_POST["pass"]);
$db_user = "";
$db_pass = "";

$queryText = "SELECT * FROM users WHERE userName = \"$s_user\";";
$query = $mysqli->query($queryText);

if (!$query) {
	echo "Error: query failed";
	die("Query failed: ($mysqli->error <br> SQL command = $query");
}
else {
	$_match = false;

	while ($record = $query->fetch_row()) {
		$_match = true;
		$db_user = $record[0];
		$db_pass = $record[1];
	}

	if ($_match) {
		// >= 1 MATCH	
		if (($db_user === $s_user) && ($db_pass === $s_pass)) {
			// PASSWORDS MATCH
			echo "true";
		}
		else {
			echo "false pass";
		}
	}
	else {
		echo "false user";
	}
}

// if ($fh = fopen("passwd.txt", "r")) {
// 	$whole_file = fread($fh, filesize("passwd.txt"));
// 	if (substr_count($whole_file, $entry) >= 1) {
// 		fclose($fh);
// 		$is_account = "true";
// 	}
// 	else{
// 		fclose($fh);
// 		$is_account = "false";
// 	}
// 	echo $is_account;
// }
// else {
// 	echo "error: no file found";
// }
?>