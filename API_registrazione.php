<?php
require_once('dati.php');
$usernameWeb = $_POST['username'];
$passwordWeb = $_POST['password'];
$ruolo = $_POST['ruolo'];
$targa = $_POST['targa'];


$conn = mysqli_connect($servername, $username, $password, $dbname); 
mysqli_query($conn, "SET NAMES 'utf'");
if(! $conn ) {
    die('Errore: ' . mysqli_error());
}

$hash = password_hash($passwordWeb, PASSWORD_BCRYPT);


$query = $conn->query("INSERT INTO utenti (Username, Password, Ruolo, Targa) VALUES ('$usernameWeb', '$hash', '$ruolo', '$targa');");

if($query){
	echo "Registrazione effettuata con successo";
}
else{
	echo "Errore.";

}

?>