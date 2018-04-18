<?php
require_once('dati.php');

$status = $_POST["Status"];
$username = $_POST["Username"];
$conn = mysqli_connect($servername, $username, $password, $dbname); 
if(! $conn ) {
      die('Errore: ' . mysqli_error());
   }
$query = " ";

$query = $conn->prepare($query);
$query->execute();
?>