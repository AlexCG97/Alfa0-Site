<?php
require_once('dati.php');

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$via = $_POST['via'];
$numero = $_POST['numero'];
$citta = $_POST['citta'];
$comune = $_POST['comune'];
$cap = $_POST['cap'];
$data = $_POST['data'];
$chiamata = $_POST['chiamata'];
$codice = $_POST['codice'];
$operatore = $_POST['operatore'];
$macchina = $_POST['ambulanza'];

$conn = new mysqli($servername, $username, $password, $dbname); //creazione della connessione col db
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
} 
$sql = "INSERT INTO chiamate (Nome, Cognome, Data_di_nascita, Via, Numero, Citta, Comune, CAP, Motivo_chiamata, Operatore, codice, macchinaAssegnata, attivo)
VALUES ('$nome',
			'$cognome',
			'$data',
			'$via',
			'$numero',
			'$citta',
			'$comune',
			'$cap',
			'$chiamata',
			'$operatore',
			'$codice',
			'$macchina',
		 	'1')";

if ($conn->query($sql) === TRUE) {
    echo "Record creato correttamente";
	
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
