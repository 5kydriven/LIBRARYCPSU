<?php


//MySQLi Procedural
$conn = mysqli_connect("localhost","root","mysql","cpsu");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>