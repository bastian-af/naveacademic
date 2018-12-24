<?php
$servername = "beta.inf.ucv.cl";
$username = "navegadorcito";
$password = "navegadorcito";
$dbname = "navegadorcito";
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

?>