<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestioneambulanze";

$usernameinserito = $_POST["UserName"];
$passwordinsertita = $_POST["Password"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'utf'");

$query = 'SELECT ID_Utenti from utenti WHERE Username = "'.$usernameinserito.'" and password = "'.$passwordinsertita.'"';
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if(mysqli_num_rows(($result)) == 1) {
	echo "success";
}
else{
	echo "error";
}

?>