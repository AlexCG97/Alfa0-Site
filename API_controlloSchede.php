<?php
require_once('dati.php');
$usernameinserito = $_POST["Username"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'utf'");
$query = 'SELECT * from chiamate WHERE assegnato = 0 AND macchinaAssegnata = "'.$usernameinserito.'"';
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());
if(mysqli_num_rows(($result)) == 1) {
	echo "presente";
}
else{
	echo "nessuna";
}
?>