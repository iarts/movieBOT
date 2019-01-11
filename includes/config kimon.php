<?php

$host = "localhost";
$username = "root"; 
$pass = "kafridakis"; 
$db_name = "M102DB2018"; 

$site_url = "http://127.0.0.1/moviebot";

$link = mysqli_connect($host,  $username,  $pass);

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  
if (! $link) {
die("Couldn't connect to MySQL"); 
}

((bool)mysqli_query($link, "USE " . $db_name));

mysqli_query($link, "set character set 'utf8'"); 
mysqli_query($link, "set names 'utf8'"); 

?>
