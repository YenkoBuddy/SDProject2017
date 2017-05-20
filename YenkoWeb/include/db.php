<?php

$host = "localhost";
$username = "root";
$password = "0246085565";
$database = "yenko_buddy";

function dbConnect($db="")
{
	global $host, $username, $password;

	$conn = @mysql_connect($host, $username, $password) or die("The sit database appears to be down");

	if($db!="" and !@mysql_select_db($db)) die("The site database is unavailable.");

	return $conn;


}

?>