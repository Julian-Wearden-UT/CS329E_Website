<?php
session_start();
$server = "spring-2022.cs.utexas.edu";
$dbName = "cs329e_bulko_maxkret";
$user = "cs329e_bulko_maxkret";
$mysqli = new mysqli($server, $user, "warsaw7mortar&canvas", $dbName);
if ($mysqli->connect_errno) {
    echo "Error: connection failed";
    die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
}
$_SESSION['userSearch'] = $mysqli->real_escape_string($_POST["search"]);
?>