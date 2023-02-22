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
$s_email = $mysqli->real_escape_string($_POST["email"]);

$query_text = "INSERT INTO users (userName,userPass,userEmail) VALUES (\"$s_user\",\"$s_pass\",\"$s_email\");";
$query = $mysqli->query($query_text);

if (!$query) {
	echo "Error: register failed";
	die("Query failed: ($mysqli->error <br> SQL command = $query");
}
else {
	echo "true";
}

// if ($fh = fopen("passwd.txt", "a")) {
// 	fwrite($fh, "$name:$pass \n");
// 	fclose($fh);
// }
// if ($fh = fopen("prev_users.txt", "a")) {
// 	fwrite($fh, "$name \n");
// 	fclose($fh);
// }
// if ($fh = fopen("emails.txt", "a")) {
// 	fwrite($fh, "$email \n");
// 	fclose($fh);
// }

# Write thank you page
// $a = file_get_contents("successful_register.html");
// $b = str_replace("NotAvailable", $email, $a);
// $c = str_replace('<!DOCTYPE html>', "", $b);
// $d = str_replace('<html lang="en">', "", $c);
// $contents = str_replace('</html>', "", $d);
// echo $contents;
?>