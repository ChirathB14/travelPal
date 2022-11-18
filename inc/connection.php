<?php

$dbhost = 'database';
$dbuser = 'root';
$dbpass = $_ENV['MYSQL_ROOT_PASSWORD'];
$dbname = 'travelpal_db';

$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// Checking the connection
if (mysqli_connect_errno()) {
    die('Database connection failed - ' . mysqli_connect_error());
} 

?>