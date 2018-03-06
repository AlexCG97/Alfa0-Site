<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestioneambulanze";
 
$usernameinserito = $_POST["Username"];
 
$conn = mysqli_connect($servername, $username, $password, $dbname); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$datiScheda = array(); 
$query = 'SELECT * from chiamate WHERE assegnato = 0 AND macchinaAssegnata = "'.$usernameinserito.'"';
 
$stmt = $conn->prepare($query);
$stmt->execute();
 
$stmt->bind_result($idChiamata, $nome, $cognome, $dataNascita, $via, $numero, $citta, $comune, $cap, $motivoChiamata, $operatore, $codice);
 
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
 'codice'=>$codice
 ];
 
 array_push($datiScheda, $temp);
}
  
echo json_encode($datiScheda);