<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ='quanlybds_team_8';
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
 
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";
?>