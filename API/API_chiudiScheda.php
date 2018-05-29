<?php
require_once('dati.php');

$id = $_POST["ID"];
$status = $_POST["Status"];

$conn = mysqli_connect($servername, $username, $password, $dbname); 
mysqli_query($conn, "SET NAMES 'utf'");
if(! $conn ) {
      die('Errore: ' . mysqli_error());
   }

if($status == "chiusura"){
		$query = $conn->query("UPDATE chiamate SET attivo = 0 WHERE ID_chiamata LIKE '$id'");
} else {
	echo "errore";
}


if($query)
{
echo "Success";

}
else
{
echo "Error";

}
?>