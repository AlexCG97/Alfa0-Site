<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestioneambulanze";
 
//$usernameinserito = $_POST["Username"];
$usernameinserito = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname); 
if(! $conn ) {
      die('Errore: ' . mysqli_error());
   }

$datiScheda = array(); 
$query = 'SELECT ID_Chiamata, Nome, Cognome, Data_di_nascita, Via, Numero, Citta, Comune, CAP, Motivo_chiamata, Operatore, codice, attivo from chiamate WHERE assegnato = 0 AND macchinaAssegnata = "'.$usernameinserito.'"';
 
$stmt = $conn->prepare($query);
$stmt->execute();
 
$stmt->bind_result($idChiamata, $nome, $cognome, $dataNascita, $via, $numero, $citta, $comune, $cap, $motivoChiamata, $operatore, $codice, $attivo);
 
while($stmt->fetch()){
 
 $temp = [
 'ID_chiamata'=>$idChiamata,
 'Nome'=>$nome,
 'Cognome'=>$cognome,
 'Data_di_nascita'=>$dataNascita,
 'Via'=>$via,
 'Numero'=>$numero,
 'Citta'=>$citta,
 'Comune'=>$comune,
 'CAP'=>$cap,
 'Motivo_chiamata'=>$motivoChiamata,
 'Operatore'=>$operatore,
 'codice'=>$codice,
 'attivo'=>$attivo,
 ];
 
 array_push($datiScheda, $temp);
}
  
echo json_encode($datiScheda);

?>